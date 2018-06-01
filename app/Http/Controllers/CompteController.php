<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function accueil()
    {
        if(Auth()->guest())
        {
            return redirect('/connexion')->withErrors([
                'password' => 'Vous devez être connecté pour voir cette page',
            ]);
        }

        return view('connect');
    }
    public function deconnexion()
    {

      auth()->logout();
      return redirect('/');
    }
}
