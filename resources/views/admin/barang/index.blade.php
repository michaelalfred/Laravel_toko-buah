<!-- resources/views/admin/barang/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div style="max-width: 800px; margin: 0 auto;">
        <h2 style="text-align: center; margin-bottom: 20px;">List Barang</h2>

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
    <a href="{{ route('barang.create') }}" class="btn btn-primary">Add New Barang</a>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Transaksi</a>
    <a href="{{ route('laporan.index') }}" class="btn btn-primary">Laporan</a>
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
                        <td>{{ $item->harga_beli }}</td>
                        <td>{{ $item->harga_jual }}</td>
                        <td>{{ $item->jumlah_kg }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>{{ $item->tanggal_kadaluarsa }}</td>
                        <!-- Add other table cells as needed -->
                        <td>
                            <a href="{{ route('barang.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                            <!-- Add delete functionality as needed -->
                             <!-- Form for handling delete -->
                             <form action="{{ route('barang.destroy', ['id' => $item->id]) }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this barang?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add pagination links if necessary -->
        {{ $barang->links() }}
    </div>
@endsection
