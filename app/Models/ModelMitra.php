<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMitra extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'mitra';
    protected $fillable = ['kategori_kodeinstansi', 'kategori_ketinstansi', 'instansi', 'bidkerjasama', 'mulai', 'selesai', 'kategori_jenisnaskah', 'file'];

    public function kategori_kodeinstansi() {
        return $this->belongsTo(ModelKategoriKodeInstansi::class, 'kategori_kodeinstansi', 'id');
    }

    public function kategori_ketinstansi() {
        return $this->belongsTo(ModelKategoriKetInstansi::class, 'kategori_ketinstansi', 'id');
    }

    public function kategori_jenisnaskah() {
        return $this->belongsTo(ModelKategoriJenisNaskah::class, 'kategori_jenisnaskah', 'id');
    }
}
