@extends('layouts.admin.app')

@section('content')
    <div class="py-4">

        <h2 class="mb-4">Detail Peristiwa Kelahiran</h2>

        {{-- BACK BUTTON --}}
        <a href="{{ route('peristiwa_kelahiran.index') }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        {{-- WRAPPER FLEX --}}
        <div class="row g-4">

            {{-- INFORMASI KELAHIRAN --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <strong>Informasi Kelahiran</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th width="40%">Nama Bayi</th>
                                <td>{{ $kelahiran->anak->nama ?? $kelahiran->nama_bayi }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin Bayi</th>
                                <td>{{ $kelahiran->anak->jenis_kelamin ?? $kelahiran->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $kelahiran->tgl_lahir ?? $kelahiran->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $kelahiran->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>No Akta</th>
                                <td>{{ $kelahiran->no_akta }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ayah</th>
                                <td>{{ $kelahiran->ayah->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td>{{ $kelahiran->ibu->nama ?? '-' }}</td>
                            </tr>
                        </table>

                        {{-- TOMBOL AKSI --}}
                        <div class="mt-3 d-flex justify-content-end gap-2">

                            <a href="{{ route('peristiwa_kelahiran.edit', $kelahiran->kelahiran_id) }}"
                                class="btn btn-primary">
                                Edit
                            </a>
                        </div>

                    </div>
                </div>
            </div>


            {{-- MEDIA / FOTO --}}
            <div class="col-md-6">
                <div class="card">
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
                                        <div class="card h-100">

                                            {{-- GAMBAR --}}
                                            @if (Str::contains($m->mime_type, 'image'))
                                                <a href="{{ asset('storage/media/' . $m->file_name) }}" target="_blank">
                                                    <img src="{{ asset('storage/media/' . $m->file_name) }}"
                                                        class="card-img-top" style="height: 160px; object-fit: cover;">
                                                </a>
                                            @else
                                                {{-- FILE NON GAMBAR --}}
                                                <div class="p-4 text-center">
                                                    <i class="bi bi-file-earmark-text fs-1"></i>
                                                    <p class="mt-2" style="font-size: 12px;">{{ $m->file_name }}</p>
                                                </div>
                                            @endif

                                            {{-- FOOTER: LIHAT + HAPUS --}}
                                            <div class="card-footer d-flex justify-content-center gap-3">

                                                <a href="{{ asset('storage/media/' . $m->file_name) }}" target="_blank"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye"></i> Lihat
                                                </a>

                                                <form action="{{ route('media.delete', $m->media_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>

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

    {{-- SweetAlert untuk Hapus File --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Yakin ingin menghapus file?',
                        text: "File yang dihapus tidak dapat dikembalikan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

@endsection
