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

//------------------ Auth Routes -------------------//
Auth::routes();

//------------------ Language Route -------------------//
Route::get('language/{locale}', function($locale){
    App::setlocale($locale);
	session()->put('locale',$locale);
	return redirect()->back();
});

//------------------ GENERAL ROUTES ---------------------//

Route::get('/', 'MainController@index')->name('index');
Route::get('/article/{url}', 'MainController@single_article');
Route::get('/articulo/{url}', 'MainController@single_article');

Route::get('/collaborators', 'MainController@collaborators');
Route::get('/colaboradores', 'MainController@collaborators');

Route::get('/collaborator/{name}', 'MainController@single_collaborator');
Route::get('/colaborador/{name}', 'MainController@single_collaborator');




Route::group(['middleware' => ['auth']], function(){
    
    Route::group(['prefix' => 'admin'], function(){
        Route::get('home', 'AdminMainController@home')->name('admin');
        Route::get('home2', function(){
            return view('admin.index_admin2');
        });

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
            Route::get('/', 'ArticlesController@articles');
            Route::get('/new', 'ArticlesController@new');
            Route::post('/StoreArticle', 'ArticlesController@StoreArticle');
            Route::get('/edit/{id}', 'ArticlesController@edit');
            Route::post('/UpdateArticle', 'ArticlesController@UpdateArticle');


            Route::group(['prefix' => 'files'], function(){
                Route::post('/storePicture', 'ArticlesController@StorePicture');
            });

        });

        Route::group(['prefix' => 'collaborators'], function(){
            Route::get('/', 'CollaboratorsController@collaborators');
            Route::get('/new', 'CollaboratorsController@new');
            Route::post('/StoreCollaborator', 'CollaboratorsController@StoreCollaborator');
            Route::get('/edit/{id}', 'CollaboratorsController@edit');
            Route::post('/UpdateCollaborator/{id}', 'CollaboratorsController@UpdateCollaborator');


            Route::group(['prefix' => 'files'], function(){
                Route::post('/storePicture', 'CollaboratorsController@StorePicture');
            });

        });

        Route::group(['prefix' => 'team'], function(){
            Route::get('/', 'TeamController@team');
            Route::get('/new', 'TeamController@new');
            Route::post('/StoreTeam', 'TeamController@StoreTeam');
            Route::get('/edit/{id}', 'TeamController@edit');
            Route::post('/UpdateTeam/{id}', 'TeamController@UpdateTeam');

            Route::group(['prefix' => 'files'], function(){
                Route::post('/storePicture', 'TeamController@StorePicture');
            });

        });


    });

});
