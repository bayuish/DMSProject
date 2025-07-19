<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController; // Import controller Anda
use App\Http\Controllers\HomeController; // Import HomeController
use App\Http\Controllers\PeopleController; // Import PeopleController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route for the root URL, redirects to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Route to display the login form
Route::get('/login', [LoginController::class, 'create'])->name('login');

// Route to process login requests (POST)
Route::post('/login', [LoginController::class, 'store']);

// Route for logout
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Route for the home dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route for the People page
    Route::get('/people', [PeopleController::class, 'index'])->name('people.index');

    // Optional: If a logged-in user tries to access '/', redirect them to /home
    Route::get('/', function () {
        return redirect()->route('home');
    });
});
