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
    public function listeactif()
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $fournisseurs = Fournisseur::all()->where('Actif', '=', 1);

      return view('fournisseurs-actif', [

        'fournisseurs' => $fournisseurs,
      ]);
    }
    public function listeinactif()
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $fournisseurs = Fournisseur::all()->where('Actif', '=', 0);

      return view('fournisseurs-inactif', [

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

        return view('fournisseurprofil', [
            'fournisseur' => $fournisseur,
        ]);

        return $vif;
    }

    public function voirvisiter()
    {

        $vif = request('vif');

        $fournisseur = Fournisseur::where('vif', $vif)->first();

        return view('fournisseurvisiter', [
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
    public function desactiver($vif)
    {
      $user = Fournisseur::where('vif',$vif)->first();

      $user->actif = "0";

      $user->save();

      return redirect('/fournisseurs');
    }
    public function activer($vif)
    {
      $user = Fournisseur::where('vif',$vif)->first();

      $user->actif = "1";

      $user->save();

      return redirect('/fournisseurs');
    }
}
