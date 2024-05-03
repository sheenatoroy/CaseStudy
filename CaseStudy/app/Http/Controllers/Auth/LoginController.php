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

         // Check if the provided credentials match the default ones
        if ($request->email === 'admin@gmail.com' && $request->password === 'admin') {
            // Authenticate the user manually
            Auth::loginUsingId(1); // Change 1 to the ID of your default user
            return redirect()->intended('/dashboard');
        }
        // Validate the form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle the logout request
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
