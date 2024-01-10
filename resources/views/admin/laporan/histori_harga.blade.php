<!-- resources/views/histori_harga.blade.php -->

@extends('layouts.app')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <h2 style="text-align: center;
                    font-size: 35px;
                    font-weight: 600;
                    text-align: center;
                    line-height: 100px;
                    color: #fff;
                    user-select: none;
                    border-radius: 15px 15px 0 0;
                    background: linear-gradient(-135deg, #c850c0, #4158d0);">Histori Harga</h2>


        
        <canvas id="historiChart" width="400" height="200"></canvas>
        
        <!-- <canvas id="historiChart" width="400" height="400"></canvas> -->
        <!-- Dropdown to filter historical price data -->
        <div class="mb-3">
            <label for="itemDropdown" class="form-label">Pilih Item:</label>
            <select class="form-select" id="itemDropdown" name="itemDropdown" onchange="filterHistori()">
                <option value="">Semua Item</option>
                @foreach($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <!-- Display historical price data -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody id="historiTableBody">
                @foreach($historiHarga as $histori)
                    <tr data-itemid="{{ $histori->barang->id }}">
                        <td>{{ $histori->barang->nama_barang }}</td>
                        <td>{{ $histori->harga_beli }}</td>
                        <td>{{ $histori->harga_jual }}</td>
                        <td>{{ $histori->tanggal_masuk }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function filterHistori() {
            var selectedItemId = document.getElementById('itemDropdown').value;
            var rows = document.getElementById('historiTableBody').getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var rowItemId = rows[i].getAttribute('data-itemid');
                if (selectedItemId === '' || selectedItemId === rowItemId) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function filterHistori() {
            var selectedItemId = document.getElementById('itemDropdown').value;
            var rows = document.getElementById('historiTableBody').getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var rowItemId = rows[i].getAttribute('data-itemid');
                if (selectedItemId === '' || selectedItemId === rowItemId) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        // Prepare data for the chart
        var labels = [];
        var hargaBeliData = [];
        var hargaJualData = [];

        @foreach($historiHarga as $histori)
            labels.push("{{ $histori->tanggal_masuk }}");
            hargaBeliData.push({{ $histori->harga_beli }});
            hargaJualData.push({{ $histori->harga_jual }});
        @endforeach

        // Create the chart
        var ctx = document.getElementById('historiChart').getContext('2d');
        var historiChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Harga Beli',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1,
                        yAxisID: 'y-axis-0',
                        data: hargaBeliData,
                    },
                    {
                        label: 'Harga Jual',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1,
                        yAxisID: 'y-axis-1',
                        data: hargaJualData,
                    },
                ],
            },
            options: {
                scales: {
                    y: [
                        {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            id: 'y-axis-0',
                        },
                        {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            id: 'y-axis-1',
                        },
                    ],
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal Masuk',
                        }
                    }
                },
            },
        });
    </script>
@endsection
