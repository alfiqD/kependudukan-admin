<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaKeluarga;
use App\Models\KeluargaKK;
use App\Models\Warga;

class AnggotaKeluargaController extends Controller
{
    public function index(Request $request)
{
    $anggota = AnggotaKeluarga::with(['kk', 'warga'])
        ->filter($request)
        ->search($request)
        ->paginate(10)
        ->withQueryString();

    return view('pages.anggota_keluarga.index', compact('anggota'));
}


    public function create()
    {
        $kk = KeluargaKK::all();
        $warga = Warga::all();
        return view('pages.anggota_keluarga.create', compact('kk', 'warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required',
            'kk_id' => 'required',
            'warga_id' => 'required',
            'hubungan' => 'required'
        ]);

        AnggotaKeluarga::create($request->all());

        return redirect()->route('anggota_keluarga.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $anggota = AnggotaKeluarga::findOrFail($id);
        $kk = KeluargaKK::all();
        $warga = Warga::all();

        return view('pages.anggota_keluarga.edit', compact('anggota', 'kk', 'warga'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'anggota_id' => 'required',
        'kk_id' => 'required',
        'warga_id' => 'required',
        'hubungan' => 'required',
    ]);

    // Temukan data lama berdasarkan anggota_id dari URL
    $anggota = AnggotaKeluarga::findOrFail($id);

    // Update semua field termasuk anggota_id baru
    $anggota->update([
        'anggota_id' => $request->anggota_id,
        'kk_id' => $request->kk_id,
        'warga_id' => $request->warga_id,
        'hubungan' => $request->hubungan,
    ]);

    return redirect()->route('anggota_keluarga.index')->with('success', 'Data berhasil diperbarui');
}

    public function destroy($id)
    {
        AnggotaKeluarga::destroy($id);

        return redirect()->route('anggota_keluarga.index')->with('success', 'Data berhasil dihapus');
    }
}
