<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <h1>Selamat Datang di Dashboard Admin</h1>

  <div class="stats">
    <h3>Statistik Dummy</h3>
    <canvas id="chart"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Mahasiswa', 'Dosen', 'Kelas', 'Prodi'],
        datasets: [{
          label: 'Jumlah Data',
          data: [20, 5, 8, 3],
          borderWidth: 1
        }]
      },
      options: { scales: { y: { beginAtZero: true } } }
    });
  </script>
</body>
</html>
