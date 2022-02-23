<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKategoriBerita extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kategori_berita';
    protected $fillable = ['nama_kategori', 'slug'];

    public function berita() {
        return $this->hasMany(ModelBerita::class);
    }
}
