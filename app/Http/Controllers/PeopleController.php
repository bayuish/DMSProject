<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Opsional, jika Anda ingin mengakses data user yang login

class PeopleController extends Controller
{
    /**
     * Constructor untuk menerapkan middleware 'auth'.
     * Hanya pengguna yang sudah login yang bisa mengakses halaman ini.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman 'People'.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Data dummy untuk ditampilkan di halaman People
        // Di aplikasi nyata, data ini akan diambil dari database
        $people = [
            [
                'name' => 'Henry Paulista',
                'email' => 'henry.p@mail.com',
                'position' => 'SENIOR CREATIVE DIRECTOR',
                'progress' => 100,
                'avatar_url' => 'https://placehold.co/100x100/A8DADC/1D9DCC?text=HP', // Placeholder
                'online' => true
            ],
            [
                'name' => 'Evan Jefferson',
                'email' => 'jefferson@gmail.com',
                'position' => 'CREATIVE DIRECTOR',
                'progress' => 82,
                'avatar_url' => 'https://placehold.co/100x100/457B9D/FFFFFF?text=EJ', // Placeholder
                'online' => true
            ],
            [
                'name' => 'Mark Thomson',
                'email' => 'mark.t@gmail.com',
                'position' => 'SENIOR UI DESIGNER',
                'progress' => 66,
                'avatar_url' => 'https://placehold.co/100x100/F1FAEE/457B9D?text=MT', // Placeholder
                'online' => false
            ],
            [
                'name' => 'Alice McKenzie',
                'email' => 'alice.mc@gmail.com',
                'position' => 'SENIOR COPYWRITER',
                'progress' => 100,
                'avatar_url' => 'https://placehold.co/100x100/1D9DCC/F1FAEE?text=AM', // Placeholder
                'online' => true
            ],
            [
                'name' => 'Jack Ro',
                'email' => 'jack.r@gmail.com',
                'position' => 'ART DIRECTOR',
                'progress' => 33,
                'avatar_url' => 'https://placehold.co/100x100/A8DADC/457B9D?text=JR', // Placeholder
                'online' => false
            ],
            [
                'name' => 'Anastasia Groetze',
                'email' => 'anastasia.g@gmail.com',
                'position' => 'SENIOR UX DESIGNER',
                'progress' => 68,
                'avatar_url' => 'https://placehold.co/100x100/457B9D/A8DADC?text=AG', // Placeholder
                'online' => false
            ],
        ];

        return view('people', compact('people'));
    }
}
