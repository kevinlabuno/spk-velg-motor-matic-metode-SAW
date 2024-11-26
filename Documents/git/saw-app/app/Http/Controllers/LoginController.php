<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('beranda')
                ->with('success', 'Login berhasil! Selamat datang.');
        }

        return back()->withErrors([
            'email' => 'Email Tidak Cocok',
        ])->with('error', 'Login gagal! Periksa email dan password Anda.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')
            ->with('info', 'Anda telah berhasil logout.');
    }
}
