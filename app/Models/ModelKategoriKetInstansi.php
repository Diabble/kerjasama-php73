<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKategoriKetInstansi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kategori_ketinstansi';
    protected $fillable = ['nama_kategori', 'slug'];

    public function kategori_kodeinstansi() {
        return $this->hasMany(ModelMitra::class);
    }
}
