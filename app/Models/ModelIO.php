<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelIO extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'io';
    protected $fillable = ['deskripsi'];
}
