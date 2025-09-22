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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_pengguna')->references('id')->on('penggunas')->onDelete('set null');
            $table->date('tgl_pinjam');
            $table->date('tgl_pengembalian');
            $table->integer('durasi');
            $table->decimal('total_harga', 15, 2);
            $table->decimal('total_denda', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
