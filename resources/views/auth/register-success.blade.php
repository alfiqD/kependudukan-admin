<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Registrasi Berhasil' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            background-color: #fff;
            text-align: center;
        }
        .success-icon {
            font-size: 60px;
            color: #0d6efd; /* Ubah centang jadi biru */
            margin-bottom: 20px;
            animation: bounce 1s;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-15px);}
            60% {transform: translateY(-7px);}
        }
    </style>
</head>
<body>

<div class="card w-50">
    <div class="success-icon">
        <i class="fas fa-check-circle"></i>
    </div>
    <h3 class="mb-3">{{ $title ?? 'Akun Berhasil Dibuat!' }}</h3>

    @if(isset($username))
        <p><strong>Username:</strong> {{ $username }}</p>
    @endif

    @if(isset($email))
        <p><strong>Email:</strong> {{ $email }}</p>
    @endif

    <a href="/auth" class="btn btn-primary btn-lg mt-3">
        <i class="fas fa-sign-in-alt me-2"></i> Kembali ke Login
    </a>
</div>

</body>
</html>
