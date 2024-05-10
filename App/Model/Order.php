<?php

namespace App\Milay\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','article_id','quantity','price_unit','total_price', 'status','adresse','total_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Article::class)->withPivot('quantity');
    }
}