<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
    {
    // Menampilkan semua data pegawai
    public function data()
    {
        $npage = 6;
        $pegawai = User::where('role', 'pegawai')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
        return view('pegawai.index', compact('pegawai', 'npage'));
    }

    public function tambah()
    {
        return view('pegawai.tambah');
    }

    // Menyimpan data pegawai baru
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone_number' => 'required',
            'job_title' => 'required',
            'address' => 'required',
        ]);

        // Simpan data pegawai baru ke dalam database
        User::create($validatedData);

        // Redirect kembali ke halaman data pegawai setelah data berhasil disimpan
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }
    // Menampilkan detail pegawai
    public function show($id)
    {
    $pegawai = User::findOrFail($id)->first();
    return view('pegawai.lihat', compact('pegawai'));
    }     

    // Menampilkan halaman edit data pegawai
    public function edit($id)
    {
        $pegawai = User::findOrFail($id);
        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }

    // Mengupdate data pegawai
    public function update(Request $request, $id)
    {
    // Validasi data yang dikirimkan dari formulir
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email,'.$id,
        'phone_number' => 'required',
        'job_title' => 'required',
        'address' => 'required',
    ]);

    // Temukan pegawai yang ingin diupdate
    $pegawai = User::where('id', $id)->firstOrFail();

    // Update data pegawai
    $pegawai->update($validatedData);

    // Redirect kembali ke halaman data pegawai setelah data berhasil diupdate
    return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }


    // Menghapus data pegawai
    public function hapus($id)
    {
        $pegawai = User::findOrFail($id);
        $pegawai->delete();

        // Set auto-increment ID ke 1 kembali
        DB::statement('ALTER TABLE pegawais AUTO_INCREMENT = 1');

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}