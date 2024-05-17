<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Izin;

class RekapController extends Controller
{
    public function rekap()
    {
        return view('layouts.rekapabsen');
    }

    public function lihatRekap(Request $request, $userId)
{
    $npage = 7;

    // Find the user by ID
    $user = User::findOrFail($userId);

    // Retrieve bulan dan tahun from request
    $bulan = $request->input('bulan') ?? date('m');
    $tahun = $request->input('tahun') ?? date('Y');

    // Retrieve attendance records for the user
    $rekapAbsensi = $user->attendances()
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->orderBy('tanggal', 'asc')
        ->get();

    // Retrieve izin records for the user
    $rekapIzin = $user->izins()
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->orderBy('tanggal', 'asc')
        ->get();

    // Pass the user, attendance, and izin data to the view
    return view('lihatrekap', compact('user', 'rekapAbsensi', 'rekapIzin', 'npage', 'bulan', 'tahun'));
}


public function rekapAbsensi(Request $request)
{
    $userId = $request->get('userId');
    $bulan = $request->get('bulan');
    $tahun = $request->get('tahun');

    // Ambil data absensi
    $rekapAbsensi = Attendance::where('user_id', $userId)
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->get();

    // Ambil data izin
    $rekapIzin = Izin::where('user_id', $userId)
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->get();

    // Kirim data ke view
    return view('lihatrekap', compact('rekapAbsensi', 'rekapIzin'));
}


}
