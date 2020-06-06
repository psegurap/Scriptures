<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function home(){
        return view('admin.index_admin');
    }
}
