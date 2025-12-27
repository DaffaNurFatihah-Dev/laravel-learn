<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_product')->insert([
            [
                'nama_product' => 'TV Toshiba 40 inch',
                'harga' => 20000000,
                'deskripsi_product' => 'ini adalah tv yang besar',
                'kategori_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
                ]
            ,[
                'nama_product' => 'Laptop Lenovo Intel Gaming',
                'harga' => 40000000,
                'deskripsi_product' => 'ini adalah laptop yang gacor',
                'kategori_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
                ]
            ,[
                'nama_product' => 'Laptop Acer Ryzen 5 gaming',
                'harga' => 45000000,
                'deskripsi_product' => 'ini adalah laptop acer yang gacor',
                'kategori_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
        ]
        ]);
    }
}
