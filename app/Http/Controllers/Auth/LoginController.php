<?php

namespace App\Http\Controllers\Auth;

// Hapus baris ini: use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controller as BaseLaravelController; // Import Controller dasar Laravel

// Ubah ini agar meng-extend BaseLaravelController
class LoginController extends BaseLaravelController
{
    /**
     * Constructor to apply the guest middleware.
     * Logged-in users cannot access the login page again.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Displays the login form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Processes the login request.
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
     * Processes the logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
