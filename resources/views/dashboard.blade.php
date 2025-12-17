@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Header dengan Gradient -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-primary">Dashboard Kependudukan</h1>
            <p class="mb-0 text-muted">Statistik dan monitoring data penduduk secara real-time</p>
        </div>
        <div class="d-flex align-items-center">
            <span class="badge bg-light text-dark mr-3">
                <i class="fas fa-calendar-alt mr-2"></i>
                {{ now()->format('d M Y') }}
            </span>
            <button class="btn btn-light shadow-sm" id="refreshBtn">
                <i class="fas fa-sync-alt"></i>
            </button>
        </div>
    </div>

    <!-- Card Statistik Grid Modern -->
    <div class="row">
        <!-- Data Warga -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Warga</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($jumlahWarga) }}</div>
                            <div class="mt-2">
                                <span class="text-success text-sm font-weight-bold">
                                    <i class="fas fa-id-card"></i>
                                    Penduduk Terdaftar
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data User -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengguna Sistem</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($jumlahUser) }}</div>
                            <div class="mt-2">
                                <span class="text-success text-sm font-weight-bold">
                                    <i class="fas fa-user-shield mr-1"></i>
                                    Admin & Operator
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Keluarga -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Kartu Keluarga</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($jumlahKK) }}</div>
                            <div class="mt-2">
                                <span class="text-warning text-sm font-weight-bold">
                                    <i class="fas fa-home mr-1"></i>
                                    Kepala Keluarga
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-house-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Anggota KK -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Anggota Keluarga</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($jumlahAnggota) }}</div>
                            <div class="mt-2">
                                <span class="text-info text-sm font-weight-bold">
                                    <i class="fas fa-users"></i>
                                    Total Anggota
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row Kedua Statistik -->
    <div class="row">
        <!-- Kelahiran -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Kelahiran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($jumlahKelahiran) }}</div>
                            <div class="mt-2">
                                <span class="text-info text-sm font-weight-bold">
                                    <i class="fas fa-baby mr-1"></i>
                                    Tahun Ini
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-baby-carriage fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kematian -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Kematian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($jumlahKematian) }}</div>
                            <div class="mt-2">
                                <span class="text-danger text-sm font-weight-bold">
                                    <i class="fas fa-skull-crossbones"></i>
                                    Tahun Ini
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-heartbeat fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pindah -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pindah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($jumlahPindah) }}</div>
                            <div class="mt-2">
                                <span class="text-warning text-sm font-weight-bold">
                                    <i class="fas fa-truck-moving mr-1"></i>
                                    Tahun Ini
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Area dengan Tabs -->
    <div class="row mt-4">
        <div class="col-xl-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Statistik Kependudukan</h6>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-primary active" data-chart-type="bar">Bar</button>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-chart-type="line">Line</button>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-chart-type="pie">Pie</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height: 300px;">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-xl-4">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ringkasan Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-3">
                            <div>
                                <i class="fas fa-user-circle text-primary mr-2"></i>
                                <span>Rata-rata per KK</span>
                            </div>
                            <span class="badge bg-primary rounded-pill">
                                {{ $jumlahKK > 0 ? round($jumlahAnggota / $jumlahKK, 1) : 0 }}
                            </span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-3">
                            <div>
                                <i class="fas fa-baby text-info mr-2"></i>
                                <span>Kelahiran/Bulan</span>
                            </div>
                            <span class="badge bg-info rounded-pill">
                                {{ round($jumlahKelahiran / 12, 1) }}
                            </span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-3">
                            <div>
                                <i class="fas fa-heartbeat text-danger mr-2"></i>
                                <span>Kematian/Bulan</span>
                            </div>
                            <span class="badge bg-danger rounded-pill">
                                {{ round($jumlahKematian / 12, 1) }}
                            </span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-3">
                            <div>
                                <i class="fas fa-exchange-alt text-warning mr-2"></i>
                                <span>Pertumbuhan Netto</span>
                            </div>
                            <span class="badge {{ ($jumlahKelahiran - $jumlahKematian) >= 0 ? 'bg-success' : 'bg-danger' }} rounded-pill">
                                {{ $jumlahKelahiran - $jumlahKematian }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data Terbaru -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Peristiwa</th>
                                    <th>Detail</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $allEvents = collect();
                                    foreach($kelahiranTerbaru as $kel) {
                                        $allEvents->push([
                                            'type' => 'Kelahiran',
                                            'name' => $kel->anak->nama ?? $kel->nama_bayi,
                                            'detail' => $kel->anak->jenis_kelamin ?? $kel->jenis_kelamin,
                                            'date' => $kel->tgl_lahir ?? $kel->tanggal_lahir,
                                            'color' => 'info'
                                        ]);
                                    }
                                    foreach($kematianTerbaru as $kem) {
                                        $allEvents->push([
                                            'type' => 'Kematian',
                                            'name' => $kem->warga->nama ?? 'N/A',
                                            'detail' => 'Meninggal',
                                            'date' => $kem->tgl_meninggal ?? $kem->tanggal_meninggal,
                                            'color' => 'danger'
                                        ]);
                                    }
                                    foreach($pindahTerbaru as $pin) {
                                        $allEvents->push([
                                            'type' => 'Pindah',
                                            'name' => $pin->warga->nama ?? 'N/A',
                                            'detail' => $pin->tujuan ?? 'N/A',
                                            'date' => $pin->tgl_pindah ?? $pin->tanggal_pindah,
                                            'color' => 'warning'
                                        ]);
                                    }
                                    $allEvents = $allEvents->sortByDesc('date')->take(10);
                                @endphp

                                @foreach($allEvents as $event)
                                <tr>
                                    <td>
                                        <span class="badge badge-{{ $event['color'] }}">{{ $event['type'] }}</span>
                                    </td>
                                    <td>
                                        <div class="font-weight-bold">{{ $event['name'] }}</div>
                                        <small class="text-muted">{{ $event['detail'] }}</small>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($event['date'])->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge badge-success">Tercatat</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js dengan Animation -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    let currentChart;

    // Data untuk chart
    const chartData = {
        labels: ['Warga','User','KK','Anggota KK','Kelahiran','Kematian','Pindah'],
        datasets: [{
            label: 'Jumlah Data',
            data: [
                {{ $jumlahWarga }},
                {{ $jumlahUser }},
                {{ $jumlahKK }},
                {{ $jumlahAnggota }},
                {{ $jumlahKelahiran }},
                {{ $jumlahKematian }},
                {{ $jumlahPindah }}
            ],
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#858796',
                '#5a5c69',
                '#36b9cc',
                '#e74a3b',
                '#f6c23e'
            ],
            borderColor: [
                '#4e73df',
                '#1cc88a',
                '#858796',
                '#5a5c69',
                '#36b9cc',
                '#e74a3b',
                '#f6c23e'
            ],
            borderWidth: 1
        }]
    };

    // Inisialisasi chart pertama (bar)
    createChart('bar');

    // Fungsi untuk membuat chart
    function createChart(type) {
        if (currentChart) {
            currentChart.destroy();
        }

        const config = {
            type: type,
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                    }
                },
                scales: type === 'bar' ? {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                } : {}
            }
        };

        currentChart = new Chart(ctx, config);
    }

    // Event listener untuk tombol tipe chart
    document.querySelectorAll('[data-chart-type]').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('[data-chart-type]').forEach(btn => {
                btn.classList.remove('active');
            });
            this.classList.add('active');
            createChart(this.dataset.chartType);
        });
    });

    // Refresh button animation
    document.getElementById('refreshBtn').addEventListener('click', function() {
        this.classList.add('fa-spin');
        setTimeout(() => {
            this.classList.remove('fa-spin');
            location.reload();
        }, 500);
    });
});
</script>

<style>
/* Minimal CSS tambahan untuk konsistensi */
.text-primary {
    color: #4e73df !important;
}

.btn-outline-primary.active {
    background-color: #4e73df;
    color: white;
    border-color: #4e73df;
}

.table-hover tbody tr:hover {
    background-color: rgba(78, 115, 223, 0.05);
}

.badge.bg-light {
    color: #6c757d !important;
}
</style>
@endsection
