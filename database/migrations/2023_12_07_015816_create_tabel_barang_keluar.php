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
        Schema::create('tabel_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_keluar');
            $table->integer('jumlah');
            $table->bigInteger('barang_id')->unsigned();
            $table->foreign('barang_id')->references('id')->on('tabel_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_barang_keluar');
    }
};
