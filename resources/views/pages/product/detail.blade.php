@extends('layouts.master')

@section('content')
    <h1 class="mt-2">Halaman Detail Produk</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>
        <div class="card-body">
            <img src="https://placehold.co/600x400" class="img-fluid" alt="Gambar sedang di load">
            <div class="card-body">
                <p>Nama Product : {{ $product->nama_product }}</p>
                <p>Harga : {{ $product->harga }}</p>
                <p>Deskripsi : {{ $product->deskripsi_product }}</p>
                <p>Id Kategori : {{ $product->kategori_id }}</p>
                <p>Stok : 99</p>
                <a href="/product" class="btn btn-primary">Kembali ke produk</a>
            </div>
        </div>
    </div>
@endsection
