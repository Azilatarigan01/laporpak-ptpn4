<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    
    public $timestamps = false;

    protected $casts = [
        'tgl_pengaduan' => 'datetime',
    ];

    protected $fillable = [
        'id_area',
        'id_realisasi',
        'id_posisi',
        'id_karyawan',
        'niksap',
        'no_hp',
        'deskripsi',
        'lampiran',
        'foto',
        'tgl_pengaduan',
        'status',
        'balasan',
        'kode_pengaduan',
        'kategori_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

    public function realisasi()
    {
        return $this->belongsTo(Realisasi::class, 'id_realisasi', 'id_realisasi');
    }

    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'id_posisi', 'id_posisi');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function kategori_pengaduan()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id', 'id');
    }
}
