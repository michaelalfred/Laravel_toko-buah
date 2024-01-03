<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\HistoriHarga;

class laporanController extends Controller
{
    public function index()
    {
        // Fetch transactions data
        $transaksis = TransaksiModel::all();

        // Pass data to the view
        return view('admin.laporan.index', compact('transaksis'));
    }

    public function showHistoriHarga()
    {
        $historiHarga = HistoriHarga::with('barang')->get(); // Adjust this based on your actual logic

        return view('admin.laporan.histori_harga', compact('historiHarga'));
    }
}
