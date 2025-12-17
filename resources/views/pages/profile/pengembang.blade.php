@extends('layouts.admin.app')
@push('custom-css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endpush
@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Main CV Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate__animated animate__fadeInUp">
            <div class="grid grid-cols-1 lg:grid-cols-3">

                <!-- Left Column - Personal Info & Skills -->
                <div class="lg:col-span-2 p-8 lg:p-12">
                    <!-- Header with Name and Title -->
                    <div class="mb-8">
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-3 leading-tight">
                            Alfiq Debriliant
                        </h1>
                        <div class="flex items-center flex-wrap gap-3">
                            <span class="px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-full text-sm font-semibold shadow-md">
                                Web Developer
                            </span>
                            <span class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full text-sm font-semibold shadow-md">
                                Software Engineer
                            </span>
                        </div>
                    </div>

                    <!-- Contact Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
                        <!-- Nama -->
                        <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-l-4 border-blue-500">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <i class="fas fa-user text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-blue-500 font-semibold uppercase tracking-wide">Nama</p>
                                    <p class="text-lg font-semibold text-gray-800">Alfiq Debriliant</p>
                                </div>
                            </div>
                        </div>

                        <!-- NIM -->
                        <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-l-4 border-indigo-500">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <i class="fas fa-id-card text-indigo-600"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-indigo-500 font-semibold uppercase tracking-wide">NIM</p>
                                    <p class="text-lg font-semibold text-gray-800">2457301007</p>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-l-4 border-cyan-500">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <i class="fas fa-envelope text-cyan-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-cyan-500 font-semibold uppercase tracking-wide">Email</p>
                                    <p class="text-sm font-semibold text-gray-800 truncate">alfiq24si@mahasiswa.pcr.ac.id</p>
                                </div>
                            </div>
                        </div>

                        <!-- Program Studi -->
                        <div class="p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-l-4 border-blue-400">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white rounded-lg shadow-sm">
                                    <i class="fas fa-graduation-cap text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-blue-500 font-semibold uppercase tracking-wide">Program Studi</p>
                                    <p class="text-lg font-semibold text-gray-800">Sistem Informasi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- About Me Section -->
                    <div class="mb-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg">
                                <i class="fas fa-user text-white text-lg"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Tentang Saya</h3>
                        </div>
                        <div class="pl-10">
                            <p class="text-gray-700 leading-relaxed text-lg mb-4">
                                Seorang Web Developer profesional dengan spesialisasi dalam pengembangan aplikasi web modern menggunakan Laravel, PHP, dan JavaScript. Berpengalaman dalam membangun sistem yang scalable, efisien, dan berfokus pada user experience yang optimal.
                            </p>
                            <div class="flex flex-wrap gap-4 mt-6">
                                @foreach ([
                                    ['icon' => 'fas fa-rocket', 'text' => 'Fast Development'],
                                    ['icon' => 'fas fa-shield-alt', 'text' => 'Secure Code'],
                                    ['icon' => 'fas fa-code', 'text' => 'Clean Architecture'],
                                    ['icon' => 'fas fa-mobile-alt', 'text' => 'Responsive Design']
                                ] as $item)
                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <i class="{{ $item['icon'] }} text-blue-500"></i>
                                        <span>{{ $item['text'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Skills Grid 2x2 -->
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="p-2 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg">
                                <i class="fas fa-chart-bar text-white text-lg"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Keahlian Teknis</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left Column Skills -->
                            <div class="space-y-6">
                                <!-- Skill 1 -->
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2 bg-gradient-to-r from-blue-100 to-blue-50 rounded-lg">
                                                <i class="fab fa-laravel text-red-500 text-lg"></i>
                                            </div>
                                            <span class="font-semibold text-gray-800">Laravel Framework</span>
                                        </div>
                                        <span class="text-lg font-bold text-blue-600">92%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2.5 rounded-full" style="width: 92%"></div>
                                    </div>
                                </div>

                                <!-- Skill 2 -->
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2 bg-gradient-to-r from-indigo-100 to-indigo-50 rounded-lg">
                                                <i class="fab fa-js-square text-yellow-500 text-lg"></i>
                                            </div>
                                            <span class="font-semibold text-gray-800">JavaScript</span>
                                        </div>
                                        <span class="text-lg font-bold text-blue-600">85%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 h-2.5 rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column Skills -->
                            <div class="space-y-6">
                                <!-- Skill 3 -->
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2 bg-gradient-to-r from-purple-100 to-purple-50 rounded-lg">
                                                <i class="fab fa-php text-purple-500 text-lg"></i>
                                            </div>
                                            <span class="font-semibold text-gray-800">PHP Development</span>
                                        </div>
                                        <span class="text-lg font-bold text-blue-600">88%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-2.5 rounded-full" style="width: 88%"></div>
                                    </div>
                                </div>

                                <!-- Skill 4 -->
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2 bg-gradient-to-r from-cyan-100 to-cyan-50 rounded-lg">
                                                <i class="fas fa-database text-cyan-500 text-lg"></i>
                                            </div>
                                            <span class="font-semibold text-gray-800">MySQL Database</span>
                                        </div>
                                        <span class="text-lg font-bold text-blue-600">82%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 h-2.5 rounded-full" style="width: 82%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links Only (5 Items) -->
                    <div class="mt-12">
                        <h4 class="text-xl font-semibold text-gray-800 mb-6">Hubungi & Terhubung</h4>
                        <div class="flex flex-wrap gap-4">
                            @foreach ([
                                ['icon' => 'fab fa-linkedin', 'text' => 'LinkedIn', 'color' => 'blue-700', 'url' => 'https://www.linkedin.com/in/alfiq-debriliant-76b329394?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app'],
                                ['icon' => 'fab fa-github', 'text' => 'GitHub', 'color' => 'gray-800', 'url' => 'https://github.com/alfiqD?tab=overview&from=2025-11-01&to=2025-11-30'],
                                ['icon' => 'fab fa-instagram', 'text' => 'Instagram', 'color' => 'pink-600', 'url' => 'https://www.instagram.com/alfiqdebriliant_?igsh=c2F1dW03dnl2aGpx'],
                                ['icon' => 'fas fa-envelope', 'text' => 'Email', 'color' => 'red-500', 'url' => 'mailto:alfiq24si@mahasiswa.pcr.ac.id'],
                                ['icon' => 'fas fa-map-marker-alt', 'text' => 'Pekanbaru', 'color' => 'green-600', 'url' => 'https://maps.google.com/maps?q=Pekanbaru,Riau,Indonesia']
                            ] as $social)
                                <a href="{{ $social['url'] }}"
                                   target="{{ $social['text'] == 'Pekanbaru' ? '_blank' : '_self' }}"
                                   class="group flex items-center gap-3 px-5 py-3 bg-gradient-to-r from-blue-50 to-white rounded-xl border border-blue-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                    <i class="{{ $social['icon'] }} text-{{ $social['color'] }} text-xl"></i>
                                    <span class="font-medium text-gray-700 group-hover:text-blue-600 transition">{{ $social['text'] }}</span>
                                    <i class="fas fa-arrow-right text-blue-300 group-hover:text-blue-500 ml-2 transition"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column - Photo & Badges -->
                <div class="bg-gradient-to-b from-blue-600 to-indigo-700 p-8 lg:p-12 relative">
                    <!-- Photo Container dengan ukuran terkontrol -->
                    <div class="relative mx-auto max-w-xs">
                        <!-- Glow Effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-3xl blur-2xl opacity-50 animate-pulse"></div>

                        <!-- Main Photo dengan properti object-fit -->
                        <div class="relative rounded-3xl overflow-hidden border-4 border-white/20 shadow-2xl aspect-square">
                            @if(File::exists(public_path('media/profile/alfiq.jpg')) ||
                                File::exists(public_path('media/profile/alfiq.png')))
                                <!-- Foto dari local storage dengan ukuran terkontrol -->
                                <img src="{{ asset('media/profile/alfiq.jpg') }}"
                                     onerror="this.onerror=null; this.src='{{ asset('media/profile/alfiq.png') }}'"
                                     class="w-full h-full object-cover"
                                     alt="Alfiq Debriliant - Web Developer"
                                     style="max-height: 350px; object-position: center;">
                            @else
                                <!-- Fallback avatar jika foto tidak ada -->
                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="fas fa-user text-white text-6xl mb-2"></i>
                                        <p class="text-white font-semibold">Alfiq Debriliant</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Photo Decoration -->
                        <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-2xl -rotate-12 opacity-90"></div>
                        <div class="absolute -top-4 -left-4 w-16 h-16 bg-gradient-to-r from-cyan-400 to-blue-400 rounded-2xl rotate-12 opacity-90"></div>
                    </div>

                    <!-- Availability Badge -->
                    <div class="mt-10 flex justify-center">
                        <div class="flex items-center gap-3 px-6 py-3 bg-white/10 backdrop-blur-sm rounded-full border border-white/20">
                            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-white font-semibold">Available for Projects</span>
                        </div>
                    </div>

                    <!-- Tech Stack Badges -->
                    <div class="mt-12">
                        <h4 class="text-xl font-semibold text-white mb-6 text-center">Tech Stack</h4>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach ([
                                ['icon' => 'fab fa-laravel', 'text' => 'Laravel', 'color' => 'red-400'],
                                ['icon' => 'fab fa-php', 'text' => 'PHP', 'color' => 'purple-300'],
                                ['icon' => 'fab fa-js', 'text' => 'JavaScript', 'color' => 'yellow-300'],
                                ['icon' => 'fas fa-database', 'text' => 'MySQL', 'color' => 'blue-300'],
                                ['icon' => 'fab fa-java', 'text' => 'Java', 'color' => 'orange-300'],
                                ['icon' => 'fas fa-server', 'text' => 'REST API', 'color' => 'cyan-300'],
                            ] as $tech)
                                <div class="flex items-center gap-3 px-4 py-3 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 hover:bg-white/10 transition group">
                                    <i class="{{ $tech['icon'] }} text-{{ $tech['color'] }} text-lg"></i>
                                    <span class="text-white/90 text-sm font-medium">{{ $tech['text'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Years of Experience -->
                    <div class="mt-12 text-center">
                        <div class="inline-flex flex-col items-center">
                            <div class="text-5xl font-bold text-white mb-2">1,5+</div>
                            <div class="text-white/80 text-sm">Years of Experience</div>
                            <div class="w-16 h-1 bg-gradient-to-r from-cyan-400 to-blue-400 rounded-full mt-2"></div>
                        </div>
                    </div>

                    <!-- Tombol Download CV dihapus -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    /* Ensure image doesn't overflow */
    .aspect-square {
        aspect-ratio: 1 / 1;
    }

    /* Responsive image sizing */
    @media (max-width: 1024px) {
        .aspect-square {
            max-width: 250px;
            margin: 0 auto;
        }
    }

    @media (max-width: 768px) {
        .aspect-square {
            max-width: 200px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Image optimization for large photos
    document.addEventListener('DOMContentLoaded', function() {
        const profileImage = document.querySelector('img[alt="Alfiq Debriliant - Web Developer"]');

        if (profileImage) {
            // Add loading lazy
            profileImage.loading = 'lazy';

            // Prevent image from being too large
            profileImage.style.maxWidth = '100%';
            profileImage.style.height = 'auto';

            // Add error handling
            profileImage.onerror = function() {
                this.src = '{{ asset("images/default-avatar.png") }}';
                this.onerror = null;
                this.alt = 'Default Avatar';
            };
        }
    });
</script>
@endpush
