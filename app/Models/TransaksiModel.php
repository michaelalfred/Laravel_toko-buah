<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_item', 'nama', 'total_harga', 'tanggal_transaksi', 'kuantitas'];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_item');
    }
}
