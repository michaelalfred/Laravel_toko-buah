@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        <h2 style="text-align: center;
                    font-size: 35px;
                    font-weight: 600;
                    text-align: center;
                    line-height: 100px;
                    color: #fff;
                    user-select: none;
                    border-radius: 15px 15px 0 0;
                    background: linear-gradient(-135deg, #c850c0, #4158d0);">Transaksi</h2>

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

            <!-- Use the authenticated user's name as the default value for the "nama" input -->
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ auth()->user()->name }}" readonly>
            <br>

            <!-- Set the default value to the current date -->
            <label for="tanggal_transaksi">Tanggal Transaksi:</label>
            <input type="date" name="tanggal_transaksi" class="form-control" value="{{ now()->toDateString() }}" required>
            <br>

            <label for="kuantitas">Kuantitas:</label>
            <input type="number" name="kuantitas" class="form-control" required>
            <br>

            <button type="submit" class="btn btn-primary">Create Transaksi</button>
        </form>
    </div>
@endsection
