<?php

namespace App\Http\Controllers;

use App\Models\PeristiwaKelahiran;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaKelahiranController extends Controller
{
    // ===========================
    // INDEX
    // ===========================
    public function index()
    {
        $data = PeristiwaKelahiran::with(['ayah', 'ibu'])
            ->orderBy('kelahiran_id', 'DESC')
            ->paginate(10);

        return view('pages.peristiwa_kelahiran.index', compact('data'));
    }

    // ===========================
    // CREATE
    // ===========================
    public function create()
    {
        $ayahList = Warga::where('jenis_kelamin', 'Laki-laki')->get();
        $ibuList  = Warga::where('jenis_kelamin', 'Perempuan')->get();
        $anakList = Warga::all();

        return view('pages.peristiwa_kelahiran.create', compact('ayahList', 'ibuList', 'anakList'));
    }

    // ===========================
    // STORE
    // ===========================
    public function store(Request $request)
    {
        $request->validate([
            'warga_id'      => 'required|exists:warga,warga_id',
            'ayah_warga_id' => 'required|exists:warga,warga_id',
            'ibu_warga_id'  => 'required|exists:warga,warga_id',
            'tgl_lahir'     => 'required|date',
            'tempat_lahir'  => 'required|string|max:255',
            'no_akta'       => 'required|string|max:100|unique:peristiwa_kelahiran,no_akta',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $kelahiran = PeristiwaKelahiran::create([
            'warga_id'      => $request->warga_id,
            'ayah_warga_id' => $request->ayah_warga_id,
            'ibu_warga_id'  => $request->ibu_warga_id,
            'tgl_lahir'     => $request->tgl_lahir,
            'tempat_lahir'  => $request->tempat_lahir,
            'no_akta'       => $request->no_akta,
        ]);

        // Upload media
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->storeAs('public/media', $fileName);

                Media::create([
                    'ref_table' => 'peristiwa_kelahiran',
                    'ref_id'    => $kelahiran->kelahiran_id,
                    'file_name' => $fileName,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil ditambah');
    }

    // ===========================
    // EDIT
    // ===========================
    public function edit($id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);

        $ayahList = Warga::where('jenis_kelamin', 'Laki-laki')->get();
        $ibuList  = Warga::where('jenis_kelamin', 'Perempuan')->get();
        $anakList = Warga::all(); // Supaya dropdown anak bisa muncul

        $media = Media::where('ref_table', 'peristiwa_kelahiran')
            ->where('ref_id', $id)
            ->get();

        return view('pages.peristiwa_kelahiran.edit', compact('kelahiran', 'ayahList', 'ibuList', 'anakList', 'media'));
    }

    // ===========================
    // UPDATE
    // ===========================
    public function update(Request $request, $id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);

        $request->validate([
            'warga_id'      => 'required|exists:warga,warga_id',
            'ayah_warga_id' => 'required|exists:warga,warga_id',
            'ibu_warga_id'  => 'required|exists:warga,warga_id',
            'tgl_lahir'     => 'required|date',
            'tempat_lahir'  => 'required|string|max:255',
            'no_akta'       => 'required|string|max:100|unique:peristiwa_kelahiran,no_akta,'.$kelahiran->kelahiran_id.',kelahiran_id',
            'media_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $kelahiran->update([
            'warga_id'      => $request->warga_id,
            'ayah_warga_id' => $request->ayah_warga_id,
            'ibu_warga_id'  => $request->ibu_warga_id,
            'tgl_lahir'     => $request->tgl_lahir,
            'tempat_lahir'  => $request->tempat_lahir,
            'no_akta'       => $request->no_akta,
        ]);

        // Upload file baru
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->storeAs('public/media', $fileName);

                Media::create([
                    'ref_table' => 'peristiwa_kelahiran',
                    'ref_id'    => $kelahiran->kelahiran_id,
                    'file_name' => $fileName,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil diperbarui');
    }

    // ===========================
    // SHOW / DETAIL
    // ===========================
    public function show($id)
    {
        $kelahiran = PeristiwaKelahiran::with(['ayah', 'ibu', 'anak'])->findOrFail($id);

        $media = Media::where('ref_table', 'peristiwa_kelahiran')
            ->where('ref_id', $id)
            ->get();

        return view('pages.peristiwa_kelahiran.detail', compact('kelahiran', 'media'));
    }

    // ===========================
    // DELETE
    // ===========================
    public function destroy($id)
    {
        $kelahiran = PeristiwaKelahiran::findOrFail($id);

        // Hapus media terkait
        $media = Media::where('ref_table', 'peristiwa_kelahiran')
            ->where('ref_id', $id)
            ->get();

        foreach ($media as $m) {
            Storage::delete('public/media/' . $m->file_name);
            $m->delete();
        }

        $kelahiran->delete();

        return redirect()->route('peristiwa_kelahiran.index')
            ->with('success', 'Data kelahiran berhasil dihapus');
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
