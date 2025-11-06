<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Registrasi Berhasil' }}</title>
    {{-- logo di nama ats url --}}
    <link rel="icon" href="/assets/admin/img/favicon32.png">
    <link rel="shortcut icon" href="/assets/admin/img/favicon32.png">
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
            padding: 2.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.2);
            background-color: #fff;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        .success-icon {
            font-size: 4rem;
            color: #50E3C2;
            margin-bottom: 1rem;
            animation: bounce 1s;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-15px);}
            60% {transform: translateY(-7px);}
        }
        p {
            font-size: 16px;
            margin: 0.5rem 0;
        }
        .btn-primary {
            background-color: #4A90E2;
            border-color: #4A90E2;
        }
        .btn-primary:hover {
            background-color: #357ABD;
            border-color: #357ABD;
        }
    </style>
</head>
<body>

<div class="card shadow-lg">
    <div class="success-icon">
        <i class="bi bi-check-circle-fill"></i>
    </div>
    <h3 class="mb-3">{{ $title ?? 'Akun Berhasil Dibuat!' }}</h3>

    @if(isset($name))
        <p><strong>Nama Lengkap:</strong> {{ $name }}</p>
    @endif

    @if(isset($email))
        <p><strong>Email:</strong> {{ $email }}</p>
    @endif

    <a href="/auth" class="btn btn-primary btn-lg mt-3">
        <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Login
    </a>
</div>

</body>
</html>
