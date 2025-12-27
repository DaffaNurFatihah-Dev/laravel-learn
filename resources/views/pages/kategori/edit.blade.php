 @extends('layouts.master')

 @section('content')
     <div class="card mt-4">
         <div class="card-header">Update Kategori Produk</div>
         <div class="card-body">
             <form action="/kategori/{{ $kategori->id_kategori }}" method="POST">
                @method('PUT')
                 @csrf
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="mb-3">
                             <label class="form-label">Nama kategori</label>
                             <input type="text" name="nama_kategori" class="form-control"
                                 value="{{ $kategori->nama_kategori }}">
                             @error('nama_kategori')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-12">
                         <div class="form-floating">
                             <textarea name="deskripsi" class="form-control" style="height: 100px">{{ $kategori->deskripsi }}</textarea>
                             <label>Deskripsi Produk</label>
                             @error('deskripsi')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                         <button type="submit" class="btn btn-primary mt-3">Update Produk</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 @endsection
