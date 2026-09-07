<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            switch (Auth::user()->user_type) {
                case 1:
                    return redirect()->route('admin.dashboard');
                case 2:
                    return redirect()->route('kepala.dashboard');
                default:
                    return redirect()->route('home');
            }
        }

        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Silakan masukkan alamat email Anda.',
            'password.required' => 'Silakan masukkan password Anda.',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt(['email' => trim($request->email), 'password' => $request->password, 'is_delete' => 0], $remember)) {
            $request->session()->regenerate();

            switch (Auth::user()->user_type) {
                case 1:
                    return redirect()->intended(route('admin.dashboard'))->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
                case 2:
                    return redirect()->intended(route('kepala.dashboard'))->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
                default:
                    return redirect()->intended('/');
            }
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Login gagal! Email atau password yang Anda masukkan tidak sesuai.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar dari sistem.');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', trim($request->email))->where('is_delete', 0)->first();

        if ($user) {
            // For production / local demo, give a clear prompt
            return redirect()->back()->with('success', 'Permintaan reset password telah diterima. Silakan hubungi Administrator PTPN IV atau periksa email Anda.');
        } else {
            return redirect()->back()->with('error', 'Alamat email tidak terdaftar dalam sistem.');
        }
    }
}
