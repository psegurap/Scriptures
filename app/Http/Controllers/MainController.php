<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use App\Article;
use App\Collaborator;
use App\Team;
use App\Serie;
use App\User;
use App\Category;
use App\Subscriber;
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
        $slider_ids = $slider_post->pluck('id')->toArray();
        // dd($slider_ids);
        $categories_articles = Category::with(['articles' => function($article) use($slider_ids){
            $article->whereNotIn('article_id', $slider_ids)->get();
        }])->whereHas('articles', function($article) use ($slider_ids){
            $article->whereNotIn('article_id', $slider_ids);
        })->get();
        // dd($categories_articles);
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
        }, 'series', 'author' => function($author) use ($url, $checkers_count){
            $author->with(['articles' => function($article) use ($url, $checkers_count){
                $article->wherehas('reviews', function($review){
                    $review->where('desicion', 'Approved');
                }, '>=', $checkers_count)->inRandomOrder()->where('url_es', '!=', $url)->where('url_en', '!=', $url)->take(6);
            }])->get();
        }])->where('url_es', $url)->orwhere('url_en', $url)->first();

        // $article = Article::with(['categories', 'tags' => function($tag) use ($checkers_count){
        //     $tag->with(['articles'])->get();
        // }, 'series', 'author' => function($author) use ($url, $checkers_count){
        //     $author->with(['articles' => function($article) use ($url, $checkers_count){
        //         $article->inRandomOrder()->where('url_es', '!=', $url)->where('url_en', '!=', $url)->take(6);
        //     }])->get();
        // }])->where('url_es', $url)->orwhere('url_en', $url)->first();

        $featured_post = Article::with('categories', 'author')->orderBy('id', 'desc')->where('url_es', '!=', $url)->wherehas('reviews', function($review){
            $review->where('desicion', 'Approved');
        }, '>=', $checkers_count)->first();

        $others_posts = [];
        foreach($article->tags as $tag){
            foreach($tag->articles as $current_article){
                array_push($others_posts, $current_article->id);
            }
        }
        if(isset($featured_post)){
            $others_posts = Article::with('categories')->where('author_id', '!=', $article->author_id)->where('id', '!=', $featured_post->id)->find($others_posts)->take(5);
        }else{
           $others_posts = [];
        }
        // dd($article);
        
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
        $checkers_count = intval(round(User::where('filter', 1)->count() / 2));
        $collaborator = Collaborator::with(['articles' => function($article) use ($checkers_count){
            $article->wherehas('reviews', function($review){
                $review->where('desicion', 'Approved');
            }, '>=', $checkers_count)->take(12)->get();
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

        $checkers_count = intval(round(User::where('filter', 1)->count() / 2));
        $serie = Serie::with(['articles' => function($article) use ($checkers_count){
            $article->with('author')->wherehas('reviews', function($review){
                    $review->where('desicion', 'Approved');
                }, '>=', $checkers_count)->get();
        }])->find(12);
        // dd($serie);
        return view('profession', compact('serie'));
    }

    public function contact(){
        return view('contact');
    }

    public function StoreSubscriber(Request $request){
        $exist = Subscriber::where('email', $request->email)->get();
        if(count($exist) == 0){
            $subscriber_info = [
                'email' => $request->email,
                'language' => App::getLocale(),
            ];
            $susbcriber = Subscriber::create($subscriber_info);
            MailController::new_subscriber_notification($susbcriber->email);
            return $susbcriber;
        }else{
            return response()->json("Exist", 406);
        }
    }
    
}
