<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\User;
use App\Models\PeristiwaKelahiran;
use App\Models\PeristiwaKematian;
use App\Models\PeristiwaPindah;
use App\Models\KeluargaKK;
use App\Models\AnggotaKeluarga;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Hitung total data
    $jumlahWarga = Warga::count();
    $jumlahUser = User::count();
    $jumlahKelahiran = PeristiwaKelahiran::count();
    $jumlahKematian = PeristiwaKematian::count();
    $jumlahPindah = PeristiwaPindah::count();
    $jumlahKK = KeluargaKK::count(); // Total Kartu Keluarga
    $jumlahAnggota = AnggotaKeluarga::count(); // Total anggota keluarga

    // Ambil 5 data terbaru
    $kelahiranTerbaru = PeristiwaKelahiran::with('anak', 'ibu')->latest()->take(5)->get();
    $kematianTerbaru = PeristiwaKematian::with('warga')->latest()->take(5)->get();
    $pindahTerbaru = PeristiwaPindah::with('warga')->latest()->take(5)->get();
    $kkTerbaru = KeluargaKK::latest()->take(5)->get();
    $anggotaTerbaru = AnggotaKeluarga::with('warga', 'kk')->latest()->take(5)->get();

    return view('dashboard', compact(
        'jumlahWarga', 'jumlahUser', 'jumlahKelahiran',
        'jumlahKematian', 'jumlahPindah', 'jumlahKK', 'jumlahAnggota',
        'kelahiranTerbaru', 'kematianTerbaru', 'pindahTerbaru',
        'kkTerbaru', 'anggotaTerbaru'
    ));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
