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

Route::get('/ajoutproduit', 'AjoutProduitController@formulaire');
Route::post('/ajoutproduit', 'AjoutProduitController@traitement');

Route::get('/ajoutcollecte', 'AjoutCollecteController@formulaire');
Route::post('/ajoutcollecte', 'AjoutCollecteController@traitement');

Route::get('/ajoutfournisseur', 'AjoutFournisseurController@formulaire');
Route::post('/ajoutfournisseur', 'AjoutFournisseurController@traitement');

Route::get('/connexion','ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');

Route::get('/deconnexion','CompteController@deconnexion');

Route::get('/fournisseurs', 'FournisseursController@liste');
Route::get('/fournisseurs-actif', 'FournisseursController@listeactif');
Route::get('/fournisseurs-inactif', 'FournisseursController@listeinactif');

Route::get('/utilisateurs', 'UtilisateursController@Liste');
Route::get('/collectes', 'CollectesController@liste');
Route::get('/produits', 'ProduitsController@liste');
Route::get('/consultation-collecte', 'CollectesController@listeconsultation');

Route::get('/consultation-collecte/{nom}','ProduitsController@ListeConsultationTotal');


Route::get('/produits/{id}','ProduitsController@Voir');
Route::get('/produits/update/{id}','ProduitsController@Update');
Route::get('/produits/delete/{id}','ProduitsController@Delete');

Route::get('/fournisseurs/{vif}','FournisseursController@Voir');
Route::get('/fournisseurs/update/{vif}','FournisseursController@Update');
Route::get('/fournisseurs/delete/{vif}','FournisseursController@Delete');

Route::get('/collectes/{nom}','CollectesController@Voir');
Route::get('/collectes/delete/{nom}','CollectesController@Delete');

Route::get('/utilisateurs/{pseudo}','UtilisateursController@Voir');
Route::get('/utilisateurs/delete/{pseudo}','UtilisateursController@Delete');
