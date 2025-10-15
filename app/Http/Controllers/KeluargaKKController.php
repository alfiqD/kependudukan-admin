<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\KeluargaKK;

class KeluargaKKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keluarga = KeluargaKK::all(); // ambil semua data dari tabel keluarga_kk
        return view('admin.keluarga.index', compact('keluarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.keluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'kk_nomor' => 'required|unique:keluarga_kk,kk_nomor',
        'kepala_keluarga_warga_id' => 'required',
        'alamat' => 'required',
        'rt' => 'required',
        'rw' => 'required',
        ]);

    KeluargaKK::create($validated);

    return redirect()->route('keluarga_kk.index')->with('success', 'Data KK berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KeluargaKK $keluargaKK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeluargaKK $keluargaKK)
    {
        return view('admin.keluarga.edit', ['keluarga' => $keluargaKK]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KeluargaKK $keluargaKK)
    {
        $keluarga = KeluargaKK::findOrFail($id);

        $request->validate([
            'kk_nomor' => 'required|unique:keluarga_kks,kk_nomor,' . $keluarga->kk_id . ',kk_id',
            'kepala_keluarga_warga_id' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        $keluarga->update($request->all());
        return redirect()->route('keluarga_kk.index')->with('success', 'Data KK berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeluargaKK $keluargaKK)
    {
        $keluarga = KeluargaKK::findOrFail($id);
        $keluarga->delete();

        return redirect()->route('keluarga_kk.index')->with('success', 'Data KK berhasil dihapus!');
    }
}
