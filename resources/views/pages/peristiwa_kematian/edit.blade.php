@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Peristiwa Kematian</h1>

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

                <form action="{{ route('peristiwa_kematian.update', $kematian->kematian_id) }}"
                      method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- ======================= ROW 1 ======================= --}}
                    <div class="row mb-3">

                        {{-- Nama Warga --}}
                        <div class="col-md-6">
                            <label class="form-label">Nama Warga</label>
                            <select name="warga_id" class="form-select" required>
                                <option value="">-- Pilih Warga --</option>
                                @foreach ($wargaList as $warga)
                                    <option value="{{ $warga->warga_id }}"
                                        {{ $kematian->warga_id == $warga->warga_id ? 'selected' : '' }}>
                                        {{ $warga->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tanggal Meninggal --}}
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Meninggal</label>
                            <input type="date" name="tgl_meninggal"
                                   class="form-control"
                                   value="{{ $kematian->tgl_meninggal }}"
                                   required>
                        </div>

                    </div>

                    {{-- ======================= ROW 2 ======================= --}}
                    <div class="row mb-3">

                        {{-- Sebab Kematian --}}
                        <div class="col-md-6">
                            <label class="form-label">Sebab Kematian</label>
                            <input type="text" name="sebab"
                                   class="form-control"
                                   value="{{ $kematian->sebab }}">
                        </div>

                        {{-- Lokasi Kematian --}}
                        <div class="col-md-6">
                            <label class="form-label">Lokasi Kematian</label>
                            <input type="text" name="lokasi"
                                   class="form-control"
                                   value="{{ $kematian->lokasi }}">
                        </div>

                    </div>

                    {{-- ======================= ROW 3 ======================= --}}
                    <div class="row mb-3">

                        {{-- Nomor Surat --}}
                        <div class="col-md-6">
                            <label class="form-label">Nomor Surat</label>
                            <input type="text" name="no_surat"
                                   class="form-control"
                                   value="{{ $kematian->no_surat }}">
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
                        <a href="{{ route('peristiwa_kematian.index') }}"
                           class="btn btn-secondary"
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
