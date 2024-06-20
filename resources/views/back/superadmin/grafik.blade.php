@extends('master.back')
@section('title')Dashboard @endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>GRAFIK PENDAPATAN</b></h1>
            <ul></ul>
            <h4 class="m-0"></h4>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Peraturan Bupati Banjar</li>
              <li class="breadcrumb-item"><a href="https://jdih.banjarkab.go.id/pencarian?q=sampah&jenis_peraturan=62&nomor_peraturan=19&tahun_terbit=2023">Nomor 19 Tahun 2023</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content-header">
        <div style="width: 50%; margin: auto;">
            <canvas id="pendapatanChart"></canvas>
        </div>

        <script>
            // Data pendapatan (misal: pendapatan bulanan)
            const labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const dataPendapatan = [400000, 700000, 700000, 900000, 10000000, 2000000, 3000000, 4000000, 5000000, 6000000, 7000000, 8000000];

            // Konfigurasi Chart.js
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Pendapatan Bulanan (dalam Rp)',
                    data: dataPendapatan,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'line', // Tipe grafik: line, bar, pie, dll.
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // Render Chart
            const pendapatanChart = new Chart(
                document.getElementById('pendapatanChart'),
                config
            );
        </script>
    </div>
          <!-- right col -->
</div>

      <div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

