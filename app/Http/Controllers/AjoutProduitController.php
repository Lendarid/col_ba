<?php

namespace App\Http\Controllers;

use App\Produit;

class AjoutProduitController extends Controller
{
    public function formulaire()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      return view('ajoutproduit');
    }
    public function traitement()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      request()->validate([
          'id_fournisseur' => ['required'],
          'id_collecte' => ['required'],
          'poids' => ['required'],
          'nbpal' => ['required'],
          'nbgrille' => ['required'],
          'id_user' => ['required'],
          'valider' => ['required'],
          'creation' => ['required'],
      ]);

      $produit = Produit::create([

        'id_fournisseur' => request('id_fournisseur'),
        'id_collecte' => request('id_collecte'),
        'poids' => request('poids'),
        'nbpal' => request('nbpal'),
        'nbgrille' => request('nbgrille'),
        'id_user' => request('id_user'),
        'valider' => request('valider'),
        'creation' => request('creation'),
      ]);

      return redirect('/produits');


    }
}
