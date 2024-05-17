<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'phone_number' => 'nullable|string',
            'job_title' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'job_title' => $request->job_title,
            'address' => $request->address,
        ]);

        // Berikan respons
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function login(Request $request)
{
    // Lakukan otentikasi
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Dapatkan pengguna yang berhasil login
    $user = Auth::user();

    // Periksa apakah pengguna adalah pegawai
    if ($user->role !== 'pegawai') {
        // Jika bukan, tolak akses
        Auth::logout(); // Logout pengguna
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Buat token otentikasi untuk pengguna
    $token = $user->createToken('auth_token')->plainTextToken;
    $user->token = $token;
    $user->token_type = 'Bearer';

    return response()->json([
        'success' => true,
        'message' => 'Hi '.$user->name.', selamat datang di sistem presensi',
        'data' => $user
    ]);
}

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

}
