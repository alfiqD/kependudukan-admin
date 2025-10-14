<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- TAMBAHKAN BARIS INI

class KeluargaKK extends Model
{
    use HasFactory;

    protected $table = 'keluarga_kk';
    protected $primaryKey = 'kk_id';

    protected $fillable = [
        'kk_nomor',
        'kepala_keluarga_warga_id',
        'alamat',
        'rt',
        'rw',
    ];
}
