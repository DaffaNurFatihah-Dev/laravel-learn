<?php

namespace App\Http\Controllers;

use App\Models\M_kategori;
use Illuminate\Http\Request;

class C_kategori extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->keyword;

        $kategori = M_kategori::when($search, function($query, $search){
            return $query->where('nama_kategori', 'like', "%{$search}%")
            ->orWhere('deskripsi', 'like', "%{$search}%");
        })->get();
        
        return view('pages.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kategori' => 'required|min:3',
            'deskripsi'=>'required'
        ],[
            'nama_kategori.required'=>'nama kategori harus di isi',
            'nama_kategori.min'=>'nama kategori harus di isi minimal 3 karakter',
            'deskripsi.required'=>'deskripsi harus di isikan'
        ]);

        M_kategori::create([
            'nama_kategori'=>$request->nama_kategori,
            'deskripsi'=>$request->deskripsi,
        ]);

        return redirect('/kategori')->with('message', 'Kategori succes di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = M_kategori::FindOrFail($id);
        
        return view('pages.kategori.detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = M_kategori::FindOrFail($id);

        return view('pages.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required|min:3',
            'deskripsi' => 'required'
        ], [
            'nama_kategori.required' => 'nama kategori harus di isi',
            'nama_kategori.min' => 'nama kategori harus di isi minimal 3 karakter',
            'deskripsi.required' => 'deskripsi harus di isikan'
        ]);

        M_kategori::where('id_kategori', $id)->update([
            'nama_kategori'=>$request->nama_kategori,
            'deskripsi'=>$request->deskripsi,
        ]);

        return redirect('/kategori')->with('message', 'Kategori berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        M_kategori::FindOrFail($id)->delete();
        return redirect('/kategori')->with('message', 'kategori berhasil di hapus');
    }
}
