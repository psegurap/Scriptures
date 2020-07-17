<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes;

    protected $table = 'subscribers';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

}
