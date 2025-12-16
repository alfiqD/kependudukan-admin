@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data User</h1>

        {{-- Alert sukses (fallback jika JS mati) --}}
        @if (session('success'))
            <div class="alert alert-success d-none d-md-block">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol tambah --}}
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline"></ion-icon>
            Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    {{-- SEARCH & FILTER --}}
                    <form method="GET" action="{{ route('users.index') }}" class="d-flex justify-content-between mb-3">

                        {{-- Search --}}
                        <div class="input-group input-group-sm" style="width: 260px;">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama..."
                                value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-search"></i>
                            </button>

                            @if (request('search') || request('filter'))
                                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            @endif
                        </div>

                        {{-- Filter --}}
                        <select name="filter" class="form-select form-select-sm" style="width: 150px;"
                            onchange="this.form.submit()">
                            <option value="">Filter Email</option>
                            <option value="gmail" {{ request('filter') == 'gmail' ? 'selected' : '' }}>Gmail</option>
                            <option value="yahoo" {{ request('filter') == 'yahoo' ? 'selected' : '' }}>Yahoo</option>
                            <option value="outlook" {{ request('filter') == 'outlook' ? 'selected' : '' }}>Outlook</option>
                            <option value="lainnya" {{ request('filter') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </form>

                    {{-- TABLE --}}
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th width="50">No</th>
                                <th width="90">Foto</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th width="120">Role</th>
                                <th>Password (Hash)</th>
                                <th width="170">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="text-center">
                                        {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                    </td>

                                    {{-- FOTO PROFIL --}}
                                    <td class="text-center">
                                        @if ($user->profile_picture)
                                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto"
                                                class="rounded-circle" width="45" height="45"
                                                style="object-fit: cover;">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td class="text-center">
                                        @if ($user->role === 'admin')
                                            <span class="badge bg-primary">Admin</span>
                                        @elseif ($user->role === 'staff_desa')
                                            <span class="badge bg-success">Staff Desa</span>
                                        @elseif ($user->role === 'kepala_desa')
                                            <span class="badge bg-dark">Kepala Desa</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Diketahui</span>
                                        @endif
                                    </td>


                                    <td style="max-width: 300px; word-break: break-all;">
                                        <small class="text-muted">{{ $user->password }}</small>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user) }}"
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                            <ion-icon name="create-outline"></ion-icon>
                                            Edit
                                        </a>

                                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                                            class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="btn btn-danger btn-sm btn-delete d-inline-flex align-items-center gap-1">
                                                <ion-icon name="trash-outline"></ion-icon>
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        Belum ada data user.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert Hapus --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Yakin hapus?',
                        text: 'Data user yang dihapus tidak dapat dikembalikan!',
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

    {{-- SweetAlert Sukses --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection
