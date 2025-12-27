<?php

use App\Http\Controllers\C_kategori;
use App\Http\Controllers\C_product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    $data = [
        'nama' => 'Daffa Nur Fatihah',
        'umur' => 20,
        'sekolah' => 'SMKN 2 Klaten'
    ];
    return view('pages.about', $data);
});

Route::get('/about/{id}', function ($id) {
    return view('pages.detail', [
        'nomer' => $id
    ]);
});

Route::view('/contact', 'pages.contact');
Route::get('/product', [C_product::class, 'index']); //read data
Route::get('/product/create', [C_product::class, 'create']); //halaman untuk menambahkan data 
Route::post('/product', [C_product::class, 'store']); //url untuk post data atau untuk memproses pengiriman data
Route::get('/product/{id}', [C_product::class, 'show']); // untuk menampilkan detail data
Route::get('/product/{id}/edit', [C_product::class, 'edit']); // untuk menampilkan tampilan form edit (halaman)
Route::put('/product/{id}', [C_product::class, 'update']); // untuk memproses update
Route::delete('/product/{id}', [C_product::class, 'destroy']); // untuk memproses hapus data

Route::resource('kategori', C_kategori::class);// resource ini templating untuk bikin crud dengan cepat