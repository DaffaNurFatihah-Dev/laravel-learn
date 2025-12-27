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
    }
}
