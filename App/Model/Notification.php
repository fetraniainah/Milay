<?php

namespace App\Milay\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['text', 'status'];
}