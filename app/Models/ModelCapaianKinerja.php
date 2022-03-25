<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCapaianKinerja extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'capaian_kinerja';
    protected $fillable = ['id'];
}
