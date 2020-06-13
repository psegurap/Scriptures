<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function single_article($url){
        $article = Article::with('categories', 'tags', 'series')->where('url_en', $url)->first();
        $featured_post = Article::with('categories')->orderBy('id', 'desc')->where('url_en', '!=', $url)->first();
        // dd($featured_post);
        return view('single_article', compact('article', 'featured_post'));
    }
}
