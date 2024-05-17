<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cetak</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            display: flex;
            justify-content: space-between; /* Menempatkan elemen sejajar dengan jarak di antaranya */
            align-items: center; /* Menengahkan vertikal */
            margin-bottom: 20px;
        }
        .logo {
            margin-bottom: 10px; /* Mengatur jarak antara logo dan judul */
        }
        .logo img {
            width: 100px;
            height: 100px;
        }
        .header-text {
            font-size: 18px;
            font-weight: bold;
            text-align: center; /* Mengatur judul di tengah */
            margin-right: 150px; /* Menambahkan margin kanan */
        }
    </style>
</head>
<body>
<h2>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pegawai Perbulan</title>
    <h2>Laporan bulan {{ $bulan }} Tahun {{ $tahun }}</h2>

    <div class="container">
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
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Hadir</th>
                    <th>Izin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $laporan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laporan->name }}</td>
                        <td>{{ $laporan->job_title }}</td>
                        <!-- Menampilkan jumlah kehadiran -->
                        <td>{{ $laporan->hadir_count }}</td>
                        <!-- Menampilkan jumlah izin -->
                        <td>{{ $laporan->izin_count }}</td>
                        <!-- Tombol untuk melihat rekap -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
