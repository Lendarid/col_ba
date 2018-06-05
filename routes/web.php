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
Route::get('/', 'CollectesController@accueil');

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

// Partie d'inscription
Route::get('/inscription', 'InscriptionController@formulaire');
Route::post('/inscription', 'InscriptionController@traitement');

Route::get('/ajoutcollecte', 'AjoutCollecteController@formulaire');
Route::post('/ajoutcollecte', 'AjoutCollecteController@traitement');

// Partie utilisateurs
Route::get('/utilisateurs', 'UtilisateursController@Liste');


Route::get('/connexion','ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');

Route::get('/deconnexion','CompteController@deconnexion');

Route::get('/collectes', 'CollectesController@liste');

Route::get('/collectes/{nom}','CollectesController@Voir');
Route::get('/collectes/delete/{nom}','CollectesController@Delete');

Route::get('/utilisateurs/{pseudo}','UtilisateursController@Voir');
Route::get('/utilisateurs/delete/{pseudo}','UtilisateursController@Delete');
