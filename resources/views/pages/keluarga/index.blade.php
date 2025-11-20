@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Kartu Keluarga</h1>

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah Data -->
        <a href="{{ route('keluarga_kk.create') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline" class="me-1"></ion-icon>
            Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <form method="GET" action="{{ route('keluarga_kk.index') }}"
                        class="d-flex flex-column flex-md-row justify-content-between mb-3 gap-2">

                        {{-- SEARCH INPUT --}}
                        <div class="input-group input-group-sm" style="width: 100%; max-width: 300px;">
                            {{-- Simpan nilai filter saat searching --}}
                            @if (request('rt'))
                                <input type="hidden" name="rt" value="{{ request('rt') }}">
                            @endif
                            @if (request('rw'))
                                <input type="hidden" name="rw" value="{{ request('rw') }}">
                            @endif

                            <input type="text" name="search" class="form-control"
                                placeholder="Cari No KK / Nama Kepala..." value="{{ request('search') }}"
                                style="height: 38px; border-radius: 5px 0 0 5px;">

                            <button class="btn btn-outline-secondary" type="submit" style="height: 38px;">
                                <i class="bi bi-search fs-5"></i>
                            </button>

                            @if (request('search') || request('rt') || request('rw'))
                                <a href="{{ route('keluarga_kk.index') }}"
                                    class="btn btn-outline-secondary d-flex align-items-center" style="height: 38px;">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            @endif
                        </div>

                        {{-- FILTER GROUP (RT & RW) --}}
                        <div class="d-flex gap-2">
                            {{-- Simpan nilai search saat filtering --}}
                            @if (request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            {{-- FILTER RT --}}
                            <select name="rt" class="form-select form-select-sm"
                                style="width: 100px; height: 38px; border-radius: 6px; background: #f8f9fa;"
                                onchange="this.form.submit()">
                                <option value="">- RT -</option>
                                <option value="1" {{ request('rt') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ request('rt') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ request('rt') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ request('rt') == '4' ? 'selected' : '' }}>4</option>
                            </select>

                            {{-- FILTER RW --}}
                            <select name="rw" class="form-select form-select-sm"
                                style="width: 100px; height: 38px; border-radius: 6px; background: #f8f9fa;"
                                onchange="this.form.submit()">
                                <option value="">- RW -</option>
                                <option value="1" {{ request('rw') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ request('rw') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ request('rt') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ request('rt') == '4' ? 'selected' : '' }}>4</option>
                            </select>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Nomor KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keluarga as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td> {{-- Ini ganti ID database jadi nomor urut tampilan --}}
                                    <td>{{ $data->kk_nomor }}</td>
                                    <td>{{ $data->kepalaKeluarga->nama ?? '-' }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->rt }}</td>
                                    <td>{{ $data->rw }}</td>
                                    <!-- Tombol Edit & Hapus di tabel -->
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('keluarga_kk.edit', $data) }}"
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                            <ion-icon name="create-outline" class="me-1"></ion-icon>
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('keluarga_kk.destroy', $data) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="btn btn-danger btn-sm btn-delete d-inline-flex align-items-center gap-1">
                                                <ion-icon name="trash-outline" class="me-1"></ion-icon>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $keluarga->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- pop up delete datanya --}}
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
                        showClass: {
                            popup: 'animate__animated animate__zoomIn'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOut'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // baru kirim form kalau user klik "Ya, hapus!"
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



{{-- pop up delete datanya --}}
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
                    showClass: {
                        popup: 'animate__animated animate__zoomIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // baru kirim form kalau user klik "Ya, hapus!"
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
