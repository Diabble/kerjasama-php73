<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPengumuman extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'pengumuman';
    protected $fillable = ['judul', 'deskripsi', 'user_id'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
