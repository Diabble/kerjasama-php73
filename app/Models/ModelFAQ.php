<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFAQ extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'faq';
    protected $fillable = ['pertanyaan', 'jawaban'];
}
