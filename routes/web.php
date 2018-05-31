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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/connect',function(){
    return view('connect');
});
Route::get('/home',function(){
    return view('home');
});

Route::get('/register',function(){
    return view('/auth/register');
});
Route::get('/logout', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['namespace' => 'Admin','prefix' => 'admin'],function()
{
  Route::resource ('posts','PostsController');

});


Route::get('/home', 'HomeController@index')->name('login');
