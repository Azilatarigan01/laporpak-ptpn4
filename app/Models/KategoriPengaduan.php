<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    // Definisikan nama tabel jika tidak menggunakan penamaan konvensional
    protected $table = 'kategori_pengaduan';

    // Definisikan kolom yang bisa diisi (fillables)
    protected $fillable = ['nama_kategori'];



    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class);
    }
}

