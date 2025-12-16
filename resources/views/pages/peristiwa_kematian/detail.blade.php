@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <h2 class="mb-4">Detail Peristiwa Kematian</h2>

        {{-- BACK BUTTON --}}
        <a href="{{ route('peristiwa_kematian.index') }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        <div class="row g-4">

            {{-- ================= INFORMASI KEMATIAN ================= --}}
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <strong>Informasi Kematian</strong>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th width="40%">Nama Warga</th>
                                <td>{{ $kematian->warga->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $kematian->warga->jenis_kelamin ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Meninggal</th>
                                <td>{{ $kematian->tgl_meninggal ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Meninggal</th>
                                <td>{{ $kematian->lokasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Sebab Meninggal</th>
                                <td>{{ $kematian->sebab ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>No Surat Kematian</th>
                                <td>{{ $kematian->no_surat ?? '-' }}</td>
                            </tr>
                        </table>

                        {{-- TOMBOL AKSI --}}
                        <div class="mt-3 d-flex justify-content-end gap-2">
                            <a href="{{ route('peristiwa_kematian.edit', $kematian->kematian_id) }}"
                                class="btn btn-primary">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ================= MEDIA / DOKUMEN ================= --}}
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <strong>Foto / Dokumen Pendukung</strong>
                    </div>

                    <div class="card-body">
                        @if ($media->count() == 0)
                            <p class="text-muted">Belum ada file media yang diupload.</p>
                        @else
                            <div class="row row-cols-2 g-3">
                                @foreach ($media as $m)
                                    <div class="col">
                                        <div class="card h-100 border">

                                            {{-- FILE IMAGE --}}
                                            @if (Str::contains($m->mime_type, 'image'))
                                                @php
                                                    $fileUrl = Storage::disk('public')->exists('media/'.$m->file_name)
                                                        ? asset('storage/media/'.$m->file_name)
                                                        : asset('media/profile/images/placeholder.png');
                                                @endphp
                                                <a href="{{ $fileUrl }}" target="_blank">
                                                    <img src="{{ $fileUrl }}"
                                                         class="card-img-top"
                                                         style="height:180px;object-fit:cover;">
                                                </a>
                                            @else
                                                {{-- FILE NON IMAGE --}}
                                                <div class="p-4 text-center bg-light">
                                                    <i class="bi bi-file-earmark-text fs-1"></i>
                                                    <p class="small mt-2">
                                                        {{ Str::limit($m->file_name, 20) }}
                                                    </p>
                                                </div>
                                            @endif

                                            {{-- ACTION --}}
                                            <div class="card-footer p-2 bg-white">
                                                <div class="d-flex gap-1">
                                                    <a href="{{ asset('storage/media/'.$m->file_name) }}"
                                                       target="_blank"
                                                       class="btn btn-outline-primary btn-sm flex-fill">
                                                        Lihat
                                                    </a>

                                                    <a href="{{ asset('storage/media/'.$m->file_name) }}"
                                                       download
                                                       class="btn btn-outline-success btn-sm flex-fill">
                                                        Download
                                                    </a>

                                                    <form action="{{ route('media.delete', $m->media_id) }}"
                                                          method="POST"
                                                          class="flex-fill">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-outline-danger btn-sm w-100"
                                                                onclick="return confirm('Hapus file ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
