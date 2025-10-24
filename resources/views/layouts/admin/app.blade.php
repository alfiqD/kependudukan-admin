<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    {{-- start css --}}
    @include('layouts.admin.css')

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

    <!-- Scripts -->
    @include('layouts.admin.js')

</body>
</html>
