<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
<<<<<<< HEAD
=======
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

>>>>>>> a44bb0006bdf722b6f1a55d30edcc9e2fbe2d6f1
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

<<<<<<< HEAD
        return redirect()->route('login');
=======
        return redirect()->route('login')->with('success', 'Registration successful!');
>>>>>>> a44bb0006bdf722b6f1a55d30edcc9e2fbe2d6f1
    }
}
