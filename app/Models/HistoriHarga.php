<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriHarga extends Model
{
    protected $table = 'histori_harga'; // Set the table name if it's different from the default

    protected $fillable = [
        'id',
        'harga_beli',
        'harga_jual',
        'tanggal_masuk',
        // Add other fillable columns as needed
    ];

    // Relationships
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id');
    }
}
