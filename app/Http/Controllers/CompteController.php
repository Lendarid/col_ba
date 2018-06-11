<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function accueil()
    {
        if(Auth()->guest())
        {
            flash('Vous devez être connecté pour voir cette page')->error();

            return redirect('/connexion');
        }

        return view('connect');
    }
    public function moncompte()
    {
        if(Auth()->guest())
        {
            flash('Vous devez être connecté pour voir cette page')->error();

            return redirect('/connexion');
        }

        return view('mon-compte');
    }
    public function deconnexion()
    {

      auth()->logout();
      return redirect('/');
    }
    public function ModificationMotDePasse()
    {
        if(Auth()->guest())
        {
            flash('Vous devez être connecté pour voir cette page')->error();

            return redirect('/connexion');
        }

        request()->validate([
            'pseudo' => ['required'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required'],
        ]);

        $utilisateur = auth()->user();
        $utilisateur->mot_de_passe = bcrypt(request('password'));
        $utilisateur->pseudo = request('pseudo');
        $utilisateur->save();
        $utilisateur->update();

        return view('connect');
    }

}
