<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    use SoftDeletes;

    protected $table = 'articles';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'articles_categories', 'article_id', 'category_id')->withTimestamps();   

    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'articles_tags', 'article_id', 'tag_id')->withTimestamps();   
    }

    public function series()
    {
        return $this->belongsToMany('App\Serie', 'articles_series', 'article_id', 'serie_id')->withTimestamps();   
    }
}
