<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController; // Import controller Anda
use App\Http\Controllers\HomeController; // Import HomeController
use App\Http\Controllers\PeopleController; // Pastikan ini ada
use App\Http\Controllers\ProfileController; // Tambahkan ini
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk Auth::check()

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

// Route for the root URL.
// It checks authentication status and redirects accordingly.
Route::get('/', function () {
    if (Auth::check()) {
        // If user is authenticated, redirect to home
        return redirect()->route('home');
    }
    // If user is not authenticated, redirect to login
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
    // Route to store new user from the People page
    Route::post('/people', [PeopleController::class, 'store'])->name('people.store');

    // Rute untuk Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Gunakan PUT untuk update

    // Hapus Route::get('/') duplikat dari sini karena sudah ditangani di atas
});
