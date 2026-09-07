<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'id_berita';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'title', 
        'intro', 
        'main', 
        'quote', 
        'conclusion', 
        'image', 
        'author',
        'kategori_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(CategoriesModel::class, 'news_categories', 'id_berita', 'id_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(TagsModel::class, 'news_tags', 'id_berita', 'id_tags');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id', 'id');
    }
}
