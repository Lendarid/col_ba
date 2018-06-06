<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use DB;

class FournisseursController extends Controller
{
    public function liste()
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $fournisseurs = Fournisseur::all();

      return view('fournisseurs', [

        'fournisseurs' => $fournisseurs,
      ]);
    }
    public function accueil()
    {

      $fournisseurs = Fournisseur::all();

      return view('/welcome', [

        'fournisseurs' => $fournisseurs,
      ]);
    }
    public function voir()
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        $vif = request('vif');

        $fournisseur = Fournisseur::where('vif', $vif)->first();

        return view('fournisseur', [
            'fournisseur' => $fournisseur,
        ]);

        return $vif;
    }

    public function delete($vif)
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        DB::table('fournisseurs')->where('vif',$vif)->delete();

        return redirect('/fournisseurs');
    }
    public function update($vif)
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }

      DB::table('fournisseurs')->where('vif',$vif)->update();

      return redirect('/fournisseurs');
    }
}
