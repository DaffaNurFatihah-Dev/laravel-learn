<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_kategori')->insert([
            [
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Ini adalah alat elektronik'
            ],
            [
                'nama_kategori' => 'Handphone',
                'deskripsi' => 'Ini adalah Handphone dari kategori'
            ]
        ]);

        DB::table('tb_product')->insert([
            [
                'kode_product' => 'A001',
                'nama_product' => 'TV Toshiba 40 inch',
                'harga' => 2000000,
                'deskripsi_product' => 'ini adalah tv yang besar',
                'stok'=>40,
                'kategori_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_product' => 'A002',
                'nama_product' => 'Laptop Acer swift 3',
                'harga' => 400000,
                'deskripsi_product' => 'ini adalah sample data',
                'stok'=>20,
                'kategori_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_product' => 'A003',
                'nama_product' => 'Asus zenfone 5 promax',
                'harga' => 34500000,
                'deskripsi_product' => 'ini adalah hp asus keren',
                'stok'=>30,
                'kategori_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
