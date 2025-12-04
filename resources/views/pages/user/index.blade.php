@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data User</h1>

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah Data -->
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline" class="me-1"></ion-icon>
            Tambah Data
        </a>


        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <form method="GET" action="{{ route('users.index') }}" class="d-flex justify-content-between mb-3">
                        {{-- SEARCH --}}
                        <div class="input-group input-group-sm" style="width: 260px;">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama..."
                                value="{{ request('search') }}" style="height: 38px; border-radius: 5px;">
                            <button class="btn btn-outline-secondary" type="submit" style="height: 38px;">
                                <i class="bi bi-search fs-5"></i>
                            </button>

                            @if (request('search') || request('filter'))
                                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary"
                                    style="height: 38px;">
                                    <i class="bi bi-x-lg fs-5"></i>
                                </a>
                            @endif
                        </div>

                        {{-- FILTER EMAIL --}}
                        <select name="filter" class="form-select form-select-sm"
                            style="width: 150px; border-radius: 6px; background: #f8f9fa; color: #000;"
                            onchange="this.form.submit()">

                            <option value="">Filter Email</option>
                            <option value="gmail" {{ request('filter') == 'gmail' ? 'selected' : '' }}>Gmail</option>
                            <option value="yahoo" {{ request('filter') == 'yahoo' ? 'selected' : '' }}>Yahoo</option>
                            <option value="outlook" {{ request('filter') == 'outlook' ? 'selected' : '' }}>Outlook</option>
                            <option value="lainnya" {{ request('filter') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </form>


                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Password (Hash)</th> {{-- Kolom baru --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role == 'admin')
                                            <span class="badge bg-primary">Admin</span>
                                        @elseif($user->role == 'petugas')
                                            <span class="badge bg-success">Petugas</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Warga</span>
                                        @endif
                                    </td>

                                    {{-- tampilkan hash password --}}
                                    <td style="max-width: 350px; word-break: break-all;">
                                        <small class="text-muted">{{ $user->password }}</small>
                                    </td>

                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('users.edit', $user) }}"
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                            <ion-icon name="create-outline" class="me-1"></ion-icon>
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('users.destroy', $user) }}" method="POST"
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


                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data user.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Konfirmasi hapus dengan SweetAlert --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: "Data user yang dihapus tidak bisa dikembalikan!",
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
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    {{-- Pop-up sukses --}}
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
