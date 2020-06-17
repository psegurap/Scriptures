<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function single_article($url){
        if(App::getLocale() == 'es'){
            $article = Article::with(['categories' => function($category) use ($url){
                if(App::getLocale() == 'es'){
                    $category->with(['articles' => function($article) use ($url){
                        $article->where('url_es', '!=', $url)->get();
                    }])->take(6);
                }else{
                    $category->with(['articles' => function($article) use ($url){
                        $article->where('url_en', '!=', $url)->get();
                    }])->take(6);
                }
            }, 'tags' => function($tag){
                $tag->with('articles')->get();
            }, 'series'])->where('url_es', $url)->first();
            $featured_post = Article::with('categories')->orderBy('id', 'desc')->where('url_es', '!=', $url)->first();
        }else{
            $article = Article::with(['categories', 'tags' => function($tag){
                $tag->with('articles')->get();
            }, 'series'])->where('url_en', $url)->first();
            $featured_post = Article::with('categories')->orderBy('id', 'desc')->where('url_en', '!=', $url)->first();
        }

        $others_posts = [];
        // dd($article);
        foreach($article->tags as $tag){
            foreach($tag->articles as $current_article){
                array_push($others_posts, $current_article->id);
            }
        }
        if(App::getLocale() == 'es'){
            $others_posts = Article::with('categories')->where('url_es', '!=', $url)->where('id', '!=', $featured_post->id)->find($others_posts)->take(5);
        }else{
            $others_posts = Article::with('categories')->where('url_en', '!=', $url)->where('id', '!=', $featured_post->id)->find($others_posts)->take(5);
        }
        
        return view('single_article', compact('article', 'featured_post', 'others_posts'));
    }
}
