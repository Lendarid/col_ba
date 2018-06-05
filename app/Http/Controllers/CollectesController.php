<?php

namespace App\Http\Controllers;

use App\collecte;
use DB;

class CollectesController extends Controller
{
    public function liste()
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $collectes = Collecte::all();

      return view('collectes', [

        'collectes' => $collectes,
      ]);
    }
    public function accueil()
    {

      $collectes = Collecte::all();

      return view('/welcome', [

        'collectes' => $collectes,
      ]);
    }
    public function voir()
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        $nom = request('nom');

        $collecte = Collecte::where('nom', $nom)->first();

        return view('collecte', [
            'collecte' => $collecte,
        ]);

        return $nom;
    }

    public function delete($nom)
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        DB::table('collectes')->where('nom',$nom)->delete();

        return redirect('/collectes');
    }
    public function update($nom)
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }

      DB::table('collectes')->where('nom',$nom)->update();

      return redirect('/collectes');
    }
}
