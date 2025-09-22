<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_barang_sewas', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_transaksi')->references('id')->on('transaksis')->cascadeOnDelete();
            $table->foreign('id_produk')->references('id')->on('produks')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barang_sewas');
    }
};
