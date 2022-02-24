<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBerita extends Model
{
    use HasFactory;    
    protected $primaryKey = 'id';
    protected $table = 'berita';
    protected $fillable = ['poto', 'judul', 'slug', 'deskripsi', 'kategori_berita_id', 'user_id', 'views'];

    public function kategoriberita() {
        return $this->belongsTo(ModelKategoriBerita::class, 'kategori_berita_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
