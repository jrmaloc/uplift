<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthenticateController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('password');

        if (filter_var($request->input('email-username'), FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->input('email-username');
        } else {
            $credentials['username'] = $request->input('email-username');
        }

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentication passed...
            return redirect()->route('dashboard')->with('login', true);
        } else {
            return back()->with('error', 'Incorrect credentials')->withInput();

        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users',
                'username' => 'required|max:255',
                'password' => 'required|min:8',
            ]);

            $user = User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {
                $user->assignRole('user');
                $user->role_id = 3;

                $role = Role::where('name', 'user')->first();

                $user->syncPermissions($role->permissions);
                $user->save();

                event(new Registered($user));

                Auth::login($user);

                return redirect()->route('dashboard')->with('register', 'Welcome to Uplift!');
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); // Logs the user out

        $request->session()->invalidate(); // Invalidate the user's session

        $request->session()->regenerateToken();

        return redirect(route('auth.login')); // Redirect to your desired page after logout
    }

    public function changePassword(Request $request, string $id)
    {
        if ($request->ajax()) {
            $data = $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);

            $user = User::findOrFail($id);

            if (Hash::check($data['old_password'], $user->password)) {

                if (!Hash::check($data['new_password'], $user->password)) {
                    $newPass = Hash::make($data['new_password']);
                    $user->password = $newPass;

                    $save = $user->save();
                    if ($save) {
                        return response()->json([
                            'status' => 200,
                            'message' => 'Password changed successfully',
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 201,
                        'message' => 'You are trying to change the same password!',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Incorrect Credentials',
                ]);
            };
        }
    }
}
