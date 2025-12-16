@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Peristiwa Pindah</h1>

        {{-- Alert Error --}}
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

        {{-- Style Form --}}
        <style>
            .form-select,
            .form-control,
            textarea.form-control {
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
                <form action="{{ route('peristiwa_pindah.update', $pindah->pindah_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- =================== ROW 1 =================== --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Nama Warga</label>
                                <select name="warga_id" class="form-select" required>
                                    <option value="">-- Pilih Warga --</option>
                                    @foreach ($wargaList as $warga)
                                        <option value="{{ $warga->warga_id }}"
                                            {{ old('warga_id', $pindah->warga_id) == $warga->warga_id ? 'selected' : '' }}>
                                            {{ $warga->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Tanggal Pindah</label>
                                <input type="date" name="tgl_pindah" class="form-control"
                                    value="{{ old('tgl_pindah', $pindah->tgl_pindah) }}" required>
                            </div>
                        </div>
                    </div>

                    {{-- =================== ROW 2 =================== --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Alamat Tujuan</label>
                                <textarea name="alamat_tujuan" rows="3" class="form-control" required>{{ old('alamat_tujuan', $pindah->alamat_tujuan) }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Alasan Pindah</label>
                                <input type="text" name="alasan" class="form-control" value="{{ old('alasan', $pindah->alasan) }}">
                            </div>
                        </div>
                    </div>

                    {{-- =================== ROW 3 =================== --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label class="form-label">Nomor Surat Pindah</label>
                                <input type="text" name="no_surat" class="form-control" value="{{ old('no_surat', $pindah->no_surat) }}">
                            </div>
                        </div>
                    </div>

                    {{-- =================== ROW 4 (UPLOAD) =================== --}}
                    <div class="mb-3">
                        <label class="form-label">Upload Berkas (Multiple)</label>
                        <input type="file" name="media_files[]" class="form-control" multiple>
                        <small class="text-muted">
                            Anda bisa upload lebih dari 1 file.
                        </small>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('peristiwa_pindah.index') }}" class="btn btn-secondary me-2">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
