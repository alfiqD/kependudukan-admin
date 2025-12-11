<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    
    <link rel="icon" href="/assets/admin/img/LOGO-aja.png">
    <link rel="shortcut icon" href="/assets/admin/img/LOGO-aja.png">

    
    <?php echo $__env->make('layouts.admin.css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <style>
        .logo-login {
            display: block;
            max-width: 100%;
            /* supaya tidak melebihi container */
            width: 180px;
            /* ukuran lebar yang kamu inginkan */
            height: auto;
            /* tinggi otomatis supaya proporsional */
            object-fit: contain;
            /* memastikan gambar tidak terpotong */
        }

        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 80px;
            /* posisi lebih ke atas */
            right: 25px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .whatsapp-float:hover {
            background-color: #1ebe5a;
            transform: scale(1.1);
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" class="d-flex">

        
        <?php echo $__env->make('layouts.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <?php echo $__env->make('layouts.admin.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                
                <div class="container-fluid mt-4">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

                
                <?php echo $__env->make('layouts.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>

            
            

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20Pusat%20Data%20Keluarga."
        target="_blank" class="whatsapp-float" title="Hubungi kami via WhatsApp">
        <ion-icon name="logo-whatsapp"></ion-icon>
    </a>

    <!-- Scripts -->
    <?php echo $__env->make('layouts.admin.js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html>
<?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/layouts/admin/app.blade.php ENDPATH**/ ?>