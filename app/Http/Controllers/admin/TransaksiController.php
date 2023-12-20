<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        // Check if kuantitas is greater than jumlah_kg
        $barang = Barang::findOrFail($request->id_item);
        if ($request->kuantitas > $barang->jumlah_kg) {
            return redirect()
                ->route('transaksi.create')
                ->with('error', 'Stok tidak mencukupi untuk transaksi ini.');
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new transaksi record
            $transaksi = Transaksi::create($request->all());

            // Update the corresponding barang record
            $barang->jumlah_kg -= $request->kuantitas;
            $barang->save();

            // Commit the transaction
            DB::commit();

            return redirect()->route('barang.index')->with('success', 'Transaksi added successfully');
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();

            return redirect()->route('barang.index')->with('error', 'Failed to add transaksi. Please try again.');
        }
    }
}