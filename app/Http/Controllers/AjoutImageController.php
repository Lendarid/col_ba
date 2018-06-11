<?php

namespace App\Http\Controllers;

use App\Image;

class AjoutImageController extends Controller
{
    public function formulaire()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      return view('ajoutimage');
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
          'lien' => ['required'],
      ]);

      $image = Image::create([

        'nom' => request('nom'),
        'lien' => request('lien'),
      ]);

      return redirect('/images');


    }
}
