<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAlurKerjasama extends Model
{
    use HasFactory;    
    protected $primaryKey = 'id';
    protected $table = 'alur_kerjasama';
    protected $fillable = ['poto', 'deskripsi'];
}
