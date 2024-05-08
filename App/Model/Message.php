<?php

namespace App\Milay\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['recepteur', 'emetteur','message'];
}