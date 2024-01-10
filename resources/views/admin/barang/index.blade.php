<!-- resources/views/admin/barang/index.blade.php -->
<style>
    table.table-bordered th,
    table.table-bordered td {
        border: 1px solid #ddd; /* Warna dan ketebalan outline */
        padding: 8px; /* Ruang dalam sel */
        text-align: left; /* Penataan teks dalam sel */
    }

    table.table-bordered th {
        background-color: #f2f2f2; /* Warna latar belakang header */
    }

    table.table-bordered {
        border-collapse: collapse; /* Menggabungkan batas tabel */
        width: 100%; /* Lebar tabel */
        margin-bottom: 20px; /* Jarak antara tabel dan elemen lainnya */
    }
</style>

@extends('layouts.app')

@section('title', 'Lihat Barang')

@section('content')
    <div style="max-width: 1000px; margin: 0 auto;">
        <h2 style="font-size: 35px;
                    font-weight: 600;
                    text-align: center;
                    line-height: 100px;
                    color: #fff;
                    user-select: none;
                    border-radius: 15px 15px 0 0;
                    background: linear-gradient(-135deg, #c850c0, #4158d0);">List Barang</h2>

        <!-- Display success or error messages, if any -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Button to add new barang -->
        <div style="margin-bottom: 20px;">
            <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Transaksi</a>
            @if(auth()->user()->role === 'admin')
                <!-- Only show these buttons for admin users -->
                <a href="{{ route('laporan.index') }}" class="btn btn-primary">Laporan</a>
                <a href="{{ route('histori_harga.index') }}" class="btn btn-primary">Histori Harga</a>
            @endif
        </div>

        <!-- Display the list of barang -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Jumlah Kg</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Kadaluarsa</th>
                    <!-- Add other table headers as needed -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through barang data -->
                @foreach($barang as $item)
                    <tr>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->historiHarga->last()->harga_beli }}</td>
                        <td>{{ $item->historiHarga->last()->harga_jual }}</td>
                        <td>{{ $item->jumlah_kg }}</td>
                        <td>{{ $item->historiHarga->last()->tanggal_masuk }}</td>
                        <td>{{ $item->tanggal_kadaluarsa }}</td>
                        <!-- Add other table cells as needed -->
                        <td>
                            <a href="{{ route('barang.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-warning btn-block">Edit</a>
                            <!-- Add delete functionality as needed -->
                            <!-- Form for handling delete -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add pagination links if necessary -->
        {{ $barang->links() }}
    </div>
@endsection
