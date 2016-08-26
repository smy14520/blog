<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {



});

Route::group(['namespace'=>'home'],function(){
Route::get('/','IndexController@index');
 Route::get('/post/{posts_id}','IndexController@post');
    Route::post('/comment','IndexController@comment');
Route::get('/blog/{cate_name}/{cate_id}','BlogController@blog');
});

Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>'LoginIndex'],function(){
    Route::any('index','IndexController@Index');
    Route::any('/','IndexController@Index');
    Route::any('quit','IndexController@quit');
    Route::any('info','IndexController@Info');
    Route::any('pass','IndexController@pass');
    Route::any('category/altericon','CategoryController@altericon');
    Route::any('category/altericoncolor','CategoryController@altericoncolor');
    Route::any('config','ConfigController@index');
    Route::any('uprollimg','UprollimgController@uprollimg');
    Route::any('upload','UprollimgController@upload');
    Route::any('carousel','UprollimgController@index');
    Route::any('carousel/{id}','UprollimgController@delete');
    Route::resource('category', 'CategoryController');
    Route::resource('article', 'ArticleController');

});
Route::get('admin/captcha','admin\LoginController@captcha');
Route::any('admin/login','admin\LoginController@Login');



