<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_item', 'nama', 'total_harga', 'tanggal_transaksi', 'kuantitas'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_item');
    }
}
