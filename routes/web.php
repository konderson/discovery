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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','MainController@index');

Route::get('/addroute',"PostController@index");
Route::post('/addroute',"PostController@createPost")->name('addpost');

Route::get('/publish/category/{id}/','PublishController@getByCategory');
Route::get('/publish/detal/{id}','PublishController@detalPublic');
Route::post('/addlike','InfoController@addLike')->name('addlike');


