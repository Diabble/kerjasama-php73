<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPengajuanKerjasama extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'pengajuan_kerjasama';
    protected $fillable = ['instansi', 'progres'];

    public function mitra() {
        return $this->belongsTo(ModelMitra::class, 'mitra');
    }
}
