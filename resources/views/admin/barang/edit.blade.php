<!-- resources/views/admin/barang/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <h2 style="text-align: center;">Edit Barang</h2>

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

        <!-- Form for updating barang -->
        <form method="post" action="{{ route('barang.update', ['id' => $barang->id]) }}" style="margin-bottom: 20px;">
            @csrf
            @method('put')

            <label for="nama_barang" style="display: block; margin-bottom: 5px;">Nama Barang:</label>
            <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <br>

            <label for="harga_beli" style="display: block; margin-bottom: 5px;">Harga Beli:</label>
            <input type="number" name="harga_beli" value="{{ $barang->harga_beli }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <br>

            <label for="harga_jual" style="display: block; margin-bottom: 5px;">Harga Jual:</label>
            <input type="number" name="harga_jual" value="{{ $barang->harga_jual }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <br>

            <label for="jumlah_kg" style="display: block; margin-bottom: 5px;">Jumlah Kg:</label>
            <input type="number" name="jumlah_kg" value="{{ $barang->jumlah_kg }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <br>

            <label for="tanggal_masuk" style="display: block; margin-bottom: 5px;">Tanggal Masuk:</label>
            <input type="date" name="tanggal_masuk" value="{{ $barang->tanggal_masuk }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <br>

            <label for="tanggal_kadaluarsa" style="display: block; margin-bottom: 5px;">Tanggal Kadaluarsa:</label>
            <input type="date" name="tanggal_kadaluarsa" value="{{ $barang->tanggal_kadaluarsa }}" style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <br>

            <!-- Add other input fields as needed -->

            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Update Barang</button>
        </form>
    </div>
@endsection
