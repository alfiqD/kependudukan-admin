<?php

namespace App\Http\Controllers;

use App\Models\PeristiwaKematian;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaKematianController extends Controller
{
    // ===========================
    // INDEX
    // ===========================
    public function index()
    {
        $data = PeristiwaKematian::with('warga')
            ->orderBy('kematian_id', 'ASC')
            ->paginate(10);

        return view('pages.peristiwa_kematian.index', compact('data'));
    }

    // ===========================
    // CREATE
    // ===========================
    public function create()
    {
        $wargaList = Warga::all();

        return view('pages.peristiwa_kematian.create', compact('wargaList'));
    }

    // ===========================
    // STORE
    // ===========================
    public function store(Request $request)
    {
        $request->validate([
            'warga_id'      => 'required|exists:warga,warga_id',
            'tgl_meninggal' => 'required|date',
            'sebab'         => 'nullable|string|max:255',
            'lokasi'        => 'nullable|string|max:255',
            'no_surat'      => 'required|string|max:100|unique:peristiwa_kematian,no_surat',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $kematian = PeristiwaKematian::create([
            'warga_id'      => $request->warga_id,
            'tgl_meninggal' => $request->tgl_meninggal,
            'sebab'         => $request->sebab,
            'lokasi'        => $request->lokasi,
            'no_surat'      => $request->no_surat,
        ]);

        // Upload media (SAMA POLA)
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {

                $fileName = time().'_'.preg_replace('/\s+/', '_', $file->getClientOriginalName());

                // Simpan ke storage
                Storage::disk('public')->putFileAs('media', $file, $fileName);

                // Simpan ke tabel media
                Media::create([
                    'ref_table' => 'peristiwa_kematian',
                    'ref_id'    => $kematian->kematian_id,
                    'file_name' => $fileName,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('peristiwa_kematian.index')
            ->with('success', 'Data kematian berhasil ditambahkan');
    }

    // ===========================
    // EDIT
    // ===========================
    public function edit($id)
    {
        $kematian = PeristiwaKematian::findOrFail($id);
        $wargaList = Warga::all();

        $media = Media::where('ref_table', 'peristiwa_kematian')
            ->where('ref_id', $id)
            ->get();

        return view('pages.peristiwa_kematian.edit', compact('kematian', 'wargaList', 'media'));
    }

    // ===========================
    // UPDATE
    // ===========================
    public function update(Request $request, $id)
    {
        $kematian = PeristiwaKematian::findOrFail($id);

        $request->validate([
            'warga_id'      => 'required|exists:warga,warga_id',
            'tgl_meninggal' => 'required|date',
            'sebab'         => 'nullable|string|max:255',
            'lokasi'        => 'nullable|string|max:255',
            'no_surat'      => 'required|string|max:100|unique:peristiwa_kematian,no_surat,' . $kematian->kematian_id . ',kematian_id',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $kematian->update([
            'warga_id'      => $request->warga_id,
            'tgl_meninggal' => $request->tgl_meninggal,
            'sebab'         => $request->sebab,
            'lokasi'        => $request->lokasi,
            'no_surat'      => $request->no_surat,
        ]);

        // Upload media baru
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {

                $fileName = time().'_'.preg_replace('/\s+/', '_', $file->getClientOriginalName());

                Storage::disk('public')->putFileAs('media', $file, $fileName);

                Media::create([
                    'ref_table' => 'peristiwa_kematian',
                    'ref_id'    => $kematian->kematian_id,
                    'file_name' => $fileName,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('peristiwa_kematian.index')
            ->with('success', 'Data kematian berhasil diperbarui');
    }

    // ===========================
    // SHOW / DETAIL
    // ===========================
    public function show($id)
    {
        $kematian = PeristiwaKematian::with('warga')->findOrFail($id);

        $media = Media::where('ref_table', 'peristiwa_kematian')
            ->where('ref_id', $id)
            ->get();

        return view('pages.peristiwa_kematian.detail', compact('kematian', 'media'));
    }

    // ===========================
    // DELETE
    // ===========================
    public function destroy($id)
    {
        $kematian = PeristiwaKematian::findOrFail($id);

        $media = Media::where('ref_table', 'peristiwa_kematian')
            ->where('ref_id', $id)
            ->get();

        foreach ($media as $m) {
            Storage::delete('public/media/' . $m->file_name);
            $m->delete();
        }

        $kematian->delete();

        return redirect()->route('peristiwa_kematian.index')
            ->with('success', 'Data kematian berhasil dihapus');
    }

    // ===========================
    // HAPUS MEDIA SATUAN
    // ===========================
    public function deleteMedia($media_id)
    {
        $media = Media::findOrFail($media_id);

        Storage::delete('public/media/' . $media->file_name);
        $media->delete();

        return back()->with('success', 'File berhasil dihapus');
    }
}
