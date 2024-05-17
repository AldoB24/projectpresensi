<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Izin;
use App\Models\Laporan;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index()
    {
        $npage = 0;
        $today = Carbon::today(); // Ambil tanggal hari ini
    
        // Menghitung jumlah orang yang tepat waktu hari ini
        $tepatWaktuCount = Attendance::where('keterangan', 'tepat')
                                    ->whereDate('tanggal', $today) // Filter tanggal
                                    ->count();
    
        // Menghitung jumlah orang yang izin hari ini
        $izinCount = Izin::whereDate('tanggal', $today)->count();
    
        // Menghitung jumlah orang yang terlambat hari ini
        $terlambatCount = Attendance::where('keterangan', 'terlambat')
                                    ->whereDate('tanggal', $today) // Filter tanggal
                                    ->count();
    
        return view('dashboardd', compact('tepatWaktuCount', 'izinCount', 'terlambatCount', 'npage'));
    }
    
    public function jumlah()
    {
        $npage = 1;
        $pegawai = User::where('role', 'pegawai') // Mengambil hanya pegawai dengan role 'pegawai'
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('jumlahkaryawan', compact('pegawai', 'npage'));
    }


    public function tepatwaktu(Request $request)
{
    // Ambil tanggal dari permintaan filter
    $filter_date = $request->input('filter_date', now()->toDateString());

    // Query untuk data pegawai yang hadir tepat waktu
    $query = Attendance::whereNotNull('masuk')
                        ->where('masuk', '<=', '09:00:00'); // Ubah operator menjadi <=

    // Filter berdasarkan tanggal
    if ($filter_date) {
        $query->whereDate('tanggal', $filter_date);
    }

    // Ambil data berdasarkan filter
    $on_time = $query->get(); // Mengganti variabel $tepat_waktu menjadi $on_time

    // Jika permintaan datang dari API, kembalikan respons JSON
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Sukses mendapatkan data pegawai yang hadir tepat waktu',
            'data' => $on_time // Mengubah variabel $tepat_waktu menjadi $on_time
        ]);
    }

    // Jika permintaan datang dari web, kembalikan view 'attend.tepatwaktu' dengan data yang diperlukan
    $npage = 2; // Contoh nilai untuk npage
    return view('attend.tepatwaktu', compact('on_time', 'npage')); // Mengubah variabel $tepat_waktu menjadi $on_time
}

public function terlambat(Request $request) 
{
    $npage = 4;
    
    // Ambil tanggal dari permintaan filter
    $filter_date = $request->input('filter_date', now()->toDateString());

    // Query untuk data terlambat
    $query = Attendance::whereNotNull('masuk')
                        ->where('masuk', '>', '09:00:00');

    // Filter berdasarkan tanggal
    if ($filter_date) {
        $query->whereDate('tanggal', $filter_date);
    }

    // Ambil data terlambat berdasarkan filter
    $terlambats = $query->get();

    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Sukses mendapatkan data pegawai yang hadir tepat waktu',
            'data' => $terlambats
        ]);
    }                       

    // Mengirim variabel $terlambats dan $npage ke view 'attend.terlambat'
    return view('attend.terlambat', compact('terlambats', 'npage'));
}


public function izin(Request $request)
{
    $npage = 5;

    // Ambil tanggal dari permintaan filter atau gunakan tanggal hari ini
    $filter_date = $request->input('filter_date', now()->toDateString());

    // Query untuk mendapatkan data izin hanya untuk hari ini
    $izins = Izin::select('izins.*', 'users.name as name', 'users.job_title as job_title')
                    ->join('users', 'users.id', '=', 'izins.user_id')
                    ->whereDate('izins.tanggal', $filter_date)
                    ->get();

    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Sukses mendapatkan jumlah izin hari ini',
            'izins' => $izins
        ]);
    }

    return view('attend.izin', compact('izins', 'npage'));
}

    // public function rekap()
    // {
    //     $npage = 5;
    //     return view('rekapabsen', compact('npage'));
    // }
    
    public function laporan(Request $request)
    {
        $npage = 7;
        // $npage = 8;
        
    
        $bulan = $request->input('bulan') ?? date('m');
        $tahun = $request->input('tahun') ?? date('Y');
    
        // Ambil data izin sesuai bulan dan tahun yang dipilih
        $izins = Izin::select('izins.*', 'izins.tanggal as tanggal_izin', 'izins.keterangan as keterangan_izin', 'users.name as name', 'users.job_title as job_title')
            ->join('users', 'users.id', '=', 'izins.user_id')
            ->whereMonth('izins.tanggal', $bulan)
            ->whereYear('izins.tanggal', $tahun)
            ->get();
    
        // Ambil data kehadiran sesuai bulan dan tahun yang dipilih
        $attendances = Attendance::select('attendances.*', 'attendances.tanggal as tanggal_hadir', 'attendances.keterangan as keterangan_hadir', 'users.name as name', 'users.job_title as job_title')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->whereMonth('attendances.tanggal', $bulan)
            ->whereYear('attendances.tanggal', $tahun)
            ->get();
        
        // Gabungkan data izin dan kehadiran
        $laporans = $izins->merge($attendances);
    
        // Ambil data user dengan relasi kehadiran dan izin
        $laporans = User::with(['attendances', 'izins'])
                        ->where('role', 'pegawai')
                        ->get()
                        ->map(function ($user) use ($bulan, $tahun) {
                            // Filter kehadiran sesuai bulan dan tahun yang dipilih
                            $user->attendances = $user->attendances()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                            // Filter izin sesuai bulan dan tahun yang dipilih
                            $user->izins = $user->izins()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                            // Hitung jumlah kehadiran dan izin
                            $user->hadir_count = $user->attendances->count();
                            $user->izin_count = $user->izins->count();
                            return $user;
                        });
    
        return view('laporan', [
            'laporans' => $laporans,
            'npage' => $npage,
            'bulan' => $bulan, 'tahun' => $tahun
        ]);
    }
    
    

    public function getPegawai()
    {
        $pegawai = User::where('role', 'pegawai')->get();
        return response()->json($pegawai);
    }

    
    public function pulang(Request $request)
{
    $npage = 3;
    $employees = User::all(); // Ambil semua data karyawan dari tabel users
    $attendances = Attendance::all(); // Ambil semua data absensi dari tabel attendances

    // Jika terdapat permintaan filter berdasarkan tanggal
    if ($request->has('filter_date')) {
        $filterDate = $request->input('filter_date');
        $attendances = Attendance::whereDate('tanggal', $filterDate)->get();
    }

    // Gabungkan data karyawan dengan data absensi berdasarkan user_id
    $tepat_pulang = [];
    foreach ($employees as $employee) {
        $attendance = $attendances->where('user_id', $employee->id)->last(); // Ambil absensi terakhir karyawan
        if ($attendance) {
            $tepat_pulang[] = (object)[
                'nama' => $employee->name, // Kolom nama di tabel users
                'jabatan' => $employee->job_title, // Kolom jabatan di tabel users
                'pulang' => $attendance->pulang, // Kolom pulang di tabel attendances
                'tanggal' => $attendance->tanggal, // Kolom tanggal di tabel attendances
            ];
        }
    }    

    // Kembalikan data ke view
    return view('attend.jampulang', compact('tepat_pulang', 'npage'));
}

}