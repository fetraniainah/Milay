<?php

namespace App\Milay\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'Users';
    protected $fillable = ['column1', 'column2'];
}