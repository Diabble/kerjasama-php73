<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSambutan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'sambutan';
    protected $fillable = ['poto', 'nama', 'jabatan', 'nip', 'deskripsi'];
}
