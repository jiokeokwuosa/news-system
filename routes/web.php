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

Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index');


Route::post('/publish', 
['as'=>'publish',
'uses'=>'ModeratorsController@publish']
);

Route::post('/retract', 
['as'=>'retract',
'uses'=>'ModeratorsController@retract']
);

Route::post('/saveComment', 
['as'=>'saveComment',
'uses'=>'ArticlesController@saveComment']
);

Route::get('/showByCategory/{id}', 
['as'=>'showByCategory',
'uses'=>'ArticlesController@showByCategory']
);

Route::resource('articles', 'ArticlesController');

Route::group(['middleware' => 'moderator'], function () {
    Route::resource('moderator', 'ModeratorsController');
    
});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin', 'AdminsController'); 
});



