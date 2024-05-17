<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Mengambil informasi pengguna yang terotentikasi
            $user = Auth::user();

            // Menyimpan informasi pengguna dalam sesi  
            Session::put('user_name', $user->name);

            return redirect('dashboard');
        }

        return back()->withErrors([
            'login_error' => 'Email atau password tidak terdaftar.',
        ]);
    }
}
