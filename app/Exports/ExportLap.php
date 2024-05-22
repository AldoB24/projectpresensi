<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportLap implements FromView
{
    protected $laporans;
    protected $bulan;

    public function __construct($laporans, $bulan, $tahun)
    {
        $this->laporans = $laporans;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        return view('export.rekap_laporan', [
            'laporans' => $this->laporans,
            'bulan' => $this->bulan, // Teruskan nilai bulan ke view
            'tahun' => $this->tahun
        ]);
    }
}