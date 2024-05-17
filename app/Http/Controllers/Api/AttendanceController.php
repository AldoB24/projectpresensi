<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use stdClass;

date_default_timezone_set("Asia/Jakarta");

class AttendanceController extends Controller
{
        public function getPresensis()
    {
        $userId = Auth::user()->id;
        $presensis = Attendance::where('user_id', $userId)->get();

        foreach ($presensis as $presensi) {
            $isHariIni = $presensi->tanggal == date('Y-m-d');
            $presensi->is_hari_ini = $isHariIni;

            $tanggal = Carbon::parse($presensi->tanggal)->locale('id')->translatedFormat('l, j F Y');
            $masuk = Carbon::parse($presensi->masuk)->locale('id')->translatedFormat('H:i');
            $pulang = $presensi->pulang ? Carbon::parse($presensi->pulang)->locale('id')->translatedFormat('H:i') : null;

            $presensi->tanggal = $tanggal;
            $presensi->masuk = $masuk;
            $presensi->pulang = $pulang;
        }

        return response()->json([
            'success' => true,
            'message' => 'Sukses mendapatkan data presensi',
            'data' => $presensis
        ]);
    }

    public function savePresensi(Request $request)
    {
        $keterangan = "";
        $jamMasuk = date('H:i:s');
        $waktuTepat = '09:00:00'; // Waktu batas untuk dianggap tepat waktu
    
        // Menentukan apakah karyawan hadir tepat waktu atau terlambat
        $status = ($jamMasuk <= $waktuTepat) ? 'tepat' : 'terlambat';
    
        $presensi = Attendance::whereDate('tanggal', '=', date('Y-m-d'))
            ->where('user_id', Auth::user()->id)
            ->first();
    
        if ($presensi == null) {
            $presensi = Attendance::create([
                'user_id' => Auth::user()->id,
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'tanggal' => date('Y-m-d'),
                'masuk' => $jamMasuk,
                'pulang' => null,
                'keterangan' => $status // Menyimpan status ke dalam kolom 'keterangan'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Sukses absen untuk masuk',
                'data' => $presensi
            ]);
        } else {
            if ($presensi->pulang !== null) {
                $keterangan = "Anda sudah melakukan presensi";
                return response()->json([
                    'success' => false,
                    'message' => $keterangan,
                    'data' => null
                ]);
            } else {
                $data = [
                    'pulang' => $jamMasuk, // Menggunakan jam masuk sebagai jam pulang
                ];
                Attendance::whereDate('tanggal', '=', date('Y-m-d'))
                    ->where('user_id', Auth::user()->id)
                    ->update($data);
            }
            $presensi = Attendance::whereDate('tanggal', '=', date('Y-m-d'))
                ->where('user_id', Auth::user()->id)
                ->first();
    
            return response()->json([
                'success' => true,
                'message' => 'Sukses Absen untuk Pulang',
                'data' => $presensi
            ]);
        }
    }
    
//     public function tepatwaktu(Request $request)
// {
//     // Ambil data pegawai yang hadir tepat waktu dari hari-hari sebelumnya dan hari ini
//     $tepat_waktu = Attendance::whereNotNull('masuk')
//                             ->whereDate('tanggal', '=', date('Y-m-d')) // Tanggal kurang dari atau sama dengan hari ini
//                             ->where('masuk', '<=', '07:00:00') // Jam masuk kurang dari atau sama dengan waktu batas tepat waktu
//                             ->get();

//     // Jika permintaan datang dari API, kembalikan respons JSON
//     if ($request->expectsJson()) {
//         return response()->json([
//             'success' => true,
//             'message' => 'Sukses mendapatkan data pegawai yang hadir tepat waktu',
//             'data' => $tepat_waktu
//         ]);
//     }

//     // Jika permintaan datang dari web, kembalikan view 'attend.tepatwaktu' dengan data yang diperlukan
//     $npage = 2; // Contoh nilai untuk npage
//     return view('attend.tepatwaktu', compact('tepat_waktu', 'npage'));
// }

public function jampulang(Request $request)
{
    // Ambil data pegawai yang pulang tepat waktu dari hari-hari sebelumnya dan hari ini
    $tepat_pulang = Attendance::whereNotNull('pulang')
                            ->whereDate('tanggal', '=', date('Y-m-d')) // Tanggal kurang dari atau sama dengan hari ini
                            ->where('pulang', '<=', '17:00:00') // Jam pulang kurang dari atau sama dengan waktu batas tepat pulang
                            ->get();

    // Jika permintaan datang dari API, kembalikan respons JSON
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Sukses mendapatkan data pegawai yang pulang tepat waktu',
            'data' => $tepat_pulang
        ]);
    }

    // Jika permintaan datang dari web, kembalikan view 'attend.jampulang' dengan data yang diperlukan
    $npage = 3; // Contoh nilai untuk npage
    return view('attend.jampulang', compact('tepat_pulang', 'npage'));
}


// public function terlambat(Request $request)
// {
//     // Ambil data pegawai yang terlambat dengan menggunakan kondisi tertentu
//     $terlambats = Attendance::whereNotNull('masuk')
//                             ->where('tanggal', date('Y-m-d'))
//                             ->where('masuk', '>', '17:10:00') // Ubah operator menjadi >
//                             ->get();

//     // Jika permintaan datang dari API, kembalikan respons JSON
//     if ($request->expectsJson()) {
//         return response()->json([
//             'success' => true,
//             'message' => 'Sukses mendapatkan data pegawai yang terlambat',
//             'data' => $terlambats
//         ]);
//     }

//     // Jika permintaan datang dari web, kembalikan view 'attend.terlambat' dengan data yang diperlukan
//     $npage = 3; // Contoh nilai untuk npage
//     return view('attend.terlambat', compact('terlambats', 'npage'));
// }


}