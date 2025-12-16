@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <h2 class="mb-4">Detail Peristiwa Kematian</h2>

        {{-- BACK BUTTON --}}
        <a href="{{ route('peristiwa_kematian.index') }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        {{-- WRAPPER FLEX --}}
        <div class="row g-4">

            {{-- INFORMASI KEMATIAN --}}
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

            {{-- MEDIA / DOKUMEN --}}
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <strong>Dokumen / Foto Pendukung</strong>
                    </div>
                    <div class="card-body">
                        @if (!isset($media) || $media->count() == 0)
                            <p class="text-muted">Belum ada file media yang diupload.</p>
                        @else
                            <div class="row row-cols-2 g-3">
                                @foreach ($media as $m)
                                    <div class="col">
                                        <div class="card h-100 border">

                                            {{-- FILE IMAGE --}}
                                            @if (Str::contains($m->mime_type, 'image'))
                                                @php
                                                    $fileUrl = $m->file_name && Storage::disk('public')->exists('media/'.$m->file_name)
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

                                            {{-- FOOTER: Tombol Aksi --}}
                                            <div class="card-footer p-2 bg-white">
                                                <div class="d-flex justify-content-between gap-1">
                                                    <a href="{{ asset('storage/media/'.$m->file_name) }}"
                                                       target="_blank"
                                                       class="btn btn-outline-primary btn-sm flex-fill d-flex align-items-center justify-content-center gap-1">
                                                        <i class="bi bi-eye fs-6"></i>
                                                        <span class="d-none d-sm-inline">Lihat</span>
                                                    </a>

                                                    <a href="{{ asset('storage/media/'.$m->file_name) }}" download
                                                       class="btn btn-outline-success btn-sm flex-fill d-flex align-items-center justify-content-center gap-1">
                                                        <i class="bi bi-download fs-6"></i>
                                                        <span class="d-none d-sm-inline">Download</span>
                                                    </a>

                                                    <form action="{{ route('media.delete', $m->media_id) }}" method="POST"
                                                          class="d-inline m-0 flex-fill">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                                class="btn btn-outline-danger btn-sm w-100 d-flex align-items-center justify-content-center gap-1 btn-delete">
                                                            <i class="bi bi-trash fs-6"></i>
                                                            <span class="d-none d-sm-inline">Hapus</span>
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

    <style>
        .card-footer .btn {
            padding: 0.35rem 0.5rem;
            font-size: 0.8rem;
            border-radius: 6px;
            transition: all 0.2s ease;
            min-height: 36px;
        }

        .card-footer .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-footer .btn:active {
            transform: translateY(0);
        }

        .card-footer .btn i {
            font-size: 0.9rem;
        }

        @media (max-width: 576px) {
            .card-footer .btn {
                padding: 0.25rem 0.4rem;
                font-size: 0.75rem;
                min-height: 32px;
            }

            .card-footer .btn i {
                font-size: 0.8rem;
                margin-right: 2px;
            }
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }

        .btn-outline-success:hover {
            background-color: #198754;
            color: white;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .card {
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
