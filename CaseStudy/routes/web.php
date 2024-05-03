<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout Route
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Protected Routes (Accessible only to authenticated users)
Route::middleware('auth')->group(function () {
    // Define your protected routes here
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

// Define the root route to redirect to the login page
Route::get('/', function () {
    return redirect('/login');
});
