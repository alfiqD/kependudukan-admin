<?php $__env->startSection('content'); ?>

<div class="container py-5">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-3xl overflow-hidden">

        <!-- Header Banner -->
        <div class="relative h-48 bg-gradient-to-r from-blue-600 to-indigo-700">
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2">
                <img src="<?php echo e(asset('storage/profile/default.png')); ?>"
                     class="rounded-full border-4 border-white shadow-xl" width="130" alt="Foto Pengembang">
            </div>
        </div>

        <div class="p-5 mt-16 text-center">

            <!-- Identitas Pengembang -->
            <div class="bg-gray-50 p-5 rounded-2xl shadow mb-8 text-left">
                <h3 class="text-2xl font-bold mb-4">Identitas Pengembang</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p><strong>Nama:</strong> Alfiq Debriliant</p>
                        <p><strong>NIM:</strong> 2457301007</p>
                        <p><strong>Program Studi:</strong> Sistem Informasi</p>
                    </div>

                    <div class="flex justify-center">
                        <img src="<?php echo e(asset('storage/profile/default.png')); ?>"
                             class="rounded-xl shadow-md border-2" width="150" alt="Foto Pengembang">
                    </div>
                </div>

                <!-- Sosial Media -->
                <div class="mt-5">
                    <h4 class="text-lg font-semibold mb-2">Media Sosial</h4>
                    <div class="flex gap-5 text-3xl">
                        <a href="#" class="text-blue-700 hover:text-blue-900"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-900 hover:text-black"><i class="fab fa-github"></i></a>
                        <a href="#" class="text-pink-500 hover:text-pink-700"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-blue-400 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <h2 class="text-3xl font-bold">Alfiq Debriliant</h2>
            <p class="text-gray-600 text-lg">Web Developer • Software Engineer</p>

            <!-- Skill Tags -->
            <div class="flex justify-center gap-3 mt-4 flex-wrap">
                <span class="px-4 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Laravel</span>
                <span class="px-4 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">PHP</span>
                <span class="px-4 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">JavaScript</span>
                <span class="px-4 py-1 bg-green-100 text-green-700 rounded-full text-sm">MySQL</span>
            </div>

            <hr class="my-6">

            <!-- Tentang Saya -->
            <h3 class="text-xl font-semibold text-left mb-3">Tentang Saya</h3>
            <p class="text-gray-700 text-left leading-relaxed">
                Saya adalah Web Developer yang berfokus pada pengembangan aplikasi berbasis web
                menggunakan Laravel, PHP, dan JavaScript. Saya berpengalaman membangun sistem modern,
                responsif, dan berkualitas tinggi dari frontend hingga backend.
            </p>

            <!-- Detail Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 text-left">
                <div class="p-4 bg-gray-50 rounded-xl shadow-sm">
                    <strong>Email</strong>
                    <p class="text-gray-600">alfiq24si@mahasiswa.pcr.ac.id</p>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl shadow-sm">
                    <strong>Role</strong>
                    <p class="text-gray-600">Developer</p>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl shadow-sm">
                    <strong>Lokasi</strong>
                    <p class="text-gray-600">Indonesia</p>
                </div>
                <div class="p-4 bg-gray-50 rounded-xl shadow-sm">
                    <strong>Pengalaman</strong>
                    <p class="text-gray-600">2+ Tahun Pengembangan Web</p>
                </div>
            </div>

            <!-- Progress Skill -->
            <div class="mt-10 text-left">
                <h3 class="text-xl font-semibold mb-4">Keahlian</h3>

                <div class="space-y-4">
                    <div>
                        <p class="font-semibold">HTML & CSS</p>
                        <div class="w-full bg-gray-300 rounded-full h-3">
                            <div class="bg-blue-600 h-3 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>

                    <div>
                        <p class="font-semibold">JavaScript</p>
                        <div class="w-full bg-gray-300 rounded-full h-3">
                            <div class="bg-yellow-500 h-3 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>

                    <div>
                        <p class="font-semibold">Laravel</p>
                        <div class="w-full bg-gray-300 rounded-full h-3">
                            <div class="bg-red-600 h-3 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>

                    <div>
                        <p class="font-semibold">PHP</p>
                        <div class="w-full bg-gray-300 rounded-full h-3">
                            <div class="bg-purple-600 h-3 rounded-full" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Edit -->
            <div class="mt-8 mb-5">
                <a href="#" class="px-6 py-2 bg-indigo-600 text-white rounded-xl shadow hover:bg-indigo-700">
                    Edit Profil
                </a>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/profile/pengembang.blade.php ENDPATH**/ ?>