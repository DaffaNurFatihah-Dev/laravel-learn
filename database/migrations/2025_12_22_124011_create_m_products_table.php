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
        // sintaks untuk buat tabel product
        Schema::create('tb_product', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('kode_product');
            $table->String('nama_product');
            $table->bigInteger('harga');
            $table->text('deskripsi_product');
            $table->bigInteger('stok');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps('');

            $table->foreign('kategori_id')->references('id_kategori')->on('tb_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_product');
    }
};
