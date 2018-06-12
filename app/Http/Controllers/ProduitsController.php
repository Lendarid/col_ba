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

      $produits = Produit::all();

      return view('produits', [

        'produits' => $produits,
      ]);
    }

    public function listeconsultation($nom)
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $produits = Produit::all()->where('ID_Collecte', '=', $nom);

      return view('produits', [

        'produits' => $produits,
      ]);
    }

    public function listeconsultationtotal($nom)
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $produits = Produit::all()->where('ID_Collecte', '=', $nom);

      return view('total', [

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

    public function update($id)
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }

      DB::table('produits')->where('id',$id)->update();
      return redirect('/produits');
    }
    public function desactiver($id)
    {
      $user = Produit::where('id',$id)->first();

      $user->valider = "0";

      $user->save();

      return redirect('/produits');
    }
    public function activer($id)
    {
      $user = Produit::where('id',$id)->first();

      $user->Valider = "1";

      $user->save();

      return redirect('/produits');
    }
}
