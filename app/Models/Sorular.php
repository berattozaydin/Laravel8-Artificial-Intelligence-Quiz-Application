<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorular extends Model
{
    protected $fillable=['question','a','b','c','d','correctanswer','image_question'];
    use HasFactory;

}
