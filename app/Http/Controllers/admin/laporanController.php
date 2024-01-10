<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\BarangModel;
use App\Models\HistoriHarga;

class laporanController extends Controller
{
    public function index()
    {
        // Fetch transactions data
        $transaksis = TransaksiModel::with('barang')->get();

        // Pass data to the view
        return view('admin.laporan.index', compact('transaksis'));
    }

    public function showHistoriHarga()
    {
        // Mendapatkan data histori harga dari model atau sumber data lainnya
        $historiHarga = HistoriHarga::all();

        // Mendapatkan data barang untuk dropdown
        $barang = BarangModel::all();

        // Render view sambil mengirimkan data historiHarga dan barang ke view
        return view('admin.laporan.histori_harga', ['historiHarga' => $historiHarga, 'barang' => $barang]);
    }
    
}
