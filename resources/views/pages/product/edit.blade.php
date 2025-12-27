 @extends('layouts.master')

 @section('content')
     <div class="card mt-4">
         <div class="card-header">Update Data Produk</div>
         <div class="card-body">
             <form action="/product/{{ $product->id_product }}" method="POST">
                @method('PUT')
                 @csrf
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="mb-3">
                             <label class="form-label">Nama produk</label>
                             <input type="text" name="nama_product" class="form-control"
                                 value="{{ $product->nama_product }}">
                             @error('nama_product')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="mb-3       ">
                             <label class="form-label">Harga</label>
                             <input type="number" name="harga" class="form-control" value="{{ $product->harga }}">
                             @error('harga')
                                 <div class="form-text text-danger">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <div class="col-12">
                         <div class="form-floating">
                             <textarea name="deskripsi_product" class="form-control" style="height: 100px">{{ $product->deskripsi_product }}</textarea>
                             <label>Deskripsi Produk</label>
                             @error('deskripsi_product')
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
