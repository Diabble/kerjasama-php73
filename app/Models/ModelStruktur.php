<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStruktur extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'struktur';
    protected $fillable = ['poto', 'deskripsi'];

}
