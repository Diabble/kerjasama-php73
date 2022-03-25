<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProfilUINSGD extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'profil_uin_sgd';
    protected $fillable = ['id'];
}
