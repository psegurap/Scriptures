<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function new(){
        return view('admin.articles.new');
    }
}
