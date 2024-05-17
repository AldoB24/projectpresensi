<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinPresensiCountController extends Controller
{
    public function getIzinPresensiCounts(Request $request)
    {
        try {
            // Mendapatkan pengguna terautentikasi berdasarkan token
            $user = Auth::user();

            if (!$user) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Mendapatkan user_id pengguna terautentikasi
            $user_id = $user->id;

            // Mengambil jumlah izin sakit dan keperluan menggunakan fungsi getIzinCounts
            $izinCounts = Izin::selectRaw('SUM(CASE WHEN alasan = "sakit" THEN 1 ELSE 0 END) as jumlah_izin_sakit')
                ->selectRaw('SUM(CASE WHEN alasan = "keperluan" THEN 1 ELSE 0 END) as jumlah_izin_keperluan')
                ->where('user_id', $user_id)
                ->first();

            // Mengambil data presensi
            $presensis = Attendance::where('user_id', $user_id)->get();
            $jumlahTepat = 0;
            $jumlahTerlambat = 0;

            // Hitung jumlah tepat dan jumlah terlambat
            foreach ($presensis as $presensi) {
                if ($presensi->masuk) {
                    // Misalnya, batas waktu masuk tepat adalah pukul 09:00
                    $batasTepat = '09:00:00';
                    if ($presensi->masuk <= $batasTepat) {
                        $jumlahTepat++;
                    } else {
                        $jumlahTerlambat++;
                    }
                }
            }

            // Beri respons dengan jumlah izin sakit, jumlah izin keperluan, jumlah tepat, dan jumlah terlambat
            return response()->json([
                'message' => 'true',
                'user_id' => $user_id,
                'jumlah_izin_sakit' => $izinCounts->jumlah_izin_sakit,
                'jumlah_izin_keperluan' => $izinCounts->jumlah_izin_keperluan,
                'jumlah_tepat' => $jumlahTepat,
                'jumlah_terlambat' => $jumlahTerlambat
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan server internal'], 500);
        }
    }
}
