<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;

    protected $table = 'realisasi';
    protected $primaryKey = 'id_realisasi';
    

    protected $fillable = ['id_area', 'nama_realisasi'];

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function posisi()
    {
        return $this->hasMany(Posisi::class, 'id_realisasi', 'id_realisasi');
    }
}
