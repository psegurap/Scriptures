<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Collaborator;
use App\Team;
use App\Serie;
use App;

class MainController extends Controller
{
    public function index()
    {
        $slider_post = Article::with('categories', 'author')->orderBy('id', 'desc')->take(4)->get();
        // dd($slider_post);
        return view('index', compact('slider_post'));
    }

    public function single_article($url)
    {
        // dd($url);
        // $article = Article::with(['categories' , 'tags' , 'series', 'author'])->where("url_es", $url)->first();
        // dd($article);
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
            }, 'series', 'author'])->where('url_es', $url)->first();
            $featured_post = Article::with('categories')->orderBy('id', 'desc')->where('url_es', '!=', $url)->first();
        }else{
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
            }, 'series', 'author'])->where('url_en', $url)->first();
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

    public function collaborators()
    {
        $collaborators = Collaborator::where('status' , 1)->orderBy('name')->get();
        // dd($collaborators);
        return view('collaborators', compact('collaborators'));
    }

    public function single_collaborator($name)
    {
        $collaborator = Collaborator::with(['articles' => function($article){
            $article->take(12)->get();
        }])->where('name' , $name)->first();
        // dd($collaborator);
        return view('author', compact('collaborator'));
    }

    public function team()
    {
        $team = Team::where('status' , 1)->orderBy('name')->get();
        // dd($collaborators);
        return view('team', compact('team'));
    }

    public function profession(){
        $serie = Serie::with('articles')->find(12);
        // dd($serie);
        return view('profession', compact('serie'));
    }
    
}
