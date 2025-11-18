<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- TAMBAHKAN BARIS INI
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeFilter(Builder $query, $request, array $filterableColumns)
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->$column);
            }
        }
        return $query;
    }

    // Scope Search
    public function scopeSearch(Builder $query, $request)
    {
        if ($request->filled('search')) {
            $search = $request->search;
            // Fungsi ini butuh relasi 'warga' yang baru saja kita tambahkan di atas
            $query->whereHas('kepalaKeluarga', function($q) use ($search) {
                $q->where('nama', 'LIKE', '%' . $search . '%');
            });
        }
        return $query;
    }

}
