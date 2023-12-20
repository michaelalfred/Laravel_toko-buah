<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{

    protected $table = 'barang';
    protected $fillable = ['nama_barang', 'harga_beli', 'harga_jual', 'jumlah_kg', 'tanggal_masuk', 'tanggal_kadaluarsa'];

    // Define any relationships here, if needed
    // For example, if a Barang can have many Transaksi:
    public function transaksis()
    {
        return $this->hasMany(TransaksiModel::class, 'id_item');
    }
}
