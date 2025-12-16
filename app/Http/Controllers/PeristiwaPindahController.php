<?php

namespace App\Http\Controllers;

use App\Models\PeristiwaPindah;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeristiwaPindahController extends Controller
{
    // ===========================
    // INDEX
    // ===========================
    public function index()
    {
        $data = PeristiwaPindah::with('warga')
            ->orderBy('pindah_id', 'DESC')
            ->paginate(10);

        return view('pages.peristiwa_pindah.index', compact('data'));
    }

    // ===========================
    // CREATE
    // ===========================
    public function create()
    {
        $wargaList = Warga::all();

        return view('pages.peristiwa_pindah.create', compact('wargaList'));
    }

    // ===========================
    // STORE
    // ===========================
    public function store(Request $request)
    {
        $request->validate([
            'warga_id'        => 'required|exists:warga,warga_id',
            'tgl_pindah'      => 'required|date',
            'alamat_tujuan'   => 'required|string',
            'alasan'          => 'nullable|string',
            'no_surat'        => 'nullable|string|max:100|unique:peristiwa_pindah,no_surat',
            'media_files.*'   => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $pindah = PeristiwaPindah::create([
            'warga_id'      => $request->warga_id,
            'tgl_pindah'    => $request->tgl_pindah,
            'alamat_tujuan' => $request->alamat_tujuan,
            'alasan'        => $request->alasan,
            'no_surat'      => $request->no_surat,
        ]);

        // Upload media
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $fileName = time().'_'.$file->getClientOriginalName();
                Storage::disk('public')->putFileAs('media', $file, $fileName);

                Media::create([
                    'ref_table' => 'peristiwa_pindah',
                    'ref_id'    => $pindah->pindah_id,
                    'file_name' => $fileName,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('peristiwa_pindah.index')
            ->with('success', 'Data pindah berhasil ditambahkan');
    }

    // ===========================
    // EDIT
    // ===========================
    public function edit($id)
    {
        $pindah = PeristiwaPindah::findOrFail($id);
        $wargaList = Warga::all();

        $media = Media::where('ref_table', 'peristiwa_pindah')
            ->where('ref_id', $id)
            ->get();

        return view('pages.peristiwa_pindah.edit', compact('pindah', 'wargaList', 'media'));
    }

    // ===========================
    // UPDATE
    // ===========================
    public function update(Request $request, $id)
    {
        $pindah = PeristiwaPindah::findOrFail($id);

        $request->validate([
            'warga_id'        => 'required|exists:warga,warga_id',
            'tgl_pindah'      => 'required|date',
            'alamat_tujuan'   => 'required|string',
            'alasan'          => 'nullable|string',
            'no_surat'        => 'nullable|string|max:100|unique:peristiwa_pindah,no_surat,'.$pindah->pindah_id.',pindah_id',
            'media_files.*'   => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $pindah->update([
            'warga_id'      => $request->warga_id,
            'tgl_pindah'    => $request->tgl_pindah,
            'alamat_tujuan' => $request->alamat_tujuan,
            'alasan'        => $request->alasan,
            'no_surat'      => $request->no_surat,
        ]);

        // Upload media baru
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $file) {
                $fileName = time().'_'.$file->getClientOriginalName();
                Storage::disk('public')->putFileAs('media', $file, $fileName);

                Media::create([
                    'ref_table' => 'peristiwa_pindah',
                    'ref_id'    => $pindah->pindah_id,
                    'file_name' => $fileName,
                    'mime_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->route('peristiwa_pindah.index')
            ->with('success', 'Data pindah berhasil diperbarui');
    }

    // ===========================
    // SHOW / DETAIL
    // ===========================
    public function show($id)
    {
        $pindah = PeristiwaPindah::with('warga')->findOrFail($id);

        $media = Media::where('ref_table', 'peristiwa_pindah')
            ->where('ref_id', $id)
            ->get();

        return view('pages.peristiwa_pindah.detail', compact('pindah', 'media'));
    }

    // ===========================
    // DELETE
    // ===========================
    public function destroy($id)
    {
        $pindah = PeristiwaPindah::findOrFail($id);

        $media = Media::where('ref_table', 'peristiwa_pindah')
            ->where('ref_id', $id)
            ->get();

        foreach ($media as $m) {
            Storage::delete('public/media/' . $m->file_name);
            $m->delete();
        }

        $pindah->delete();

        return redirect()->route('peristiwa_pindah.index')
            ->with('success', 'Data pindah berhasil dihapus');
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
