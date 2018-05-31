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

Route::get('/index', function () {
    return view('welcome');
});
Route::get('/login',function(){
    return view('login');
});

Auth::routes();
Route::group(['namespace' => 'Admin','prefix' => 'admin'],function()
{
  Route::resource ('posts','PostsController');

});


Route::get('/home', 'HomeController@index')->name('home');
