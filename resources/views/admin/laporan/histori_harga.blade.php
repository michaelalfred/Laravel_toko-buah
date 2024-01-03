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
            <tbody>
                @foreach($historiHarga as $histori)
                    <tr>
                        <td>{{ $histori->barang->nama_barang }}</td>
                        <td>{{ $histori->harga_beli }}</td>
                        <td>{{ $histori->harga_jual }}</td>
                        <td>{{ $histori->tanggal_masuk }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
