<?php

namespace App\Http\Controllers;

use App\Models\M_kategori;
use App\Models\M_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class C_product extends Controller
{
    public function index(Request $request)
    {

        $search = $request->keyword;

        // $data_product = M_product::get();// Cara ambil data pakai eloquent orm
        $data_product = M_product::when($search, function ($query, $search) {
            return $query->where('nama_product', 'like', "%{$search}%")
                ->orWhere('deskripsi_product', 'like', "%{$search}%");
        })
            ->join('tb_kategori', 'tb_product.kategori_id', '=', 'tb_kategori.id_kategori')
            ->get();

        // $dataProduct = DB::table('tb_product')->get(); //-> cara query Builder
        $data_toko = [
            'nama_toko' => 'Makmur Jaya Abadi',
            'alamat_toko' => 'Jl.Jetis, Karangdowo',
            'tipe_toko' => 'Ruko'
        ];
        return view('pages.product.show', [
            'data_product' => $data_product,
            'data_toko' => $data_toko
        ]);
    }
    public function create()
    {
        $data_kategori = M_kategori::get();

        return view('pages.product.addProduct', compact('data_kategori'));
    }
    public function store(Request $request)
    {
        //validasi data inputan
        $request->validate([
            'nama_product' => 'required|min:8|max:20',
            'harga' => 'required',
            'deskripsi_product' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
        ], [
            'nama_product.required' => 'nama product harus di isi',
            'nama_product.min' => 'minimal nama product 8 karakter',
            'nama_product.max' => 'maksimal nama product 12 karakter',
            'harga.required' => 'harga harus di isi',
            'deskripsi_product.required' => 'deskripsi product harus di isi',
            'stok.required' => 'stok product harus di isi',
            'kategori.required' => 'kategori product harus di isi'
        ]);

        //insert ke db pakai eloquent
        M_product::create([
            'kode_product' => Str::random(4),
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'deskripsi_product' => $request->deskripsi_product,
            'kategori_id' => $request->kategori,
            'stok' => $request->stok
        ]);

        //redirect kalau sudah selesai insert
        return Redirect('/product')->with('message', 'Berhasil memasukkan data');
    }

    public function show($id)
    {
        $data = M_product::FindOrFail($id);

        return view('pages.product.detail', [
            'product' => $data
        ]);
    }

    public function edit($id)
    {
        $data = M_product::FindOrFail($id);
        $data_kategori = M_kategori::get();

        return view('pages.product.edit', [
            'product' => $data,
            'data_kategori' => $data_kategori
        ]);
    }
    public function update($id, Request $request)
    {
        $request->validate(
            [
                'nama_product' => 'required|min:8',
                'harga' => 'required',
                'deskripsi_product' => 'required',
                'stok' => 'required',
                'kategori' => 'required',
            ],
            [
                'nama_product.required' => 'nama produk harus di isi',
                'nama_product.min' => 'nama produk minimal 8 karakter',
                'harga.required' => 'harga harus di isi',
                'deskripsi_product.required' => 'deskripsi product harus di isi',
                'stok.required' => 'stok product harus di isi',
                'kategori.required' => 'kategori product harus di isi'
            ]
        );

        M_product::where('id_product', $id)->update([
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'deskripsi_product' => $request->deskripsi_product,
            'stok'=> $request->stok,
            'kategori_id'=> $request->kategori
        ]);

        return redirect('/product')->with('message', 'produk berhasil di update');
    }

    public function destroy($id)
    {
        M_product::FindOrFail($id)->delete();
        return redirect('/product')->with('message', 'Produk berhasil di hapus');
    }
}
