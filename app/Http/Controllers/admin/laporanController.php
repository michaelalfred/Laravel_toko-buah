<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class laporanController extends Controller
{
    public function index()
    {
        // Fetch transactions data
        $transaksis = Transaksi::all();

        // Pass data to the view
        return view('admin.laporan.index', compact('transaksis'));
    }
}
