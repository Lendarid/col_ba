<?php

namespace App\Http\Controllers;

use App\utilisateur;

class UtilisateursController extends Controller
{
    public function liste()
    {
      $utilisateurs = Utilisateur::all();

      return view('utilisateurs', [

        'utilisateurs' => $utilisateurs,
      ]);
    }
    public function voir()
    {
        $pseudo = request('pseudo');

        $utilisateur = Utilisateur::where('pseudo', $pseudo)->first();

        return view('compte', [
            'utilisateur' => $utilisateur,
        ]);

        return $pseudo;
    }
}
