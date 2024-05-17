<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label,
        input[type="text"],
        input[type="password"] {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
        }

        button[type="submit"],
        a.button {
            background-color: #007bff;
            color: #fff;
            padding: 14px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 48%;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        button[type="submit"]:hover,
        a.button:hover {
            background-color: #0056b3;
        }

        button[type="submit"] {
            margin-right: 4%;
        }

        a.button {
            background-color: #6c757d;
        }

        a.button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <form action="{{ route('pegawai.update', ['id' => $pegawai->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Edit Pegawai</h1>
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="{{ $pegawai->name }}">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="{{ $pegawai->email }}">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Isi jika akan diganti" @if(isset($pegawai)) value="{{ $pegawai->password }}" @endif>
        <label for="phone_number">Nomor Telepon:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ $pegawai->phone_number }}">
        <label for="job_title">Jabatan:</label>
        <input type="text" id="job_title" name="job_title" value="{{ $pegawai->job_title }}">
        <label for="address">Alamat:</label>
        <input type="text" id="address" name="address" value="{{ $pegawai->address }}">
        <button type="submit">Simpan Perubahan</button>
        <a href="/data-profil" class="button">Batal</a>
    </form>
</body>
</html>
