<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Opsional, jika Anda menggunakan verifikasi email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // <<< PASTIKAN BARIS INI ADA

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // <<< PASTIKAN 'HasApiTokens' ada di sini

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'division',
        'phone_number', // Tambahkan ini
        'profile_photo_path', // Tambahkan ini
        'avatar_url', // Tambahkan ini

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
