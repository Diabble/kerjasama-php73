<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelVisi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'visi';
    protected $fillable = ['deskripsi'];
}
