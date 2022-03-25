<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKontak extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kontak';
    protected $guarded = ['id'];
}
