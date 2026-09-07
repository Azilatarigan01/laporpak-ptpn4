<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    public $timestamps = false;

    protected $fillable = [
        'id_posisi',
        'nama_karyawan',
        'niksap',
        'no_hp'
    ];

    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'id_posisi', 'id_posisi');
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_karyawan', 'id_karyawan');
    }
}
