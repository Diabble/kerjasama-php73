<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelWakilRektor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'wakil_rektor';
    protected $fillable = ['poto', 'nama', 'jabatan', 'nip', 'deskripsi'];
}
