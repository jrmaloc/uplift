<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return response()->json([
                'success' => true,
                'status' => 200,
            ]);
        }

        // Authentication failed...
        return response()->json([
            'error' => 'Invalid credentials!',
            'message' => 'Data does not match in our records.',
        ]);
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|regex:/^[a-zA-Z\s\-\.]+$/|max:255',
                'email' => 'required|email|unique:users',
                'username' => 'required|max:255',
                'password' => 'required|min:8',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            if ($user) {
                $user->assignRole('user');
                $user->role_id = 3;
                $user->save();


                event(new Registered($user));

                Auth::login($user);

                return redirect();
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }
}
