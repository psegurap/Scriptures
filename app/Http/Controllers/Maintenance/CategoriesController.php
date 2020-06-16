<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function all(){
        $categories = Category::withCount('articles')->get();
        return view('admin.maintenance.categories', compact('categories'));
    }

    public function store(Request $request){
        $category = [
            'category_es' => $request->category_name_es,
            'category_en' => $request->category_name_en
        ];
        Category::create($category);
        $categories = Category::withCount('articles')->get();
        return $categories;
    }

    public function update(Request $request, $id){
        Category::find($id)->update([
            'category_es' => $request->category_name_es,
            'category_en' => $request->category_name_en
        ]);
        $categories = Category::withCount('articles')->get();
        return $categories;
    }

    public function delete($id){
        Category::destroy($id);
        $categories = Category::withCount('articles')->get();
        return $categories;
    }
}
