<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BarangController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\admin\LaporanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    // Route for "barang" controller
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/store', [BarangController::class, 'indexBarang'])->name('barang.create');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::get('/transaki', [TransaksiController::class,'create'])->name('transaksi.create');
    Route::post('/transaki/post', [TransaksiController::class,'store'])->name('transaksi.post');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    // Route::resource('transaksi', TransaksiController::class)->except(['show']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
