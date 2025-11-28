@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Anggota Keluarga</h1>

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah Data -->
        <a href="{{ route('anggota_keluarga.create') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline" class="me-1"></ion-icon>
            Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <form method="GET" action="{{ route('anggota_keluarga.index') }}"
                        class="d-flex flex-column flex-md-row justify-content-between mb-3 gap-2">

                        {{-- SEARCH --}}
                        <div class="input-group input-group-sm" style="width:100%; max-width:260px;">
                            {{-- simpan filter saat searching --}}
                            @if (request('hubungan'))
                                <input type="hidden" name="hubungan" value="{{ request('hubungan') }}">
                            @endif

                            <input type="text" name="search" class="form-control" placeholder="Cari ID Anggota..."
                                value="{{ request('search') }}" style="height:38px; border-radius:5px 0 0 5px;">

                            <button class="btn btn-outline-secondary" type="submit" style="height:38px;">
                                <i class="bi bi-search fs-6"></i>
                            </button>

                            @if (request('search') || request('hubungan'))
                                <a href="{{ route('anggota_keluarga.index') }}"
                                    class="btn btn-outline-secondary d-flex align-items-center" style="height:38px;">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            @endif
                        </div>

                        {{-- FILTER HUBUNGAN --}}
                        <div class="d-flex gap-2">
                            {{-- simpan search saat filtering --}}
                            @if (request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            <select name="hubungan" class="form-select form-select-sm"
                                style="width: 150px; height:38px; border-radius:6px; background:#f8f9fa;"
                                onchange="this.form.submit()">

                                <option value="">- Hubungan -</option>
                                <option value="Kepala Keluarga" {{ request('hubungan') == 'Kepala Keluarga' ? 'selected' : '' }}>
                                    Kepala Keluarga</option>
                                <option value="Istri" {{ request('hubungan') == 'Istri' ? 'selected' : '' }}>Istri</option>
                                <option value="Anak" {{ request('hubungan') == 'Anak' ? 'selected' : '' }}>Anak</option>
                                <option value="Lainnya" {{ request('hubungan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                    </form>



                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Anggota ID</th>
                                <th>KK ID</th>
                                <th>Warga ID</th>
                                <th>Hubungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($anggota as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    {{-- Sesuai permintaan --}}
                                    <td>{{ $data->anggota_id }}</td>
                                    <td>{{ $data->kk_id }}</td>
                                    <td>{{ $data->warga_id }}</td>
                                    <td>{{ $data->hubungan }}</td>

                                    <td>
                                        <div style="display: inline-flex; align-items: center; gap: 3px;">
                                            <a href="{{ route('anggota_keluarga.edit', $data->anggota_id) }}"
                                                class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                                <ion-icon name="create-outline"></ion-icon>
                                                Edit
                                            </a>

                                            <form action="{{ route('anggota_keluarga.destroy', $data->anggota_id) }}"
                                                method="POST" style="margin: 0; padding: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm d-flex align-items-center gap-1 btn-delete">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $anggota->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection
