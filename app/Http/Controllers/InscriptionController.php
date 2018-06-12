<?php

namespace App\Http\Controllers;

use App\Utilisateur;

class InscriptionController extends Controller
{
    public function formulaire()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      return view('inscription');
    }
    public function traitement()
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }
      request()->validate([
          'pseudo' => ['required'],
          'email' => ['required','email'],
          'niveau' => ['required'],
          'actif' => ['required'],
          'password' => ['required','confirmed'],
          'password_confirmation' => ['required'],
      ]);

      $utilisateur = Utilisateur::create([

        'pseudo' => request('pseudo'),
        'email' => request('email'),
        'niveau' => request('niveau'),
        'actif' => request('actif'),
        'mot_de_passe' => bcrypt(request('password')),
      ]);

      return redirect('/utilisateurs');


    }
}
