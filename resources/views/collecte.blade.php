@if (Route::has('login')) <!-- Bouton Login / Logout -->
    <div class="top-right links">
        @if (Auth::check())
        <?php $user = Auth::user();?>
        <?php $actif = "$user->actif";?>
        <?php if ($actif == 0): ?>
          <center><img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
          <br><br><br><br><p> Votre compte n'est pas actif, veuillez contacter l'administrateur du site ! </p>
          <p><a href="/deconnexion" class="button buttonnovalidate">Se déconnecter</a></p></center>
          <?php return redirect(''); ?>
        <?php endif; ?>
        <!-- Fin de test de l'activité du compte de l'utilisateur -->

        <?php $user = Auth::user();?>
        <?php $niveau = "$user->niveau";?>
        <!-- Fin de test du niveau du compte de l'utilisateur -->

@extends('layouts.scripts')
@extends('layouts.style')
@extends('layouts.navbar')

<!DOCTYPE html>
<html>
<title>Gestion des collectes</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>



<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <h3 class="w3-center">
    <div class="imgcontainer">
      <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
    </div><br>

  <div class="w3-row">

    <table id="customers">
    <tr>
    <th>Nom</th>
    <th>Date de début</th>
    <th>Date de fin</th>
    <th>Poids Palette</th>
    <th>Poids Grille</th>
    </tr>
    <tr>
      <td>
          {{ $collecte->Nom }}
      </td>
      <td>
          {{ $collecte->DateDebut }}
      </td>
      <td>
          {{ $collecte->DateFin }}
      </td>
      <td>
          {{ $collecte->PoidsPal }}
      </td>
      <td>
          {{ $collecte->PoidsGrille }}
      </td>
    </tr>
    </table>
  </div>
</div>

<center><a href="/collectes" class="button button3">Retour</a>
<?php if ($niveau == 1): ?>
    <a href="/collectes/delete/{{$collecte->Nom}}" class="button button3">Supprimer</a></center>
<?php endif; ?>



<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
@else
     Vous n'êtes pas connecté !
@endif
</div>
@endif
