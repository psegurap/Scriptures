<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewArticle extends Model
{
    use SoftDeletes;

    protected $table = 'reviews_articles';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    // public function articles()
    // {
    //     return $this->hasMany('App\Article', 'author_id', 'id');   
    // }
}
