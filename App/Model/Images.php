<?php

namespace App\Milay\Model;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $fillable = ['article_id', 'image_url'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}