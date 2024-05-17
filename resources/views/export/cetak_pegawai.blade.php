<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Absensi - {{ $user->name }}</title>
    <style>
        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo {
            margin-right: 20px;
        }
        .logo img {
            width: 100px;
            height: auto;
        }
        .header-text {
            text-align: center;
            font-weight: bold;
        }
        .header-text div {
            margin-bottom: 5px;
        }
        .header-text b {
            font-weight: bold;
        }
    </style>
</head>
<body>
<h2>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <h2>Laporan bulan {{ $bulan }} Tahun {{ $tahun }}</h2>
<div class="header">
    <div class="logo">
        <img src="{{ asset('tabler/static/ags.png') }}" alt="Logo">
    </div>
    <div class="header-text">
        <div>LAPORAN ABSENSI KARYAWAN</div>
        <div>PT ARSENET GLOBAL SOLUSI</div>
        <div><b>KOTA JEMBER</b></div>
    </div>
</div>

<h2>Rekap Absensi - {{ $user->name }}</h2>

<h4>Kehadiran:</h4>
<table border="1">
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

<hr>

<h4>Izin:</h4>
<table border="1">
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

<script>
    window.print();
</script>
</body>
</html>
