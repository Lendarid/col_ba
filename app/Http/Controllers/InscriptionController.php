<?php

namespace App\Http\Controllers;

use App\Utilisateur;

class InscriptionController extends Controller
{
    public function formulaire()
    {
        return view('inscription');
    }
    public function traitement()
    {
      request()->validate([
          'pseudo' => ['required'],
          'email' => ['required','email'],
          'niveau' => ['required'],
          'password' => ['required','confirmed'],
          'password_confirmation' => ['required'],
      ]);

      $utilisateur = Utilisateur::create([

        'pseudo' => request('pseudo'),
        'email' => request('email'),
        'niveau' => request('niveau'),
        'mot_de_passe' => bcrypt(request('password')),
      ]);

      return redirect('/utilisateurs');


    }
}
