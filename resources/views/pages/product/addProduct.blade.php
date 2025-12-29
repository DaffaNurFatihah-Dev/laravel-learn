 @extends('layouts.master')

 @section('content')
     <div class="card mt-4">
         <div class="card-header">Tambah Data Produk</div>
         <div class="card-body">
             <form action="/product" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="mb-3">
                             <label class="form-label">Nama produk</label>
                             <input type="text" name="nama_product" class="form-control"
                                 value="{{ old('nama_product') }}">
                             @error('nama_product')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="mb-3">
                             <label class="form-label">Harga</label>
                             <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
                             @error('harga')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="mb-3">
                             <label class="form-label">Stok</label>
                             <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">
                             @error('harga')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="mb-3">
                             <label class="form-label">Gambar Produk</label>
                             <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}">
                             @error('gambar')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="mb-3">
                             <label class="form-label">Kategori</label>
                             <select class="custom-select" aria-label="Default select example" name="kategori">
                                 <option value="">Pilih di sini</option>
                                 @foreach ($data_kategori as $item)
                                 <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="col-12">
                         <label class="form-label">Deskripsi</label>
                         <div class="form-floating">
                             <textarea name="deskripsi_product" class="form-control" style="height: 100px"></textarea>
                             <label>Deskripsi Produk</label>
                             @error('deskripsi_product')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                         <button type="submit" class="btn btn-primary mt-3">Tambahkan Produk</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 @endsection
