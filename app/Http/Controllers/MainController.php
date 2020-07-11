<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Collaborator;
use App\Team;
use App\Serie;
use App\User;
use App;

class MainController extends Controller
{
    public function index()
    {
        // $checkers_count = intval(round(User::where('filter', 1)->count() / 2));
        // $slider_post = Article::with('categories', 'author')->orderBy('id', 'desc')->wherehas('reviews', function($review){
        //     $review->where('desicion', 'Approved');
        // }, '>=', $checkers_count)->take(4)->get();
        $slider_post = Article::with('categories', 'author')->orderBy('id', 'desc')->take(4)->get();
        return view('index', compact('slider_post'));
    }

    public function single_article($url)
    {
        $checkers_count = intval(round(User::where('filter', 1)->count() / 2));
        $article = Article::with(['categories', 'tags' => function($tag) use ($checkers_count){
            $tag->with(['articles' => function($article) use ($checkers_count){
                $article->wherehas('reviews', function($review) use ($checkers_count){
                    $review->where('desicion', 'Approved');
                }, '>=', $checkers_count)->get();
            }])->get();
        }, 'series', 'author' => function($author) use ($url){
            $author->with(['articles' => function($article) use ($url){
                $article->inRandomOrder()->where('url_es', '!=', $url)->where('url_en', '!=', $url)->take(6);
            }])->get();
        }])->where('url_es', $url)->orwhere('url_en', $url)->first();

        $featured_post = Article::with('categories')->orderBy('id', 'desc')->where('url_es', '!=', $url)->wherehas('reviews', function($review){
            $review->where('desicion', 'Approved');
        }, '>=', $checkers_count)->first();

        $others_posts = [];
        foreach($article->tags as $tag){
            foreach($tag->articles as $current_article){
                array_push($others_posts, $current_article->id);
            }
        }
        $others_posts = Article::with('categories')->where('author_id', '!=', $article->author_id)->where('id', '!=', $featured_post->id)->find($others_posts)->take(5);
        
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
