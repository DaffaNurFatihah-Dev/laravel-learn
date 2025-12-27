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
            $table->String('nama_product');
            $table->integer('harga');
            $table->text('deskripsi_product');
            $table->integer('kategori_id');
            $table->timestamps('');
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
