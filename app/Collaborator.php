<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaborator extends Model
{
    use SoftDeletes;

    protected $table = 'collaborators';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    
    public function articles()
    {
        return $this->belongsToMany('App\Article', 'articles_collaborators', 'collaborator_id', 'article_id')->withTimestamps();   
    }

}
