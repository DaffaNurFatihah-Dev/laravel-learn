@extends('layouts.master')

@section('content')
    <h1 class="mt-2">Halaman Kategori Produk</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Kategori Produk
        </div>
        <div class="card-body">
            <img src="https://placehold.co/600x400" class="img-fluid" alt="Gambar sedang di load">
            <div class="card-body">
                <p>Nama Kategori : {{ $kategori->nama_kategori }}</p>
                <p>Deskripsi : {{ $kategori->deskripsi }}</p>
                <a href="/kategori" class="btn btn-primary">Kembali ke Kategori</a>
            </div>
        </div>
    </div>
@endsection