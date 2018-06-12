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
Route::group(['namespace' => 'Admin','prefix' => 'admin'],function()
{
  Route::resource ('posts','PostsController');
});


/*    PAGE D'ACCUEIL    */

//Page d'accueil
Route::view('/','welcome');
Route::get('/', 'CollectesController@accueil');
//Page d'accueil du membre connecté
Route::get('/connect','CompteController@accueil');


Route::get('/mon-compte','CompteController@MonCompte');
Route::post('/modification-mot-de-passe','CompteController@ModificationMotDePasse');

/*    UTILISATEURS    */

//Page qui affiche les utilisateurs
Route::get('/utilisateurs', 'UtilisateursController@Liste');
Route::get('/utilisateurs-actif', 'UtilisateursController@listeactif');
Route::get('/utilisateurs-inactif', 'UtilisateursController@listeinactif');
// Activer ou désactiver les utilisateurs
Route::get('/utilisateurs/desactiver/{id}', 'UtilisateursController@Desactiver');
Route::get('/utilisateurs/activer/{id}', 'UtilisateursController@Activer');
Route::get('/utilisateurs/admin/{id}', 'UtilisateursController@Admin');
Route::get('/utilisateurs/consultant/{id}', 'UtilisateursController@Consultant');
Route::get('/utilisateurs/visiteur/{id}', 'UtilisateursController@Visiteur');

//Suppression modification d'utilisateur'
Route::get('/utilisateurs/{pseudo}','UtilisateursController@Voir');
Route::get('/utilisateurs/delete/{pseudo}','UtilisateursController@Delete');

// Partie d'inscription
Route::get('/inscription', 'InscriptionController@formulaire');
Route::post('/inscription', 'InscriptionController@traitement');
//Page de connexion
Route::get('/connexion','ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');
//Page de deconnexion
Route::get('/deconnexion','CompteController@deconnexion');

/*    Fournisseurs    */

//Page des fournisseurs et fournisseurs(actif/inactif)
Route::get('/fournisseurs', 'FournisseursController@liste');
Route::get('/fournisseurs-actif', 'FournisseursController@listeactif');
Route::get('/fournisseurs-inactif', 'FournisseursController@listeinactif');
// Activer ou désactiver les Fournisseurs
Route::get('/fournisseurs/desactiver/{vif}', 'FournisseursController@Desactiver');
Route::get('/fournisseurs/activer/{vif}', 'FournisseursController@Activer');
//Suppression modification de fournisseur
Route::get('/fournisseurs/{vif}','FournisseursController@Voir');
Route::get('/fournisseurs/update/{vif}','FournisseursController@Update');
Route::get('/fournisseurs/delete/{vif}','FournisseursController@Delete');
//Page d'ajout de fournisseur
Route::get('/ajoutfournisseur', 'AjoutFournisseurController@formulaire');
Route::post('/ajoutfournisseur', 'AjoutFournisseurController@traitement');


/*    Collectes    */

//Page qui affiche les collectes
Route::get('/collectes', 'CollectesController@liste');
//Page qui affiche les infos sur la collecte selectionné
Route::get('/consultation-collecte', 'CollectesController@listeconsultation');
Route::get('/consultation-collecte/{nom}','ProduitsController@ListeConsultationTotal');
//Page d'ajout de collecte
Route::get('/ajoutcollecte', 'AjoutCollecteController@formulaire');
Route::post('/ajoutcollecte', 'AjoutCollecteController@traitement');
//Suppression modification de collecte
Route::get('/collectes/{nom}','CollectesController@Voir');
Route::get('/collectes/delete/{nom}','CollectesController@Delete');


/*   PRODUITS   */

//Page d'ajout de produit
Route::get('/ajoutproduit', 'AjoutProduitController@formulaire');
Route::post('/ajoutproduit', 'AjoutProduitController@traitement');
//Page qui affiche les produits
Route::get('/produits', 'ProduitsController@liste');
// Activer ou désactiver les produits
Route::get('/produits/desactiver/{id}', 'ProduitsController@Desactiver');
Route::get('/produits/activer/{id}', 'ProduitsController@Activer');
//Page qui affiche les infos sur le produit sélectionné
Route::get('/produits/{id}','ProduitsController@Voir');
//Suppression modification de produits
Route::get('/produits/update/{id}','ProduitsController@Update');
Route::get('/produits/delete/{id}','ProduitsController@Delete');

/*   IMAGES   */

//Page d'ajout de l'image
Route::get('/ajoutimage', 'AjoutImageController@formulaire');
Route::post('/ajoutimage', 'AjoutImageController@traitement');
//Page qui affiche les images
Route::get('/images', 'ImagesController@liste');
//Page qui affiche les infos sur l'image' sélectionné
Route::get('/images/{nom}','ImagesController@Voir');
//Suppression modification de l'image
Route::get('/images/delete/{nom}','ImagesController@Update');
Route::get('/images/delete/{nom}','ImagesController@Delete');
