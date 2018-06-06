<?php

namespace App\Http\Controllers;

use App\Fournisseur;

class AjoutFournisseurController extends Controller
{
    public function formulaire()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      return view('ajoutfournisseur');
    }
    public function traitement()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      request()->validate([
          'vif' => ['required'],
          'intitule' => ['required'],
          'enseigne' => ['required'],
          'ville' => ['required'],
          'codepostal' => ['required'],
          'libellereduit' => ['required'],
          'actif' => ['required'],

      ]);

      $fournisseur = Fournisseur::create([

        'vif' => request('vif'),
        'intitule' => request('intitule'),
        'enseigne' => request('enseigne'),
        'ville' => request('ville'),
        'codepostal' => request('codepostal'),
        'libellereduit' => request('libellereduit'),
        'actif' => request('actif'),
      ]);

      return redirect('/fournisseurs');


    }
}
