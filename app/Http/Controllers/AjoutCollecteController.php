<?php

namespace App\Http\Controllers;

use App\Collecte;

class AjoutCollecteController extends Controller
{
    public function formulaire()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      return view('ajoutcollecte');
    }
    public function traitement()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      request()->validate([
          'nom' => ['required'],
          'datedebut' => ['required'],
          'datefin' => ['required'],
          'poidspal' => ['required'],
          'poidsgrille' => ['required'],
      ]);

      $collecte = Collecte::create([

        'nom' => request('nom'),
        'datedebut' => request('datedebut'),
        'datefin' => request('datefin'),
        'poidspal' => request('poidspal'),
        'poidsgrille' => request('poidsgrille'),
      ]);

      return redirect('/collectes');


    }
}
