<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Tag;
use App\Serie;
use App\Category;
use App\Article;

class ArticlesController extends Controller
{
    public function articles()
    {
        $articles = Article::with('categories', 'tags', 'series')->orderBy('id', 'desc')->get();
        // dd($articles);
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

        return view('admin.articles.new2', compact('tags', 'categories', 'series'));
    }
    

    public function StoreArticle(Request $request)
    {
        $article_info = $request->article_info;
        $article_data = [
            'img_thumbnail' => $article_info['img_thumbnail'],
            'attach_reference' => $article_info['attach_reference']
        ];
        if(App::getLocale() == 'es'){
            $article_data = [
                'title_es' => $article_info['title'],
                'short_description_es' => $article_info['short_description'],
                'full_content_es' => $article_info['content'],
                'url_es' => $article_info['url']
            ];
        }else{
            $article_data = [
                'title_en' => $article_info['title'],
                'short_description_en' => $article_info['short_description'],
                'full_content_en' => $article_info['content'],
                'url_en' => $article_info['url']
            ];
        }

        $article_data['img_thumbnail'] = $article_info['img_thumbnail'];
        $article_data['attach_reference'] = $article_info['attach_reference'];
        
        $article = Article::create($article_data);

        $categories = Category::find($article_info['category']);
        $article->categories()->attach($categories);

        $tags = Tag::find($article_info['tags']);
        $article->tags()->attach($tags);
        
        if($article_info['serie'] != null && $article_info['category'] != ''){
            $serie = Category::find($article_info['serie']);
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

        return view('admin.articles.edit', compact('tags', 'categories', 'series', 'article'));
    }

    public function UpdateArticle(Request $request)
    {
        // return $request;
        $article_info = $request->article_info;
        $article_data = [
            'img_thumbnail' => $article_info['img_thumbnail'],
            'attach_reference' => $article_info['attach_reference']
        ];
        if(App::getLocale() == 'es'){
            $article_data = [
                'title_es' => $article_info['title'],
                'short_description_es' => $article_info['short_description'],
                'full_content_es' => $article_info['content'],
                'url_es' => $article_info['url']
            ];
        }else{
            $article_data = [
                'title_en' => $article_info['title'],
                'short_description_en' => $article_info['short_description'],
                'full_content_en' => $article_info['content'],
                'url_en' => $article_info['url']
            ];
        }

        $article_data['img_thumbnail'] = $article_info['img_thumbnail'];
        $article_data['attach_reference'] = $article_info['attach_reference'];
        
        $article = Article::find($article_info['id'])->update($article_data);

        $categories = Category::find($article_info['category']);
        Article::find($article_info['id'])->categories()->sync($categories);

        $tags = Tag::find($article_info['tags']);
        // return $tags;
        Article::find($article_info['id'])->tags()->sync($tags);
        
        if($article_info['serie'] != null && $article_info['category'] != ''){
            $serie = Category::find($article_info['serie']);
            Article::find($article_info['id'])->series()->sync($serie);
        }

        
        $articles = Article::with('categories', 'tags', 'series')->get();
        return $articles;
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
