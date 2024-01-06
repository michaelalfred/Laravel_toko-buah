<!-- resources/views/admin/barang/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: auto;">
        <h2 style="text-align: center; 
                    margin-bottom: 20px;
                    font-size: 35px;
                    font-weight: 600;
                    text-align: center;
                    line-height: 100px;
                    color: #fff;
                    user-select: none;
                    border-radius: 15px 15px 0 0;
                    background: linear-gradient(-135deg, #c850c0, #4158d0);">Tambah Barang</h2>

        <!-- Display validation errors, if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form for adding barang -->
        <form method="post" action="{{ route('barang.store') }}" style="padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
            @csrf
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" required class="form-control">
            <br>
            <label for="harga_beli">Harga Beli:</label>
            <input type="number" name="harga_beli" required class="form-control">
            <br>
            <label for="harga_jual">Harga Jual:</label>
            <input type="number" name="harga_jual" required class="form-control">
            <br>
            <label for="jumlah_kg">Jumlah Kg:</label>
            <input type="text" name="jumlah_kg" required class="form-control" inputmode="numeric" pattern="[0-9]*[.,]?[0-9]+([.,][0-9]+)?">
            <br>
            <label for="tanggal_masuk">Tanggal Masuk:</label>
            <input type="date" name="tanggal_masuk" required class="form-control">
            <br>
            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
            <input type="date" name="tanggal_kadaluarsa" class="form-control">
            <!-- Add other input fields as needed -->
            <br>
            <button type="submit" class="btn btn-primary">Tambah Barang</button>
        </form>
    </div>
@endsection
