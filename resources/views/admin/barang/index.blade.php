<!-- resources/views/admin/barang/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>List Barang</h2>

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
    <a href="{{ route('barang.create') }}" class="btn btn-primary">Add New Barang</a>

    <!-- Display the list of barang -->
    <table border="1">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
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
                    <!-- Add other table cells as needed -->
                    <td>
                        <a href="{{ route('barang.edit', ['id' => $item->id]) }}">Edit</a>
                        <!-- Add delete functionality as needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add pagination links if necessary -->
    {{ $barang->links() }}
@endsection
