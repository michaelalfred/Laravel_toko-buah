<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\HistoriHarga;

class TransaksiController extends Controller
{
    public function create()
    {
        // Get all barang for dropdown
        $barangList = BarangModel::pluck('nama_barang', 'id');

        return view('admin.transaksi.create', compact('barangList'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_item' => 'required|exists:barang,id',
            'nama' => 'required|string',
            'tanggal_transaksi' => 'required|date',
            'kuantitas' => 'required|numeric',
        ]);

        // Retrieve the corresponding barang record
        $barang = BarangModel::findOrFail($request->id_item);

        // Check if kuantitas is greater than jumlah_kg
        if ($request->kuantitas > $barang->jumlah_kg) {
            return redirect()
                ->route('transaksi.create')
                ->with('error', 'Stok tidak mencukupi untuk transaksi ini.');
        }

        // Retrieve the latest histori_harga record for the barang
        $latestHistoriHarga = HistoriHarga::where('id', $request->id_item)
            ->latest('created_at')
            ->first();

        if (!$latestHistoriHarga) {
            return redirect()
                ->route('transaksi.create')
                ->with('error', 'No histori harga found for the selected barang.');
        }

        // Calculate total_harga based on kuantitas and latest harga_jual from histori_harga
        $totalHarga = $request->kuantitas * $latestHistoriHarga->harga_jual;

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new transaksi record with the calculated total_harga
            $transaksi = TransaksiModel::create([
                'id_item' => $request->id_item,
                'nama' => $request->nama,
                'total_harga' => $totalHarga,
                'tanggal_transaksi' => $request->tanggal_transaksi,
                'kuantitas' => $request->kuantitas,
            ]);

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
