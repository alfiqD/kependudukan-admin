<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\KeluargaKK;

class KeluargaKKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterable = ['rt', 'rw'];


        $keluarga = KeluargaKK::with('kepalaKeluarga')
                ->filter($request, $filterable)
                ->search($request)
                ->paginate(10)
                ->withQueryString();

        return view('pages.keluarga.index', compact('keluarga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::all();  // ambil semua warga untuk pilihan kepala keluarga
        return view('pages.keluarga.create' , compact('warga'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
        'kk_nomor' => 'required|string|max:50',
        'kepala_keluarga_warga_id' => 'required|string|max:255',
        'alamat' => 'required|string',
        'rt' => 'required|string|max:5',
        'rw' => 'required|string|max:5',
    ]);

    KeluargaKK::create($validated);

    return redirect()->route('keluarga_kk.index')->with('success', 'Data berhasil ditambahkan.');
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
    public function edit($id)
{
    $keluargaKK = KeluargaKK::findOrFail($id);
    $warga = Warga::all();
    return view('pages.keluarga.edit', compact('keluargaKK', 'warga'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'kk_nomor' => 'required',
        'kepala_keluarga_warga_id' => 'required',
        'alamat' => 'required',
        'rt' => 'required',
        'rw' => 'required',
    ]);

    // Ambil data lama berdasarkan ID
    $keluargaKK = KeluargaKK::findOrFail($id);

    // Update data
    $keluargaKK->update([
        'kk_nomor' => $request->kk_nomor,
        'kepala_keluarga_warga_id' => $request->kepala_keluarga_warga_id,
        'alamat' => $request->alamat,
        'rt' => $request->rt,
        'rw' => $request->rw,
    ]);

    // Redirect balik dengan pesan sukses
    return redirect()->route('keluarga_kk.index')->with('success', 'Data berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $keluargaKK = KeluargaKK::findOrFail($id);
    $keluargaKK->delete();

    return redirect()->route('keluarga_kk.index')->with('success', 'Data Kartu Keluarga berhasil dihapus!');
}
}
