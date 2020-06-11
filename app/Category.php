<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function articles(){
        return $this->belongsToMany('App\Article', 'articles_categories', 'category_id', 'article_id')->withTimestamps();
    }
}
