<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="header-text">
                <div>LAPORAN ABSENSI KARYAWAN</div>
                <div>PT ARSENET GLOBAL SOLUSI</div>
                <div>KOTA JEMBER</div>
            </div>
    <style>
        /* Atur gaya untuk tampilan PDF di sini */
        body {
            font-family: Arial, sans-serif;
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
    </style>
</head>
<body>
    <h2>Data Karyawan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Nomor Telepon</th>
                <th>Jabatan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pegawais as $key => $item)
         <tr>
         <td>{{ $key + 1 }}</td>
         <td>{{ $item->name }}</td>
         <td>{{ $item->phone_number }}</td>
         <td>{{ $item->job_title }}</td>
         <td>{{ $item->address }}</td>
         </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
