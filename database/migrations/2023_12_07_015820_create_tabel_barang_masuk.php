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
        Schema::create('tabel_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->integer('jumlah');
            $table->bigInteger('id_barang')->unsigned();
            $table->foreign('id_barang')->references('id')->on('tabel_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_barang_masuk');
    }
};
