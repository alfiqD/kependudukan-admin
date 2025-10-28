<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Kependudukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4A90E2, #50E3C2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
            background-color: #fff;
        }
        .card h3 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .form-control:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }
        .btn-primary {
            background-color: #4A90E2;
            border-color: #4A90E2;
        }
        .btn-primary:hover {
            background-color: #357ABD;
            border-color: #357ABD;
        }
        .text-center a {
            color: #4A90E2;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .icon-header {
            font-size: 3rem;
            color: #50E3C2;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>

<div class="card col-11 col-md-6 col-lg-4">
    <div class="text-center">
        <i class="bi bi-people-fill icon-header"></i>
        <h3>Login Sistem Kependudukan</h3>
    </div>

    <!-- Error Message -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/auth/login">
        @csrf
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan username">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
        </div>

        <button class="btn btn-primary w-100 mb-2" type="submit">Masuk</button>
    </form>

    <div class="text-center mt-3">
        <p>Belum punya akun? <a href="/register">Registrasi di sini</a></p>
    </div>
</div>
@include('layouts.admin.whatsapp')


</body>
</html>
