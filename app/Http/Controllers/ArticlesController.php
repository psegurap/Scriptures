<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;
use App\User;
use App\Tag;
use App\Serie;
use App\Category;
use App\Article;
use App\Collaborator;
use App\ReviewArticle;

class ArticlesController extends Controller
{
    public function articles()
    {
        $checkers_count = intval(round(User::where('filter', 1)->count() / 2));
        $approved_articles = Article::with('categories', 'tags', 'series', 'author')->wherehas('reviews', function($review){
            $review->where('desicion', 'Approved');
        }, '>=', $checkers_count)->orderBy('id', 'desc')->get();
        $articles = Article::with('categories', 'tags', 'series', 'author')->orderBy('id', 'desc')->get();
        dd($approved_articles);
        return view('admin.articles.articles', compact('articles'));
    }

    public function new()
    {
        if(App::getLocale() == 'es'){
            $tags = Tag::where('status', 1)->orderBy('tag_es', 'asc')->get();
            $categories = Category::where('status', 1)->orderBy('category_es', 'asc')->get();
            $series = Serie::where('status', 1)->orderBy('serie_es', 'asc')->get();
        }else{
            $tags = Tag::where('status', 1)->orderBy('tag_en', 'asc')->get();
            $categories = Category::where('status', 1)->orderBy('category_en', 'asc')->get();
            $series = Serie::where('status', 1)->orderBy('serie_en', 'asc')->get();
        }

        $collaborators = Collaborator::where('status', 1)->orderBy('name', 'asc')->get();

        return view('admin.articles.new', compact('tags', 'categories', 'series', 'collaborators'));
    }
    

    public function StoreArticle(Request $request)
    {
        $article_info = $request->article_info;
        if(App::getLocale() == 'es'){
            $article_data = [
                'title_es' => $article_info['title'],
                'short_description_es' => $article_info['short_description'],
                'full_content_es' => $article_info['content'],
                'url_es' => str_replace('?', '', $article_info['url'])
            ];
        }else{
            $article_data = [
                'title_en' => $article_info['title'],
                'short_description_en' => $article_info['short_description'],
                'full_content_en' => $article_info['content'],
                'url_en' => str_replace('?', '', $article_info['url'])
            ];
        }

        $article_data['img_thumbnail'] = $article_info['img_thumbnail'];
        $article_data['attach_reference'] = $article_info['attach_reference'];
        $article_data['author_id'] = $article_info['collaborator'];
        
        $article = Article::create($article_data);

        $categories = Category::find($article_info['category']);
        $article->categories()->attach($categories);

        $tags = Tag::find($article_info['tags']);
        $article->tags()->attach($tags);
        
        if($article_info['serie'] != null && $article_info['category'] != ''){
            $serie = Serie::find($article_info['serie']);
            $article->series()->attach($serie);
        }
        return $article;
    }

    public function edit($id)
    {
        $article = Article::with('categories:category_id', 'tags:tag_id', 'series:serie_id')->find($id);
        // dd($article);
        if(App::getLocale() == 'es'){
            $tags = Tag::where('status', 1)->orderBy('tag_es', 'asc')->get();
            $categories = Category::where('status', 1)->orderBy('category_es', 'asc')->get();
            $series = Serie::where('status', 1)->orderBy('serie_es', 'asc')->get();
        }else{
            $tags = Tag::where('status', 1)->orderBy('tag_en', 'asc')->get();
            $categories = Category::where('status', 1)->orderBy('category_en', 'asc')->get();
            $series = Serie::where('status', 1)->orderBy('serie_en', 'asc')->get();
        }

        $collaborators = Collaborator::where('status', 1)->orderBy('name', 'asc')->get();

        return view('admin.articles.edit', compact('tags', 'categories', 'series', 'article', 'collaborators'));
    }

    public function UpdateArticle(Request $request)
    {
        // return $request;
        $article_info = $request->article_info;
        
        if(App::getLocale() == 'es'){
            $article_data = [
                'title_es' => $article_info['title'],
                'short_description_es' => $article_info['short_description'],
                'full_content_es' => $article_info['content'],
                'url_es' => str_replace('?', '', $article_info['url'])
            ];
        }else{
            $article_data = [
                'title_en' => $article_info['title'],
                'short_description_en' => $article_info['short_description'],
                'full_content_en' => $article_info['content'],
                'url_en' => str_replace('?', '', $article_info['url'])
            ];
        }

        $article_data['img_thumbnail'] = $article_info['img_thumbnail'];
        $article_data['attach_reference'] = $article_info['attach_reference'];
        $article_data['author_id'] = $article_info['collaborator'];
        
        $article = Article::find($article_info['id'])->update($article_data);

        $categories = Category::find($article_info['category']);
        Article::find($article_info['id'])->categories()->sync($categories);

        $tags = Tag::find($article_info['tags']);
        // return $tags;
        Article::find($article_info['id'])->tags()->sync($tags);
        
        if($article_info['serie'] != null && $article_info['category'] != ''){
            $serie = Serie::find($article_info['serie']);
            Article::find($article_info['id'])->series()->sync($serie);
        }

        
        $articles = Article::with('categories', 'tags', 'series')->get();
        return $articles;
    }

    public function review_article($id){
        $article = Article::with(['author', 'categories', 'reviews' => function($article){
            $article->where('user_id', Auth::user()->id)->first();
        }])->find($id);
        // dd($article);
        return view('admin.articles.review_article', compact('article'));
    }

    public function StoreReview(Request $request){
        $data = [
            'article_id' => $request->article_id,
            'desicion' => $request->review['desicion'],
            'comment' => $request->review['comment'],
            'user_id' => Auth::user()->id
        ];
        ReviewArticle::create($data);
        $reviews = ReviewArticle::all();
        return $reviews;
    }

    public function UpdateReview(Request $request){
        $data = [
            'desicion' => $request->review['desicion'],
            'comment' => $request->review['comment'],
        ];
        ReviewArticle::where('article_id', $request->article_id)->where('user_id', Auth::user()->id)->update($data);
        $reviews = ReviewArticle::all();
        return $reviews;
    }


    /******************* ATTACHMENTS ******************/
    
    public function StorePicture(Request $request)
    {
        //Getting path to upload files
        $path = base_path() . "/public/images/articles/" . $request->attach_reference;
        $files = $request->file();

        //If the path doesn't exist, create it
        if(!file_exists($path)){
            mkdir($path);
        }

        //Running over every file to insert it in server
        foreach ($files['file'] as $file) {
            $file->move($path,$file->getClientOriginalName());
        }

        return response()->json("Done", 200);
    }
}
