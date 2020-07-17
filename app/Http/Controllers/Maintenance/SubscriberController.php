<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscriber;


class SubscriberController extends Controller
{
    public function all(){
        $subscribers = Subscriber::all();
        return view('admin.maintenance.subscribers', compact('subscribers'));
    }

    public function store(Request $request){
        $category = [
            'tag_es' => $request->tag_name_es,
            'tag_en' => $request->tag_name_en
        ];
        Tag::create($category);
        $tags = Tag::withCount('articles')->get();
        return $tags;
    }

    public function update(Request $request, $id){
        Tag::find($id)->update([
            'tag_es' => $request->tag_name_es,
            'tag_en' => $request->tag_name_en
        ]);
        $tags = Tag::withCount('articles')->get();
        return $tags;
    }

    public function delete($id){
        Tag::destroy($id);
        $tags = Tag::withCount('articles')->get();
        return $tags;
    }
}
