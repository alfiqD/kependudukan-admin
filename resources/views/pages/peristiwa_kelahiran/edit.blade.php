@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Peristiwa Kelahiran</h1>

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
            .form-control {
                background-color: #ffffff !important;
                color: #000 !important;
                border: 1px solid #ced4da !important;
                padding: 8px 12px !important;
                border-radius: 6px !important;
            }
        </style>

        <div class="card shadow mb-4">
            <div class="card-body">

                <form action="{{ route('peristiwa_kelahiran.update', $kelahiran->kelahiran_id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- ======================= ROW 1 ======================= --}}
                    <div class="row mb-3">

                        {{-- Nama Bayi --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Bayi</label>
                            <select name="warga_id" class="form-select" required>
                                <option value="">-- Pilih Anak --</option>
                                @foreach ($anakList as $anak)
                                    <option value="{{ $anak->warga_id }}"
                                        {{ $kelahiran->warga_id == $anak->warga_id ? 'selected' : '' }}>
                                        {{ $anak->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="{{ $kelahiran->tgl_lahir }}"
                                required>
                        </div>

                    </div>

                    {{-- ======================= ROW 2 ======================= --}}
                    <div class="row mb-3">

                        {{-- Nama Ayah --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Ayah</label>
                            <select name="ayah_warga_id" class="form-select" required>
                                <option value="">-- Pilih Ayah --</option>
                                @foreach ($ayahList as $ayah)
                                    <option value="{{ $ayah->warga_id }}"
                                        {{ $kelahiran->ayah_warga_id == $ayah->warga_id ? 'selected' : '' }}>
                                        {{ $ayah->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tempat Lahir --}}
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                value="{{ $kelahiran->tempat_lahir }}" required>
                        </div>

                    </div>

                    {{-- ======================= ROW 3 ======================= --}}
                    <div class="row mb-3">

                        {{-- Nama Ibu --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Ibu</label>
                            <select name="ibu_warga_id" class="form-select" required>
                                <option value="">-- Pilih Ibu --</option>
                                @foreach ($ibuList as $ibu)
                                    <option value="{{ $ibu->warga_id }}"
                                        {{ $kelahiran->ibu_warga_id == $ibu->warga_id ? 'selected' : '' }}>
                                        {{ $ibu->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nomor Akta --}}
                        <div class="col-md-6">
                            <label class="form-label">Nomor Akta</label>
                            <input type="text" name="no_akta" class="form-control" value="{{ $kelahiran->no_akta }}"
                                required>
                        </div>

                    </div>

                    {{-- ======================= Upload File ======================= --}}
                    <div class="mb-3">
                        <label class="form-label">Upload Berkas (Multiple)</label>
                        <input type="file" name="media_files[]" class="form-control" multiple>
                        <small class="text-muted">
                            Anda bisa upload lebih dari 1 file. File lama tetap tersimpan.
                        </small>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('peristiwa_kelahiran.index') }}" class="btn btn-secondary"
                            style="margin-right: 5px;">
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
