<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAlur extends Model
{
    use HasFactory;    
    protected $primaryKey = 'id';
    protected $table = 'alur';
    protected $fillable = ['poto', 'deskripsi'];
}
