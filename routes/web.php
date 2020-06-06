<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', 'MainController@index')->name('index');

Route::group(['middleware' => ['auth']], function(){
    
    Route::group(['prefix' => 'admin'], function(){
        Route::get('home', 'AdminMainController@home')->name('admin');

        Route::group(['prefix' => 'maintenance'], function(){
            
            Route::group(['prefix' => 'categories'], function(){
                Route::get('/', 'Maintenance\CategoriesController@all');
            });
        });

    });

});
