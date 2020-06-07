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
                Route::post('/store', 'Maintenance\CategoriesController@store');
                Route::post('/update/{id}', 'Maintenance\CategoriesController@update');
                Route::post('/delete/{id}', 'Maintenance\CategoriesController@delete');
            });

            Route::group(['prefix' => 'tags'], function(){
                Route::get('/', 'Maintenance\TagsController@all');
                Route::post('/store', 'Maintenance\TagsController@store');
                Route::post('/update/{id}', 'Maintenance\TagsController@update');
                Route::post('/delete/{id}', 'Maintenance\TagsController@delete');
            });

            Route::group(['prefix' => 'series'], function(){
                Route::get('/', 'Maintenance\SeriesController@all');
                Route::post('/store', 'Maintenance\SeriesController@store');
                Route::post('/update/{id}', 'Maintenance\SeriesController@update');
                Route::post('/delete/{id}', 'Maintenance\SeriesController@delete');
            });
        });

        Route::group(['prefix' => 'articles'], function(){
            Route::get('/new', 'ArticlesController@new');
        });


    });

});
