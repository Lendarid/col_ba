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
    </tr>
    <?php foreach ($collectes as $collecte): ?>
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
      <p><a href="/collectes/{{$collecte->Nom}}" class="button button3">En savoir plus</a></p>
    </td>
    </tr>
    <?php endforeach; ?>

</table>
    <p><a href="/ajoutcollecte" class="button button3">Ajouter une collecte</a></p>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>


<!-- Add Google Maps -->
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
