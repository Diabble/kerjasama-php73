<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTugasPokokFungsi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tupoksi';
    protected $fillable = ['deskripsi'];
}
