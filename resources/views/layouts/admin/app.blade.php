<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    {{-- logo di nama ats url --}}
    <link rel="icon" href="/assets/admin/img/LGO_Atas.png">
    <link rel="shortcut icon" href="/assets/admin/img/LGO_Atas.png">

    {{-- start css --}}
    @include('layouts.admin.css')

    @stack('custom-css') {{--masalah utama kenapa gk muncul tombol logout --}}


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

        {{-- Sidebar --}}
        @include('layouts.admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                {{-- Topbar --}}
                @include('layouts.admin.header')

                {{-- Halaman utama (index/create dll) --}}
                <div class="container-fluid mt-4">
                    @yield('content')
                </div>

                {{-- Footer --}}
                @include('layouts.admin.footer')
            </div>

            {{-- Footer --}}
            {{-- //@include('layouts.admin.footer') --}}

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
    @include('layouts.admin.js')

</body>

</html>
