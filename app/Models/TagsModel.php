<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    use HasFactory;

    protected $table = 'tags'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key (default di Laravel)
    public $incrementing = true; // ID tag auto-increment
    protected $keyType = 'int'; // Tipe data ID tag
    public $timestamps = false; // Nonaktifkan timestamps

    protected $fillable = [
        'name', // Kolom yang bisa diisi
    ];

    /**
     * Relasi Many-to-Many dengan tabel news.
     */
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tag', 'id_tags', 'id_berita');
    }
}
