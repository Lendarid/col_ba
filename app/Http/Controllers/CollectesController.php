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

    public function delete($pseudo)
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        DB::table('utilisateurs')->where('pseudo',$pseudo)->delete();

        return redirect('/utilisateurs');
    }
    public function update($pseudo)
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }

      DB::table('utilisateurs')->where('pseudo',$pseudo)->update();

      return redirect('/utilisateurs');
    }
}
