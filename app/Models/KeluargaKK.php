<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- TAMBAHKAN BARIS INI

class KeluargaKK extends Model
{
    use HasFactory;

    protected $table = 'keluarga_kk';
    protected $primaryKey = 'kk_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'kk_nomor',
        'kepala_keluarga_warga_id',
        'alamat',
        'rt',
        'rw',
    ];

    // ✅ Tambahkan relasi ke model Warga
    public function kepalaKeluarga()
    {
        return $this->belongsTo(Warga::class, 'kepala_keluarga_warga_id', 'warga_id');
    }

}
