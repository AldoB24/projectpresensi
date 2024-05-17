<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2; /* Ubah latar belakang body menjadi abu-abu muda */
        }

        .container {
            max-width: 600px;
            background-color: #ffffff; /* Ubah latar belakang formulir menjadi putih */
            border-radius: 8px;
            padding: 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
            color: #555;
        }

        button {
            background-color: #063970;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s; /* Tambah transisi saat hover */
        }

        button:hover {
            background-color: #0056b3;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: border-color 0.3s; /* Tambah transisi saat fokus */
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #063970;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pegawai</h1>
        
        <!-- <p><strong>No:</strong> {{ $pegawai->id  }}</p> -->
        <p><strong>Nama:</strong> {{ $pegawai->name }}</p>
        <p><strong>Email:</strong> {{ $pegawai->email }}</p>
        <p><strong>Nomor Telepon:</strong> {{ $pegawai->phone_number }}</p>
        <p><strong>Jabatan:</strong> {{ $pegawai->job_title }}</p>
        <p><strong>Alamat:</strong> {{ $pegawai->address }}</p>

        <!-- Tombol Kembali -->
        <form action="/data-profil" method="get">
            <button type="submit">Kembali</button>
        </form>
    </div>
</body>
</html>
