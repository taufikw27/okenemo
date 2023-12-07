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
        Schema::create('tabel_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('qty');
            $table->bigInteger('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id')->on('tabel_kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_barang');
    }
};
