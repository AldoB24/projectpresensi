<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izins'; // Menyesuaikan nama tabel dengan nama yang telah Anda tentukan

    protected $fillable = ['user_id','alasan', 'keterangan','tanggal']; // Menentukan kolom yang dapat diisi secara massal

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}