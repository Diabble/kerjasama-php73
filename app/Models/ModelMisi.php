<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMisi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'misi';
    protected $fillable = ['deskripsi'];
}
