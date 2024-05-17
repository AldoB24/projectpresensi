<!DOCTYPE html>
<html>
<head>
    <title>Data Presensi</title>
    <style>
        /* Gaya CSS untuk tampilan PDF */
        body {
            font-family: Arial, sans-serif;
        }
        .kop {
            text-align: left;
            margin-bottom: 20px;
        }
        .kop h1 {
            margin: 0;
        }
        .kop p {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- Kop -->
    <div class="kop">
        <h1>PT 10 KELUARGA AGUNG</h1>
        <p>Jl PB Sudirman No 10 Kabupaten Jember</p>
    </div>
    <!-- Judul Data Presensi -->
    <h2>Data Presensi</h2>
    <!-- Tabel Data Presensi -->
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Keterangan</th>
                <th>Alasan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presensis as $key => $presensi)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $presensi->karyawan->nama }}</td>
                <td>{{ $presensi->tanggal }}</td>
                <td>{{ $presensi->jam_masuk }}</td>
                <td>{{ $presensi->jenis }}</td>
                <td>{{ $presensi->alasan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
