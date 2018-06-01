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
}
