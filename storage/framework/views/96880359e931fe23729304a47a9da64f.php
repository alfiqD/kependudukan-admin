<?php $__env->startSection('content'); ?>

<div class="container py-6">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-3xl overflow-hidden animate__animated animate__fadeIn">

        <!-- Header + Foto -->
        <div class="relative h-40 bg-gradient-to-r from-indigo-600 to-blue-500">
            <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2">
                <img src="<?php echo e(asset('media/profile/alfiq.jpg')); ?>"
     class="rounded-full border-4 border-white shadow-xl object-cover"
     style="width: 110px; height: 110px;" alt="Foto Pengembang">

            </div>
        </div>

        <div class="p-6 mt-16 text-center">
            <h2 class="text-3xl font-bold">Alfiq Debriliant</h2>
            <p class="text-gray-500 -mt-1">Web Developer • Software Engineer</p>

            <!-- Badge Skills -->
            <div class="flex justify-center gap-2 mt-4 flex-wrap">
                <?php $__currentLoopData = ['Laravel','PHP','JavaScript','MySQL']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700 hover:bg-indigo-100 transition">
                        <?php echo e($skill); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <hr class="my-6">

            <!-- Section Singkat Identitas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">

                <div class="p-4 bg-gray-50 rounded-xl shadow hover:shadow-md transition">
                    <strong>Nama</strong>
                    <p class="text-gray-700">Alfiq Debriliant</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-xl shadow hover:shadow-md transition">
                    <strong>NIM</strong>
                    <p class="text-gray-700">2457301007</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-xl shadow hover:shadow-md transition">
                    <strong>Email</strong>
                    <p class="text-gray-700">alfiq24si@mahasiswa.pcr.ac.id</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-xl shadow hover:shadow-md transition">
                    <strong>Program Studi</strong>
                    <p class="text-gray-700">Sistem Informasi</p>
                </div>

            </div>

            <!-- Tentang Saya -->
            <div class="mt-6 text-left">
                <h3 class="text-xl font-semibold mb-2">Tentang Saya</h3>
                <p class="text-gray-600 leading-relaxed">
                    Saya adalah Web Developer yang fokus pada pengembangan aplikasi modern menggunakan
                    Laravel, PHP, dan JavaScript. Berorientasi pada kualitas, kecepatan, dan desain yang clean.
                </p>
            </div>

            <!-- Bar Skill -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-3 text-left">Keahlian</h3>

                <?php
                    $skills = [
                        'HTML & CSS' => 90,
                        'JavaScript' => 75,
                        'Laravel' => 85,
                        'PHP' => 80,
                    ];
                ?>

                <div class="space-y-4">
                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $percent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div class="flex justify-between">
                                <p class="font-semibold"><?php echo e($title); ?></p>
                                <span class="text-gray-500"><?php echo e($percent); ?>%</span>
                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-indigo-600 h-2 rounded-full transition-all duration-700"
                                     style="width: <?php echo e($percent); ?>%"></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Sosial Media -->
            <div class="mt-10">
                <h4 class="text-lg font-semibold mb-2">Media Sosial</h4>
                <div class="flex justify-center gap-6 text-2xl">
                    <a href="#" class="text-blue-700 hover:scale-110 transition"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-gray-800 hover:scale-110 transition"><i class="fab fa-github"></i></a>
                    <a href="#" class="text-pink-500 hover:scale-110 transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-blue-400 hover:scale-110 transition"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <!-- Tombol -->
            <div class="mt-8 mb-5">
                <a href="#"
                   class="px-6 py-2 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700 hover:scale-105 transition">
                    Edit Profil
                </a>
            </div>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/profile/pengembang.blade.php ENDPATH**/ ?>