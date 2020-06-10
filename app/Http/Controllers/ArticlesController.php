<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Serie;
use App\Category;
use App;

class ArticlesController extends Controller
{
    public function new(){
        if(App::getLocale() == 'es'){
            $tags = Tag::where('status', 1)->orderBy('tag_es', 'asc')->get();
            $categories = Category::where('status', 1)->orderBy('category_es', 'asc')->get();
            $series = Serie::where('status', 1)->orderBy('serie_es', 'asc')->get();
        }else{
            $tags = Tag::where('status', 1)->orderBy('tag_en', 'asc')->get();
            $categories = Category::where('status', 1)->orderBy('category_en', 'asc')->get();
            $series = Serie::where('status', 1)->orderBy('serie_en', 'asc')->get();
        }

        return view('admin.articles.new', compact('tags', 'categories', 'series'));
    }

    public function StoreArticle(Request $request){
        return $request;
    }


    /******************* ATTACHMENTS ******************/
    
    public function StorePicture(Request $request){
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
