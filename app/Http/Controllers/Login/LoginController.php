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
        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user with the given credentials
        if (Auth::attempt($credentials)) {
            // Regenerate the session ID to help prevent session fixation attacks
            $request->session()->regenerate();

            // Retrieve the authenticated user
            $user = Auth::user();

            // Check if the user has the 'pegawai' role
            if ($user->role === 'admin') {
                // Store the user's name in the session
                Session::put('user_name', $user->name);

                // Redirect to the dashboard
                return redirect('dashboard');
            } else {
                // If the user does not have the 'pegawai' role, log them out and redirect back with an error message
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun ini tidak memiliki akses sebagai admin.',
                ]);
            }
        }

        // If the authentication attempt fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ]);
    }
}