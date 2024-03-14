<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'message' => 'Data does not match in our records.'
        ]);
    }
}
