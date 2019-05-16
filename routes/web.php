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


Route::get('/','MainController@index')->name('home');
Route::get('/logout','HomeController@logout')->name('logout');

Route::get('/addroute',"PostController@index");
Route::post('/addroute',"PostController@createPost")->name('addpost');

Route::get('/publish/category/{id}/','PublishController@getByCategory')->name('category');
Route::get('/ajax/publish','PublishController@getByCategoryAjax');

Route::get('/publish/detal/{id}','PublishController@detalPublic')->name('publish');
Route::post('/addlike','InfoController@addLike')->name('addlike');
Route::post('/addview','InfoController@addView')->name('addview');


