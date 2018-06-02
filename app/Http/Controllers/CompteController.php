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
    public function deconnexion()
    {

      auth()->logout();
      return redirect('/');
    }

}
