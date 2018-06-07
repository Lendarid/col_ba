<?php

namespace App\Http\Controllers;

use App\Produit;
use DB;

class ProduitsController extends Controller
{
    public function liste()
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $produits = Produit::all()->where('Valider', '=', 0);

      return view('produits', [

        'produits' => $produits,
      ]);
    }

    public function accueil()
    {

      $produits = Produit::all();

      return view('/welcome', [

        'produits' => $produits,
      ]);
    }
    public function voir()
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        $id = request('id');

        $produit = Produit::where('id', $id)->first();

        return view('produit', [
            'produit' => $produit,
        ]);

        return $id;
    }

    public function consultation()
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        $nom = request('nom');

        $produit = Produit::where('Id_Collecte', $nom)->first();

        return view('view', [
            'produit' => $produit,
        ]);

        return $id;
    }

    public function delete($id)
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        DB::table('produits')->where('id',$id)->delete();

        return redirect('/produits');
    }

    public function update()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }

      DB::table('produits')->where('id','1')->update();

      return redirect('/produits');
    }
}
