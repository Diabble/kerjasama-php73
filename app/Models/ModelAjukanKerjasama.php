<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAjukanKerjasama extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'ajukan_kerjasama';
    protected $guarded = ['id'];
}
