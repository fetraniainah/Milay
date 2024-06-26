<?php

namespace App\Milay\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['name', 'price','stock','description'];
}