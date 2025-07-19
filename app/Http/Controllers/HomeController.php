<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade jika ingin mengakses user yang login

class HomeController extends Controller // <<< PASTIKAN INI MENG-EXTEND "Controller"
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Menerapkan middleware 'auth' agar hanya pengguna yang sudah login yang bisa mengakses controller ini.
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\View\View
     */
    public function index()
    {
        // Mengembalikan view 'home'.
        // Pastikan Anda memiliki file 'resources/views/home.blade.php'
        return view('home');
    }

    // Anda bisa menambahkan method lain di sini, misalnya untuk menampilkan data spesifik
    // public function profile()
    // {
    //     $user = Auth::user(); // Mengambil data user yang sedang login
    //     return view('profile', compact('user'));
    // }
}
