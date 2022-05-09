<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKategoriKodeInstansi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kategori_kodeinstansi';
    protected $fillable = ['nama_kategori', 'slug'];

    public function mitra() {
        return $this->hasMany(ModelMitra::class, 'kodeinstansi', 'id');
    }
}
