@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Peristiwa Kematian</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Custom Style --}}
        <style>
            select.form-select,
            input.form-control {
                background-color: #ffffff !important;
                color: #000 !important;
                border: 1px solid #ced4da !important;
                padding: 10px 12px !important;
                border-radius: 6px !important;
            }

            .form-group-custom {
                margin-bottom: 20px;
            }
        </style>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('peristiwa_kematian.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- =================== BARIS 1 =================== --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Nama Warga</label>
                                <select name="warga_id" class="form-select" required>
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach ($wargaList as $warga)
                                        <option value="{{ $warga->warga_id }}">{{ $warga->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Tanggal Meninggal</label>
                                <input type="date" name="tgl_meninggal" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    {{-- =================== BARIS 2 =================== --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Sebab Kematian</label>
                                <input type="text" name="sebab" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Lokasi Kematian</label>
                                <input type="text" name="lokasi" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- =================== BARIS 3 =================== --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Nomor Surat Kematian</label>
                                <input type="text" name="no_surat" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- =================== BARIS 4 (UPLOAD) =================== --}}
                    <div class="mb-3">
                        <label class="form-label">Upload Berkas (Multiple)</label>
                        <input type="file" name="media_files[]" class="form-control" multiple>
                        <small class="text-muted">
                            Anda bisa upload lebih dari 1 file.
                        </small>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('peristiwa_kematian.index') }}" class="btn btn-secondary"
                            style="margin-right: 5px;">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
