<!-- resources/views/profile/index.blade.php -->
@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profil Pengguna</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4 p-4">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{ asset('storage/profile/' . ($user->foto ?? 'default.png')) }}"
                     class="img-fluid rounded-circle mb-3" width="150" alt="Foto Profil">
            </div>

            <div class="col-md-9">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: {{ $user->email }}</td>
                    </tr>
                </table>

                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary mt-3">
                    Edit Profil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
