<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun — Premium</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/assets/admin/img/LGO_Atas.png">
    <link rel="shortcut icon" href="/assets/admin/img/LGO_Atas.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #1E3C72;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 22px;
            padding: 45px 40px;
            width: 100%;
            max-width: 520px;
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
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

        .form-control {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            height: 48px;
            border-radius: 12px;
        }

        .form-control::placeholder {
            color: #e6e6e6;
        }

        .form-control:focus {
            border-color: #6BCBFF;
            box-shadow: 0 0 12px rgba(107, 203, 255, 0.4);
        }

        .btn-premium {
            background: linear-gradient(135deg, #6BCBFF, #4A90E2);
            border: none;
            padding: 12px 0;
            border-radius: 12px;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            transition: 0.25s;
        }

        .btn-premium:hover {
            background: linear-gradient(135deg, #4A90E2, #1F65B8);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.25);
            transform: translateY(-2px);
        }

        a {
            color: #6BCBFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="register-card">

        <h3 class="fw-semibold text-center mb-4">
            <i class="bi bi-person-plus-fill me-2"></i>Registrasi Akun Baru
        </h3>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="m-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="/auth/register">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap"
                    value="<?php echo e(old('name')); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email"
                    value="<?php echo e(old('email')); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control" required>
                    <option value="">— Pilih Role —</option>
                    <option value="admin">Admin</option>
                    <option value="kepala_desa">Kepala Desa</option>
                    <option value="staff_desa">Staff Desa</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password">
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password">
            </div>

            <button class="btn-premium w-100 mb-3" type="submit">Daftar</button>
        </form>

        <div class="text-center mt-2">
            Sudah punya akun? <a href="/auth">Masuk di sini</a>
        </div>

    </div>

</body>

</html>
<?php /**PATH C:\Alyah2SIB\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/auth/register-form.blade.php ENDPATH**/ ?>