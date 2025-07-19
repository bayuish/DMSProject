<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cookie; // Import Cookie facade
use Illuminate\Support\Facades\Session; // Import Session facade

class LoginController extends Controller
{
    /**
     * Constructor untuk menerapkan middleware 'guest'.
     * Pengguna yang sudah login tidak dapat mengakses halaman login lagi.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Menampilkan formulir login.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Memproses permintaan login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/home');
    }

    /**
     * Memproses permintaan logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Log out user dari guard 'web' secara eksplisit
        Auth::guard('web')->logout();

        // Invalidasi sesi saat ini
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Hapus semua data sesi (lebih agresif)
        $request->session()->flush();

        // Hapus cookie "remember me" jika ada
        $rememberMeCookieName = Auth::guard('web')->getRecallerName();
        if ($request->hasCookie($rememberMeCookieName)) {
            Cookie::queue(Cookie::forget($rememberMeCookieName));
        }

        // --- DEBUGGING LOGOUT ---
        // Hentikan eksekusi di sini untuk melihat status setelah logout
        dd(
            'Auth::check() after logout:', Auth::check(),
            'Session data after logout:', Session::all(),
            'Remember Me Cookie value (should be null or empty):', Cookie::get($rememberMeCookieName)
        );
        // --- END DEBUGGING ---

        // Redirect ke halaman login menggunakan URL langsung
        return redirect('/login');
    }
}
