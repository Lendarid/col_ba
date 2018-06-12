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
    public function listeactif()
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $utilisateurs = Utilisateur::all()->where('actif', '=', 1);

      return view('utilisateurs-actif', [

        'utilisateurs' => $utilisateurs,
      ]);
    }
    public function listeinactif()
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $utilisateurs = Utilisateur::all()->where('actif', '=', 0);

      return view('utilisateurs-inactif', [

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
    public function update($pseudo, $email)
    {
      $user = Utilisateur::where('pseudo',$pseudo)->first();

      $user->email = $email;

      $user->save();
    }
    public function desactiver($id)
    {
      $user = Utilisateur::where('id',$id)->first();

      $user->actif = "0";

      $user->save();

      return redirect('/utilisateurs');
    }
    public function activer($id)
    {
      $user = Utilisateur::where('id',$id)->first();

      $user->actif = "1";

      $user->save();

      return redirect('/utilisateurs');
    }
    public function admin($id)
    {
      $user = Utilisateur::where('id',$id)->first();

      $user->niveau = "1";

      $user->save();

      return redirect('/utilisateurs');
    }
    public function consultant($id)
    {
      $user = Utilisateur::where('id',$id)->first();

      $user->niveau = "2";

      $user->save();

      return redirect('/utilisateurs');
    }
    public function visiteur($id)
    {
      $user = Utilisateur::where('id',$id)->first();

      $user->niveau = "3";

      $user->save();

      return redirect('/utilisateurs');
    }
}
