<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKebijakanProgram extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kebijakan_program';
    protected $fillable = ['deskripsi'];
}
