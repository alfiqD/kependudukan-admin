<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeristiwaPindah extends Model
{
    use HasFactory;

    protected $table = 'peristiwa_pindah';
    protected $primaryKey = 'pindah_id';

    protected $fillable = [
        'warga_id',
        'tgl_pindah',
        'alamat_tujuan',
        'alasan',
        'no_surat',
    ];

    /**
     * RELASI KE WARGA
     * Satu peristiwa pindah milik satu warga
     */
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }
}
