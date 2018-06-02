<?php

namespace App\Http\Controllers;

use App\utilisateur;
use DB;

class UtilisateursController extends Controller
{
    public function liste()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }

      $utilisateurs = Utilisateur::all();

      return view('utilisateurs', [

        'utilisateurs' => $utilisateurs,
      ]);
    }
    public function voir()
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        $pseudo = request('pseudo');

        $utilisateur = Utilisateur::where('pseudo', $pseudo)->first();

        return view('compte', [
            'utilisateur' => $utilisateur,
        ]);

        return $pseudo;
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
