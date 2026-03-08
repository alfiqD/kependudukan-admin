<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Sistem Penduduk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/assets/admin/img/LGO.png">
    <link rel="shortcut icon" href="/assets/admin/img/LGO.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #1E3C72 0%, #2A5298 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .login-wrapper {
            display: flex;
            width: 100%;
            max-width: 1100px;
            min-height: 520px;
            /* DIKURANGI dari 620px */
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* LEFT SIDE - PHOTO */
        .left-section {
            flex: 0 0 55%;
            position: relative;
            background: #1E3C72;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slideshow-container {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Kembali ke cover, tapi dengan penyesuaian */
            object-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        /* Overlay untuk kontras teks */
        .slideshow-container::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40%;
            background: linear-gradient(to top, rgba(30, 60, 114, 0.9), transparent);
            z-index: 1;
        }

        .left-caption {
            position: absolute;
            bottom: 30px;
            left: 30px;
            right: 30px;
            z-index: 2;
            color: white;
        }

        .left-caption h3 {
            font-size: 1.7rem;
            font-weight: 700;
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .left-caption p {
            font-size: 1rem;
            opacity: 0.95;
            max-width: 500px;
            line-height: 1.4;
        }

        /* RIGHT SIDE - FORM */
        .right-section {
            flex: 0 0 45%;
            padding: 40px 40px;
            /* DIKURANGI padding */
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
            height: 100%;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
            /* DIKURANGI */
        }

        .logo-login {
            width: 90px;
            /* DIKECILKAN */
            height: 90px;
            object-fit: contain;
            margin-bottom: 20px;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(30, 60, 114, 0.15);
        }

        .login-header h2 {
            color: #1E3C72;
            font-size: 1.6rem;
            /* DIKECILKAN */
            font-weight: 700;
            margin-bottom: 6px;
            line-height: 1.2;
        }

        .login-header h2 span {
            color: #4A90E2;
        }

        .login-header p {
            color: #666;
            font-size: 0.9rem;
            /* DIKECILKAN */
        }

        .form-label {
            color: #333;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 6px;
            display: block;
        }

        .form-control {
            height: 46px;
            /* DIKECILKAN */
            border: 2px solid #e1e5eb;
            border-radius: 10px;
            padding: 0 14px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-control:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.15);
            background: white;
        }

        .form-control::placeholder {
            color: #9aa5b8;
            font-size: 14px;
        }

        .mb-3 {
            margin-bottom: 18px !important;
            /* DIKURANGI */
        }

        .mb-4 {
            margin-bottom: 22px !important;
            /* DIKURANGI */
        }

        .btn-login {
            background: linear-gradient(135deg, #4A90E2 0%, #1E3C72 100%);
            border: none;
            color: white;
            height: 48px;
            /* DIKECILKAN */
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 60, 114, 0.2);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            /* DIKURANGI */
            padding-top: 20px;
            border-top: 1px solid #eef2f7;
            color: #666;
            font-size: 0.9rem;
        }

        .register-link a {
            color: #4A90E2;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .register-link a:hover {
            color: #1E3C72;
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
            border: none;
            padding: 14px;
            /* DIKURANGI */
            margin-bottom: 20px;
            background: linear-gradient(135deg, #ff6b6b 0%, #ff4757 100%);
            color: white;
            font-size: 0.9rem;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
            font-size: 0.9rem;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 992px) {
            .login-wrapper {
                flex-direction: row;
                max-width: 900px;
                min-height: 480px;
                /* DIKURANGI */
            }

            .right-section {
                padding: 35px 30px;
                /* DIKURANGI */
            }

            .left-caption {
                bottom: 25px;
                left: 25px;
                right: 25px;
            }

            .left-caption h3 {
                font-size: 1.5rem;
            }

            .left-caption p {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
                max-width: 480px;
                min-height: auto;
            }

            .left-section {
                height: 240px;
                /* DIKURANGI */
                flex: unset;
            }

            .right-section {
                flex: unset;
                padding: 35px 25px;
                /* DIKURANGI */
            }

            .left-caption {
                bottom: 20px;
                left: 20px;
                right: 20px;
            }

            .left-caption h3 {
                font-size: 1.4rem;
            }

            .left-caption p {
                font-size: 0.9rem;
            }

            .logo-login {
                width: 80px;
                height: 80px;
            }

            .login-header h2 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .login-wrapper {
                border-radius: 18px;
            }

            .right-section {
                padding: 30px 20px;
            }

            .left-section {
                height: 220px;
                /* DIKURANGI */
            }

            .logo-login {
                width: 70px;
                height: 70px;
                margin-bottom: 15px;
            }

            .login-header h2 {
                font-size: 1.4rem;
            }

            .form-control {
                height: 44px;
            }

            .btn-login {
                height: 46px;
                font-size: 14px;
            }

            .left-caption {
                bottom: 15px;
                left: 15px;
                right: 15px;
            }

            .left-caption h3 {
                font-size: 1.2rem;
            }

            .left-caption p {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 380px) {
            .left-section {
                height: 200px;
            }

            .right-section {
                padding: 25px 18px;
            }

            .logo-login {
                width: 65px;
                height: 65px;
            }

            .login-header h2 {
                font-size: 1.3rem;
            }

            .form-control {
                height: 42px;
            }

            .btn-login {
                height: 44px;
            }
        }
    </style>
</head>

<body>
    <div class="login-wrapper">

        <!-- LEFT SIDE: PHOTO SLIDESHOW -->
        <div class="left-section">
            <div class="slideshow-container">
                <img src="/media/slideshow/indonesia1.png" class="slide active" alt="Desa Indonesia">
                <img src="/media/slideshow/indonesia2.png" class="slide" alt="Pemerintah Desa">
                <img src="/media/slideshow/indonesia3.png" class="slide" alt="Kependudukan">
            </div>

            <div class="left-caption">
                <h3>Pusat Data Penduduk</h3>
                <p>Kelola data warga dan keluarga desa dengan mudah, cepat, dan aman.</p>
            </div>
        </div>

        <!-- RIGHT SIDE: LOGIN FORM -->
        <div class="right-section">
            <div class="login-header">
                <img src="/assets/admin/img/LGO.png" class="logo-login" alt="Logo Kependudukan">
                <h2>Login Sistem <span>Penduduk</span></h2>
                <p>Akses pusat data penduduk desa</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="m-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="/auth/login">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username"
                        value="<?php echo e(old('username')); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email"
                        value="<?php echo e(old('email')); ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password"
                        required>
                </div>

                <button class="btn-login w-100" type="submit">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                </button>
            </form>

            <div class="register-link">
                Belum punya akun? <a href="/register">Registrasi di sini</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            let current = 0;

            // Preload images
            slides.forEach(slide => {
                const img = new Image();
                img.src = slide.src;
            });

            function nextSlide() {
                slides[current].classList.remove('active');
                current = (current + 1) % slides.length;
                slides[current].classList.add('active');
            }

            // Start slideshow
            setTimeout(() => {
                setInterval(nextSlide, 4000);
            }, 1000);

            // Keyboard support
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    document.querySelector('form').submit();
                }
            });
        });
    </script>

</body>

</html>
<?php /**PATH C:\Alyah2SIB\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/auth/login-form.blade.php ENDPATH**/ ?>