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

Route::view('/','welcome');

Route::get('/connect','CompteController@accueil');

Route::get('/home',function(){
    return view('home');
});

Auth::routes();
Route::group(['namespace' => 'Admin','prefix' => 'admin'],function()
{
  Route::resource ('posts','PostsController');

});

Route::get('/home', 'HomeController@index')->name('login');

Route::get('/inscription', 'InscriptionController@formulaire');
Route::post('/inscription', 'InscriptionController@traitement');

Route::get('/utilisateurs', 'UtilisateursController@Liste');

Route::get('/connexion','ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');

Route::get('/deconnexion','CompteController@deconnexion');

Route::post('/modification','CompteController@modification');

Route::get('/{pseudo}','UtilisateursController@Voir');
