<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key (default di Laravel)
    public $incrementing = true; // ID kategori auto-increment
    protected $keyType = 'int'; // Tipe data ID kategori
    public $timestamps = false; // Nonaktifkan timestamps

    protected $fillable = [
        'name', // Kolom yang bisa diisi
    ];

    /**
     * Relasi Many-to-Many dengan tabel news.
     */
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_categories', 'id_categories', 'id_berita');
    }
}
