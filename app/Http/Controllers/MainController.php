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
use App\Tag;
use App\Subscriber;
use App;

class MainController extends Controller
{

    public function CheckersCount(){
        $result = intval(round(User::where('filter', 1)->count() / 2));
        return $result;
    }

    public function index()
    {
        $checkers_count = $this->CheckersCount();

        $slider_post = Article::with('categories', 'authors')->orderBy('id', 'desc')->wherehas('reviews', function($review){
            $review->where('desicion', 'Approved');
        }, '>=', $checkers_count)->take(4)->get();
        $slider_ids = $slider_post->pluck('id')->toArray();

        $dont_miss = Article::with('categories', 'authors')->orderBy('id', 'desc')->wherehas('reviews', function($review){
            $review->where('desicion', 'Approved');
        }, '>=', $checkers_count)->whereNotIn('id', $slider_ids)->take(4)->get();
        $dont_miss_id = $dont_miss->pluck('id')->toArray();

        $merged_top = array_merge($slider_ids, $dont_miss_id);

        $recent_posts_pagination = Article::with('categories', 'authors')->orderBy('id', 'desc')->wherehas('reviews', function($review){
            $review->where('desicion', 'Approved');
        }, '>=', $checkers_count)->whereNotIn('id', $merged_top)->paginate(8);

        $featured_post = Article::with('categories', 'authors')->orderBy('id', 'desc')->wherehas('reviews', function($review){
            $review->where('desicion', 'Approved');
        }, '>=', $checkers_count)->first();

        $categories_articles = Category::with(['articles' => function($article) use($slider_ids){
            $article->whereNotIn('article_id', $slider_ids)->get();
        }])->whereHas('articles', function($article) use ($slider_ids){
            $article->whereNotIn('article_id', $slider_ids);
        })->get();
        // dd($categories_articles);
        return view('index', compact('slider_post', 'dont_miss', 'recent_posts_pagination', 'featured_post'));
    }

    public function single_article($url)
    {
        $checkers_count = $this->CheckersCount();
        $article = Article::with(['categories', 'tags' => function($tag) use ($checkers_count){
            $tag->with(['articles' => function($article) use ($checkers_count){
                $article->wherehas('reviews', function($review) use ($checkers_count){
                    $review->where('desicion', 'Approved');
                }, '>=', $checkers_count)->get();
            }])->get();
        }, 'series', 'authors' => function($author) use ($url, $checkers_count){
            $author->with(['articles' => function($article) use ($url, $checkers_count){
                $article->wherehas('reviews', function($review){
                    $review->where('desicion', 'Approved');
                }, '>=', $checkers_count)->inRandomOrder()->where('url_es', '!=', $url)->where('url_en', '!=', $url)->take(6);
            }])->get();
        }])->where('url_es', $url)->orwhere('url_en', $url)->first();


        $featured_post = Article::with('categories', 'authors')->orderBy('id', 'desc')->where('url_es', '!=', $url)->wherehas('reviews', function($review){
            $review->where('desicion', 'Approved');
        }, '>=', $checkers_count)->first();

        $others_posts = [];
        foreach($article->tags as $tag){
            foreach($tag->articles as $current_article){
                array_push($others_posts, $current_article->id);
            }
        }
        if(isset($featured_post)){
            // $others_posts = Article::with('categories')->where('author_id', '!=', $article->author_id)->where('id', '!=', $featured_post->id)->find($others_posts)->take(5);
            $others_posts = Article::with('categories')->where('author_id', '!=', [1,2])->where('id', '!=', $featured_post->id)->find($others_posts)->take(5);
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
        $checkers_count = $this->CheckersCount();
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

        $checkers_count = $this->CheckersCount();
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

    public function getFooterCategories(){
        $checkers_count = $this->CheckersCount();
        $categories = Category::whereHas('articles', function($article) use ($checkers_count){
            $article->whereHas('reviews', function($review){
                $review->where('desicion', 'Approved');
            },'>=', $checkers_count);
        })->where('status', 1)->inRandomOrder()->take(5)->get();

        return $categories;
    }

    public function getFooterTags(){
        $checkers_count = $this->CheckersCount();
        $tags = Tag::whereHas('articles', function($article) use ($checkers_count){
            $article->whereHas('reviews', function($review){
                $review->where('desicion', 'Approved');
            },'>=', $checkers_count);
        })->where('status', 1)->inRandomOrder()->take(5)->get();

        return $tags;
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
