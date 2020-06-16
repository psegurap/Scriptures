<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use SoftDeletes;
    
    protected $table = 'series';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function articles(){
        return $this->belongsToMany('App\Article', 'articles_series', 'serie_id', 'article_id')->withTimestamps();
    }
}
