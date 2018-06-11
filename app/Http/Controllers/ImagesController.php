<?php

namespace App\Http\Controllers;

use App\Image;
use DB;

class ImagesController extends Controller
{
    public function liste()
    {
      if(Auth()->guest())
      {
        flash('Vous devez être connecté pour voir cette page')->error();

        return redirect('/connexion');
      }

      $images = Image::all();

      return view('images', [

        'images' => $images,
      ]);
    }
    public function voir()
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        $nom = request('nom');

        $image = Image::where('nom', $nom)->first();

        return view('image', [
            'image' => $image,
        ]);

        return $nom;
    }

    public function delete($nom)
    {
        if(Auth()->guest())
        {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
        }

        DB::table('images')->where('nom',$nom)->delete();

        return redirect('/images');
    }
    public function update($nom)
    {
      if(Auth()->guest())
      {
          flash('Vous devez être connecté pour voir cette page')->error();

          return redirect('/connexion');
      }


      return redirect('/images');
    }
}
