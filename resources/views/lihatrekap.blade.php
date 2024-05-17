@extends('layouts.admin.dashboard')

@section('content')

<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Rekap Absensi - {{ $user->name }}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h3>
        <div class="card-header-right">
            <div class="ml-auto no-print">
                <a href="{{ route('cetak-pegawai', ['userId' => $user->id, 'bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-secondary" style="padding: 5px 10px; margin-right: 10px; margin-top: 10px;">
                    <i class="fas fa-print"></i> &nbsp;Cetak
                </a>
                <a href="{{ route('pegawai-pdf', ['userId' => $user->id, 'bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-primary" style="padding: 5px 10px; margin-right: 10px; margin-top: 10px;">
                    <i class="fas fa-file-pdf"></i> &nbsp;Export PDF
                </a>
                <a href="{{ route('pegawai-excel', ['userId' => $user->id, 'bulan' => request('bulan', date('m')), 'tahun' => request('tahun', date('Y'))]) }}" class="btn btn-success" style="padding: 5px 10px; margin-right: 10px; margin-top: 10px;">
                    <i class="fas fa-file-excel"></i> &nbsp;Export Excel
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <h4>Kehadiran:</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapAbsensi as $absensi)
                    <tr>
                        <td>{{ $absensi->tanggal }}</td>
                        <td>{{ $absensi->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <h4>Izin:</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Alasan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapIzin as $izin)
                    <tr>
                        <td>{{ $izin->tanggal }}</td>
                        <td>{{ $izin->alasan }}</td>
                        <td>{{ $izin->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Button to navigate back to laporan.blade.php -->
<div class="mt-3 no-print">
    <a href="{{ route('laporan-karyawan') }}" class="btn btn-primary">Kembali ke Laporan</a>
</div>

@endsection
