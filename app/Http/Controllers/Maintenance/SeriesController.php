<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Serie;

class SeriesController extends Controller
{
    public function all(){
        $series = Serie::all();
        return view('admin.maintenance.series', compact('series'));
    }

    public function store(Request $request){
        $category = [
            'serie_es' => $request->serie_name_es,
            'serie_en' => $request->serie_name_en
        ];
        Serie::create($category);
        $series = Serie::all();
        return $series;
    }

    public function update(Request $request, $id){
        Serie::find($id)->update([
            'serie_es' => $request->serie_name_es,
            'serie_en' => $request->serie_name_en
        ]);
        $series = Serie::all();
        return $series;
    }

    public function delete($id){
        Serie::destroy($id);
        $series = Serie::all();
        return $series;
    }
}
