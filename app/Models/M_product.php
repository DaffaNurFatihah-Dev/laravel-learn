<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_product extends Model
{
    //inisialisasi nama tabel
    protected $table = 'tb_product';

    //inisialisasi primary key yang ada di tabel tersebut
    protected $primaryKey = 'id_product';

    //inisialisasi data yang boleh di isi di tabel
    // protected $fillable = ['nama_product', 'harga', 'deskripsi_product'];

    //inisialisasi data yang tidak boleh di isi (ini kalau mau pakai harus milih fillabel atau guarded)
    protected $guarded = ['id_product'];
}
