<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans'; // Menyesuaikan nama tabel dengan nama yang telah Anda tentukan

    protected $fillable = ['user_id','id_attendance', 'id_izin'];
}
