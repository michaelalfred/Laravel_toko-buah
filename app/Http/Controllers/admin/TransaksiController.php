<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;
class TransaksiController extends Controller
{
    public function create()
{
    // Get all barang for dropdown
    $barangList = Barang::pluck('nama_barang', 'id');

    return view('admin.transaksi.create', compact('barangList'));
}


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_item' => 'required|exists:barang,id',
            'nama' => 'required|string',
            'total_harga' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
            'kuantitas' => 'required|numeric',
        ]);

        // Create a new transaksi record
        Transaksi::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Transaksi added successfully');
    }
}
