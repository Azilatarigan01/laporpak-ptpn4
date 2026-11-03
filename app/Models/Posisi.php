<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;

    protected $table = 'posisi';
    protected $primaryKey = 'id_posisi';
    public $timestamps = false;

    protected $fillable = ['id_area', 'id_realisasi', 'nama_posisi'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

    public function realisasi()
    {
        return $this->belongsTo(Realisasi::class, 'id_realisasi', 'id_realisasi');
    }

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_posisi', 'id_posisi');
    }
}
