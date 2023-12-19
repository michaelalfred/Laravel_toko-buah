<!-- resources/views/admin/laporan/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <h2 style="text-align: center; margin-bottom: 20px;">Laporan Transaksi</h2>

        <!-- Canvas for Chart.js -->
        <canvas id="myBarChart" width="400" height="400"></canvas>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Kuantitas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->nama }}</td>
                        <td>{{ $transaksi->total_harga }}</td>
                        <td>{{ $transaksi->tanggal_transaksi }}</td>
                        <td>{{ $transaksi->kuantitas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Prepare data for the chart
        var labels = @json($transaksis->pluck('nama'));
        var data = @json($transaksis->pluck('total_harga'));

        // Create bar chart
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Harga',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
