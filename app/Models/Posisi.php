<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;

    protected $table = 'posisi';
    protected $primaryKey = 'id_posisi';

    protected $fillable = ['id_realisasi', 'nama_posisi'];

    public function realisasi()
    {
        return $this->belongsTo(Realisasi::class, 'id_realisasi', 'id_realisasi');
    }
     // Relasi ke tabel karyawan
     public function karyawan()
     {
         return $this->hasMany(Karyawan::class, 'id_posisi', 'id_posisi');
     }

    
}
