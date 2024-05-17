<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = ['id_karyawan', 'tanggal', 'jam_masuk', 'jenis', 'alasan'];

    // Anda mungkin perlu menyesuaikan nama tabel jika bukan jamak dari nama model
    protected $table = 'presensis';
}
