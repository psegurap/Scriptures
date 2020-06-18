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

}
