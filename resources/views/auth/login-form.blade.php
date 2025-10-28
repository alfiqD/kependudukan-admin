<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Kependudukan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* ======== LAYOUT ======== */
        body {
            background: linear-gradient(135deg, #4A90E2, #50E3C2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
        }

        .card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
            background-color: #fff;
            max-width: 900px;
            width: 100%;
        }

        /* ======== BAGIAN KIRI ======== */
        .left-section {
            background: linear-gradient(135deg, #4A90E2, #50E3C2);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem 2rem;
            text-align: center;
        }

        .left-section img {
            width: 80%;
            max-width: 260px;
            margin-bottom: 1rem;
        }

        .left-section h4 {
            font-weight: 600;
            margin-top: 1rem;
        }

        .left-section p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        /* ======== BAGIAN KANAN (FORM) ======== */
        .right-section {
            padding: 2.5rem;
        }

        .icon-header {
            font-size: 3rem;
            color: #50E3C2;
            margin-bottom: 0.5rem;
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

        /* ======== RESPONSIVE ======== */
        @media (max-width: 768px) {
            .left-section {
                display: none;
            }
            .right-section {
                width: 100%;
            }
        }

        /* ======== FLOATING WHATSAPP ======== */
        .whatsapp-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #25D366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 28px;
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.3);
            transition: 0.3s;
            z-index: 1000;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            background-color: #20b358;
        }
    </style>
</head>
<body>

<div class="card row g-0">
    <!-- Bagian kiri: gambar penduduk -->
    <div class="col-md-6 left-section">
        <img src="https://cdn-icons-png.flaticon.com/512/906/906175.png" alt="Ilustrasi Penduduk">
        <h4>Pusat Data Keluarga</h4>
        <p>Kelola data warga dan keluarga desa dengan mudah, cepat, dan aman.</p>
    </div>

    <!-- Bagian kanan: form login -->
    <div class="col-md-6 right-section">
        <div class="text-center mb-3">
            <i class="bi bi-people-fill icon-header"></i>
            <h3>Login Sistem Kependudukan</h3>
        </div>

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form login --}}
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
</div>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20Pusat%20Data%20Keluarga."
   target="_blank"
   class="whatsapp-float"
   title="Hubungi kami via WhatsApp">
   <i class="bi bi-whatsapp"></i>
</a>

</body>
</html>
