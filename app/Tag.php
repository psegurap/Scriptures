<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    
    protected $table = 'tags';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function articles(){
        return $this->belongsToMany('App\Article', 'articles_tags', 'tag_id', 'article_id')->withTimestamps();
    }
}
