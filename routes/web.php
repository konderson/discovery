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
Route::group(['middleware'=>'auth'],function () {


    Route::get('/logout', 'HomeController@logout')->name('logout');

    Route::get('/addroute', "PostController@index");
    Route::post('/addroute', "PostController@createPost")->name('addpost');

    Route::get('/publish/category/{id}/', 'PublishController@getByCategory')->name('category');
    Route::get('/ajax/publish', 'PublishController@getByCategoryAjax');

    Route::get('/publish/detal/{id}', 'PublishController@detalPublic')->name('publish');
    Route::get('/publish/popular', 'PublishController@getPopular')->name('getpopular');
    Route::post('/addlike', 'InfoController@addLike')->name('addlike');
    Route::post('/addview', 'InfoController@addView')->name('addview');
    Route::get('/search','SearchController@search');
Route::get('person/info','PersonController@userInfoOwner');


    /*Route::get('/admin',['as'=>'admin.index',
        'middleware'=>'role:admin',
        'uses'=>function(){
        return view ('admin.index');
        }]);
    Route::get('role','RoleController@index')->name('role.index');
    Route::get('role_create','RoleController@create')->name('role.create');
    Route::post('role_store','RoleController@store')->name('role.store');

*/

Route::get('admin_panel','AdminController@index')->middleware('role:admin');
Route::get('admin_panel/allpublc','AdminController@publication')->middleware('role:admin');

});
