<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Constructor untuk menerapkan middleware 'auth'.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan form edit profil user yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Mengambil user yang sedang login
        $user = Auth::user();

        // Tambahkan atribut dummy untuk avatar_url jika belum ada di model User
        // Di aplikasi nyata, ini harus disimpan di database
        if (!isset($user->avatar_url)) {
            $user->avatar_url = 'https://placehold.co/120x120/4285f4/FFFFFF?text=' . strtoupper(substr($user->name, 0, 1));
        }

        return view('profile.edit', compact('user'));
    }

    /**
     * Memperbarui data profil user yang sedang login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:20'], // Tambahkan validasi untuk nomor telepon
            'profile_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'], // Max 2MB
        ]);

        // Update nama dan nomor telepon
        $user->name = $request->name;
        $user->phone_number = $request->phone_number; // Simpan nomor telepon

        // Handle upload foto profil
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo_path) { // Asumsikan ada kolom profile_photo_path di tabel users
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Simpan foto baru
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
            // Anda mungkin juga ingin menyimpan URL yang dapat diakses publik
            $user->avatar_url = Storage::url($path); // Asumsikan ada kolom avatar_url
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
