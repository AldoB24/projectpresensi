<!DOCTYPE html>
<html>
<head>
    <title>Rekap Absensi - {{ $user->name }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<h2>Laporan bulan {{ $bulan }} Tahun {{ $tahun }}</h2>
<table>
    <thead>
        <tr>
            <th colspan="2">Rekap Absensi - {{ $user->name }}</th>
        </tr>
    </thead>
</table>

<br>
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
</body>
</html>
