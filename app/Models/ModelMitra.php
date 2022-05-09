<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMitra extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'mitra';
    protected $fillable = ['kodeinstansi', 'ketinstansi', 'instansi', 'bidkerjasama', 'mulai', 'selesai', 'jenisnaskah', 'ketunit', 'berkasmitra'];

    public function kakoin() {
        return $this->belongsTo(ModelKategoriKodeInstansi::class, 'kodeinstansi', 'id');
    }

    public function kakein() {
        return $this->belongsTo(ModelKategoriKetInstansi::class, 'ketinstansi', 'id');
    }

    public function kajenas() {
        return $this->belongsTo(ModelKategoriJenisNaskah::class, 'jenisnaskah', 'id');
    }

    public function mitra() {
        return $this->belongsTo(ModelPengajuanKerjasama::class, 'name', 'id');
    }
}
