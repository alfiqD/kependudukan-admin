<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kependudukan Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4 fw-bold">📊 Dashboard Kependudukan Admin</h2>

    <!-- Kartu Statistik -->
    <div class="row g-4 mb-5">
        <div class="col-md-2">
            <div class="card text-white bg-primary shadow">
                <div class="card-body text-center">
                    <h6>Total Keluarga</h6>
                    <h3>{{ $totalKeluarga }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white bg-success shadow">
                <div class="card-body text-center">
                    <h6>Total Warga</h6>
                    <h3>{{ $totalWarga }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white bg-warning shadow">
                <div class="card-body text-center">
                    <h6>Kelahiran</h6>
                    <h3>{{ $kelahiran }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white bg-danger shadow">
                <div class="card-body text-center">
                    <h6>Kematian</h6>
                    <h3>{{ $kematian }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card text-white shadow" style="background:#9c27b0">
                <div class="card-body text-center">
                    <h6>Pindah</h6>
                    <h3>{{ $pindah }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Tengah: Grafik + Tabel -->
    <div class="row g-4">
        <!-- Grafik -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Statistik Warga
                </div>
                <div class="card-body">
                    <canvas id="chartWarga"></canvas>
                </div>
            </div>
        </div>

        <!-- Tabel -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Data Terbaru
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendudukBaru as $p)
                            <tr>
                                <td>{{ $p['nama'] }}</td>
                                <td>{{ $p['jk'] }}</td>
                                <td>{{ $p['status'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center mt-5 text-muted">
        <hr>
        <small>© 2025 Sistem Kependudukan-Admin | Dibuat untuk praktikum Laravel</small>
    </div>
</div>

<!-- Script Chart.js -->
<script>
const ctx = document.getElementById('chartWarga');
new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Keluarga', 'Warga', 'Kelahiran', 'Kematian', 'Pindah'],
        datasets: [{
            data: [{{ $totalKeluarga }}, {{ $totalWarga }}, {{ $kelahiran }}, {{ $kematian }}, {{ $pindah }}],
            backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#9c27b0']
        }]
    }
});
</script>

</body>
</html>
