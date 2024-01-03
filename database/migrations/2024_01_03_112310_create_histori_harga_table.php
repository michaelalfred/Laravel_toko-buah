<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('histori_harga', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_buah')->constrained('barang');
        $table->decimal('harga_beli');
        $table->decimal('harga_jual');
        $table->date('tanggal_masuk');
        // Add other necessary columns
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_harga');
    }
};
