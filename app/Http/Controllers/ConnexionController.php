<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function formulaire()
    {
        return view('connexion');
    }
    public function traitement()
    {
        request()->validate([
            'pseudo' => ['required'],
            'password' => ['required'],
        ]);

        $resultat = auth()->attempt([
            'pseudo' => request('pseudo'),
            'password' => request('password'),
        ]);

        if($resultat)
        {
          return redirect('/connect');
        }

        return back()->withInput()->withErrors([
            'password' => 'Vos indentifiants sont incorrects',
        ]);
    }
}
