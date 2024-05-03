<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if the provided credentials match a predefined username and password
        if ($credentials['email'] === 'admin' && $credentials['password'] === 'admin') {
            // If credentials are valid, redirect to the dashboard
            return redirect('/dashboard');
        }

        // If the credentials are invalid, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle the logout request
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
