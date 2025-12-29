@extends('layouts.master')

@section('content')
    <h1 class="mt-2">Halaman Detail Produk</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>
        <div class="card-body">
            @if ($product->gambar == null)
                <p>Gambar Tidak ada</p>
            @else
                <img src="{{ asset('storage/gambar_product/' . $product->gambar) }}" class="img-fluid" width="200" alt="Gambar sedang di load">
            @endif
            <p>Nama Product : {{ $product->nama_product }}</p>
            <p>Harga : {{ $product->harga }}</p>
            <p>Deskripsi : {{ $product->deskripsi_product }}</p>
            <p>Id Kategori : {{ $product->kategori_id }}</p>
            <p>Stok : 99</p>
            <a href="/product" class="btn btn-primary">Kembali ke produk</a>
        </div>
    </div>
@endsection
