<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBeranda extends Model
{
    use HasFactory;
    protected $table = 'beranda';
    protected $fillable = ['poto', 'judulcarousel', 'deskripsicarousel', 'tombolcarousel'];
}
