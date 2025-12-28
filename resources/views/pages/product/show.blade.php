@extends('layouts.master')
@section('title', 'Ini adalah halaman produk kami')

@section('content')
    <h1 class="mt-2">Daftar Produk Kami</h1>
    <hr>
    <a type="button" class="btn btn-primary mb-3" href="/product/create">Tambah Data</a>
    <div class="alert alert-primary" role="alert">
        <b>Nama Toko : </b> {{ $data_toko['nama_toko'] }}
        <br>
        <b>Alamat Toko : </b> {{ $data_toko['alamat_toko'] }}
        <br>
        <b>Tipe Toko : </b> {{ $data_toko['tipe_toko'] }}
        <br>
    </div>
    @if (session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Produk
            <div class="d-flex gap-3">
                @if (Request()->keyword)
                <a href="/product" class="btn btn-primary">Riset Pencarian</a>
                @endif
                <form class="input-group" style="width: 350px">
                    <input type="text" class="form-control" name="keyword"placeholder="Cari data produk"
                        value="{{ Request()->keyword }}">
                    <button class="btn btn-primary" type="submit" id="basic-addon2">Search</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">kode Product</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi Produk</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_product as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->kode_product }}</td>
                            <td>{{ $product->nama_product }}</td>
                            <td>{{ $product->harga }}</td>
                            <td>{{ $product->deskripsi_product }}</td>
                            <td>{{ $product->stok }}</td>
                            <td>{{ $product->nama_kategori }}</td>
                            <td>
                                <a href="/product/{{ $product->id_product }}/edit" class="btn btn-warning">Edit</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapus{{ $product->id_product }}">
                                    Hapus
                                </button>
                                {{-- <button class="btn btn-danger">Hapus</button> --}}
                                <a href="/product/{{ $product->id_product }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data yang anda cari tidak ada!!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    @foreach ($data_product as $product)
        <!-- Modal -->
        <div class="modal fade" id="hapus{{ $product->id_product }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="/product/{{ $product->id_product }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE');
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Item</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin menghapus item {{ $product->nama_product }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
