<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AnggotaKeluarga extends Model
{
    protected $table = 'anggota_keluarga';
    public $incrementing = true;
    protected $primaryKey = 'anggota_id';

    protected $fillable = [
        'anggota_id',
        'kk_id',
        'warga_id',
        'hubungan'
    ];

    public function kk()
    {
        return $this->belongsTo(KeluargaKK::class, 'kk_id', 'kk_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    /* === FILTER HUBUNGAN === */
    public function scopeFilter(Builder $query, $request)
    {
        if ($request->filled('hubungan')) {
            $query->where('hubungan', $request->hubungan);
        }
        return $query;
    }

    /* === SEARCH ANGGOTA ID === */
    public function scopeSearch(Builder $query, $request)
    {
        if ($request->filled('search')) {
            $query->where('anggota_id', 'LIKE', '%' . $request->search . '%');
        }
        return $query;
    }
}
