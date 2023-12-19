@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <h2 style="text-align: center;">Create Transaksi</h2>

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

        <!-- Form for creating a new transaction -->
        <form method="post" action="{{ route('transaksi.post') }}" style="margin-bottom: 20px;">
            @csrf

            <label for="id_item">Item:</label>
            <select name="id_item" class="form-control" required>
                @foreach($barangList as $id => $nama_barang)
                    <option value="{{ $id }}">{{ $nama_barang }}</option>
                @endforeach
            </select>
            <br>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" required>
            <br>

            <label for="total_harga">Total Harga:</label>
            <input type="number" name="total_harga" class="form-control" required>
            <br>

            <label for="tanggal_transaksi">Tanggal Transaksi:</label>
            <input type="date" name="tanggal_transaksi" class="form-control" required>
            <br>

            <label for="kuantitas">Kuantitas:</label>
            <input type="number" name="kuantitas" class="form-control" required>
            <br>

            <button type="submit" class="btn btn-primary">Create Transaksi</button>
        </form>
    </div>
@endsection
