@extends('layouts.master')
@section('content')
    <div class="card mt-4">
        <div class="card-header">Tambah Kategori Produk</div>
        <div class="card-body">
            <form action="/kategori" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" placeholder="Input nama kategori" name="nama_kategori"
                        value="{{ old('nama_kategori') }}">
                    @error('nama_kategori')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <textarea name="deskripsi" class="form-control" style="height: 100px">{{ old('deskripsi') }}</textarea>
                    <label>Deskripsi Kategori</label>
                    @error('deskripsi')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary  mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection
