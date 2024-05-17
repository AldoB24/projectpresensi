<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai Baru</title>
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

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 14px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<form action="{{ route('pegawai.store') }}" method="POST">
    @csrf
    <h1>Tambah Pegawai Baru</h1>
    
    <label for="name">Nama:</label>
    <input type="text" id="name" name="name">
    
    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    
    <label for="phone_number">Nomor Telepon:</label>
    <input type="text" id="phone_number" name="phone_number">
    
    <label for="job_title">Jabatan:</label>
    <input type="text" id="job_title" name="job_title">
    
    <label for="address">Alamat:</label>
    <input type="text" id="address" name="address">
    
    <button type="submit">Simpan</button>
</form>
</body>
</html>
