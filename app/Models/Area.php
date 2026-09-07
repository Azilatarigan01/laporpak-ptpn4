<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';
    protected $primaryKey = 'id_area';
    public $timestamps = false;

    protected $fillable = ['nama_area'];

    public function realisasi()
    {
        return $this->hasMany(Realisasi::class, 'id_area', 'id_area');
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_area', 'id_area');
    }
}
