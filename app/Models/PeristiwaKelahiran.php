<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeristiwaKelahiran extends Model
{
    use HasFactory;

    protected $table = 'peristiwa_kelahiran';
    protected $primaryKey = 'kelahiran_id';

    protected $fillable = [
        'warga_id',       // anak/bayi
        'ayah_warga_id',
        'ibu_warga_id',
        'tgl_lahir',      // sesuai migration
        'tempat_lahir',
        'no_akta',
    ];


    public function anak()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    // RELASI KE WARGA
    public function ayah()
    {
        return $this->belongsTo(Warga::class, 'ayah_warga_id', 'warga_id');
    }

    public function ibu()
    {
        return $this->belongsTo(Warga::class, 'ibu_warga_id', 'warga_id');
    }
}


