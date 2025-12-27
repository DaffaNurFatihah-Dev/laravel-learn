@extends('layouts.master')

@section('content')
    <h1 class="mt-2">Daftar Produk Kami</h1>
    <hr>
    <a href="/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>
    @if (session('message'))
        <div class="alert alert-primary mb-3" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Kategori
            <div class="d-flex gap-3">
                @if (Request()->keyword)
                <a href="/kategori" class="btn btn-primary">Riset Pencarian</a>
                @endif
                <form class="input-group" style="width: 350px">
                    @csrf
                    <input type="text" class="form-control" name="keyword"placeholder="Cari data Kategori"
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
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="/kategori/{{ $item->id_kategori }}/edit" class="btn btn-warning">Edit</a>
                                 <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapus{{ $item->id_kategori }}">
                                    Hapus
                                </button>
                                <a href="/kategori/{{ $item->id_kategori }}" class="btn btn-primary">Detail</a>
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

        @foreach ($kategori as $item)
        <!-- Modal -->
        <div class="modal fade" id="hapus{{ $item->id_kategori }}" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="/kategori/{{ $item->id_kategori }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE');
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Item</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin menghapus kategori {{ $item->nama_kategori }} ??
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
