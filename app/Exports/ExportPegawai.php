<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportPegawai implements FromView
{
    protected $user;
    protected $rekapAbsensi;
    protected $rekapIzin;
    protected $bulan;
    protected $tahun;

    public function __construct(User $user, $rekapAbsensi, $rekapIzin, $bulan, $tahun)
    {
        $this->user = $user;
        $this->rekapAbsensi = $rekapAbsensi;
        $this->rekapIzin = $rekapIzin;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        return view('export.rekap_pegawai', [
            'user' => $this->user,
            'rekapAbsensi' => $this->rekapAbsensi,
            'rekapIzin' => $this->rekapIzin,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
        ]);
    }
}
