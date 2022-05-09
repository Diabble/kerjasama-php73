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

    public function users() {
        return $this->belongsTo(User::class, 'instansi', 'id');
    }
    
    public function peker_id() {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function user() {
        return $this->hasMany(User::class, 'peker_id', 'id');
    }
}
