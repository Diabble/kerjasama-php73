<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKategoriJenisNaskah extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kategori_jenisnaskah';
    protected $fillable = ['nama_kategori', 'slug'];

    public function mitra() {
        return $this->hasMany(ModelMitra::class);
    }
}
