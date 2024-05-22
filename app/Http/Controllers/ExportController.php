<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use App\Exports\ExportLap;
use App\Exports\ExportJK;
use App\Exports\ExportPegawai;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Izin;
use Illuminate\Http\Request;


class ExportController extends Controller
{
    public function exportToPdf()
    {
        $presensis = Presensi::all();

        $pdf = new Dompdf();
        $pdf->loadHTML(view('export.export_to_pdf', compact('presensis')));
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('presensi.pdf');
    }

    
    public function exportjk()
    {
        $pegawais = User::where('role', 'pegawai')->get(); // tambahkan get() untuk mengambil hasil query
    
        $pdf = new Dompdf();
        $pdf->loadHTML(view('export.exportjk_pdf', compact('pegawais'))->render()); // tambahkan render() untuk merender view ke dalam HTML
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        $pdf->stream('data_pegawai.pdf');
    }
    
    public function exceljk()
    {
        $users = User::where('role', 'pegawai')->get();
        $export = new ExportJK($users);
        return Excel::download(new ExportJK($users), 'pegawai.xlsx');
    }

    

public function exportlap($bulan, $tahun)
{
    $npage = 7;

    $izins = Izin::select('izins.*', 'izins.tanggal as tanggal_izin', 'izins.keterangan as keterangan_izin', 'users.name as name', 'users.job_title as job_title')
        ->join('users', 'users.id', '=', 'izins.user_id')
        ->whereMonth('izins.tanggal', $bulan)
        ->whereYear('izins.tanggal', $tahun)
        ->get();

    $attendances = Attendance::select('attendances.*', 'attendances.tanggal as tanggal_hadir', 'attendances.keterangan as keterangan_hadir', 'users.name as name', 'users.job_title as job_title')
        ->join('users', 'users.id', '=', 'attendances.user_id')
        ->whereMonth('attendances.tanggal', $bulan)
        ->whereYear('attendances.tanggal', $tahun)
        ->get();
    
    $laporans = $izins->merge($attendances);
    
    $laporans = User::with(['attendances', 'izins'])
                    ->where('role', 'pegawai')
                    ->get()
                    ->map(function ($user) use ($bulan, $tahun) {
                        $user->attendances = $user->attendances()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                        $user->izins = $user->izins()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                        $user->hadir_count = $user->attendances->count();
                        $user->izin_count = $user->izins->count();
                        return $user;
                    });

    // Load view for PDF
    $pdf = new Dompdf();
    $pdf->loadHTML(view('export.laporanpdf', [
        'laporans' => $laporans,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'npage' => $npage,
    ])->render());

    // Render PDF
    $pdf->setPaper('A4', 'landscape');
    $pdf->render();

    // Stream PDF
    return $pdf->stream('rekap_pegawai.pdf');
}

    
   public function cetaklap($bulan, $tahun)
    {
        $npage = 7;
    
        $izins = Izin::select('izins.*', 'izins.tanggal as tanggal_izin', 'izins.keterangan as keterangan_izin', 'users.name as name', 'users.job_title as job_title')
            ->join('users', 'users.id', '=', 'izins.user_id')
            ->whereMonth('izins.tanggal', $bulan)
            ->whereYear('izins.tanggal', $tahun)
            ->get();
    
        $attendances = Attendance::select('attendances.*', 'attendances.tanggal as tanggal_hadir', 'attendances.keterangan as keterangan_hadir', 'users.name as name', 'users.job_title as job_title')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->whereMonth('attendances.tanggal', $bulan)
            ->whereYear('attendances.tanggal', $tahun)
            ->get();
        
        $laporans = $izins->merge($attendances);
        
        $laporans = User::with(['attendances', 'izins'])
                        ->where('role', 'pegawai')
                        ->get()
                        ->map(function ($user) use ($bulan, $tahun) {
                            $user->attendances = $user->attendances()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                            $user->izins = $user->izins()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                            $user->hadir_count = $user->attendances->count();
                            $user->izin_count = $user->izins->count();
                            return $user;
                        });
    
        return view('export.cetak_laporan', [
            'laporans' => $laporans,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'npage' => $npage,
        ]);
    }

    public function excellap(Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));
    
        $izins = Izin::select('izins.*', 'izins.tanggal as tanggal_izin', 'izins.keterangan as keterangan_izin', 'users.name as name', 'users.job_title as job_title')
                    ->join('users', 'users.id', '=', 'izins.user_id')
                    ->whereMonth('izins.tanggal', $bulan)
                    ->whereYear('izins.tanggal', $tahun)
                    ->get();
    
        $attendances = Attendance::select('attendances.*', 'attendances.tanggal as tanggal_hadir', 'attendances.keterangan as keterangan_hadir', 'users.name as name', 'users.job_title as job_title')
                                    ->join('users', 'users.id', '=', 'attendances.user_id')
                                    ->whereMonth('attendances.tanggal', $bulan)
                                    ->whereYear('attendances.tanggal', $tahun)
                                    ->get();

        $laporans = User::with(['attendances', 'izins'])
                ->where('role', 'pegawai')
                ->paginate(10); 
                
        // Merge the data of izins and attendances
        $laporans = $izins->merge($attendances);
        
        // Retrieve user data with attendance and izin relations and count the number of attendances and izins
        $laporans = User::with(['attendances', 'izins'])
                        ->where('role', 'pegawai')
                        ->get()
                        ->map(function ($user) use ($bulan, $tahun) {
                            $user->attendances = $user->attendances()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                            $user->izins = $user->izins()->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
                            $user->hadir_count = $user->attendances->count();
                            $user->izin_count = $user->izins->count();
                            return $user;
                        });
    
        // Export the data using Laravel Excel
        return Excel::download(new ExportLap($laporans, $bulan, $tahun), 'laporan_rekap.xlsx');
    }



public function cetakPegawai($userId, $bulan, $tahun)
    {
        $user = User::findOrFail($userId); // Assuming you have User model
        $rekapAbsensi = Attendance::where('user_id', $userId)
                                ->whereMonth('tanggal', $bulan)
                                ->whereYear('tanggal', $tahun)
                                ->get();
        
        $rekapIzin = Izin::where('user_id', $userId)
                         ->whereMonth('tanggal', $bulan)
                         ->whereYear('tanggal', $tahun)
                         ->get();

        return view('export.cetak_pegawai', compact('user', 'rekapAbsensi', 'rekapIzin', 'bulan', 'tahun'));
    }

public function pegawaiPdf($userId, $bulan, $tahun)
{
    $user = User::findOrFail($userId); // Assuming you have User model
        $rekapAbsensi = Attendance::where('user_id', $userId)
                                ->whereMonth('tanggal', $bulan)
                                ->whereYear('tanggal', $tahun)
                                ->get();
        
        $rekapIzin = Izin::where('user_id', $userId)
                         ->whereMonth('tanggal', $bulan)
                         ->whereYear('tanggal', $tahun)
                         ->get();

    // Create PDF instance
    $pdf = new Dompdf();

    // Load the HTML view along with the selected month and year
    $pdf->loadHTML(view('export.laporanpegawai', compact('user', 'rekapAbsensi', 'rekapIzin', 'bulan', 'tahun'))->render());

    // Set paper size and orientation
    $pdf->setPaper('A4', 'landscape');

    // Render the PDF
    $pdf->render();

    // Output the PDF
    return $pdf->stream('laporan_pegawai.pdf');
}

public function pegawaiExcel($userId, $bulan, $tahun)
{
    $user = User::findOrFail($userId);
    $rekapAbsensi = Attendance::where('user_id', $userId)
                              ->whereMonth('tanggal', $bulan)
                              ->whereYear('tanggal', $tahun)
                              ->get();
    
    $rekapIzin = Izin::where('user_id', $userId)
                     ->whereMonth('tanggal', $bulan)
                     ->whereYear('tanggal', $tahun)
                     ->get();

    // Membuat objek PegawaiRekapExport dengan data yang disiapkan
    $export = new ExportPegawai($user, $rekapAbsensi, $rekapIzin, $bulan, $tahun);

    // Mengunduh file Excel
    return Excel::download($export,  'rekap_pegawai.xlsx');
}


}
