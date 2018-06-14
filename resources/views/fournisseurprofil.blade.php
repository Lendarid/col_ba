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
        <?php if ($niveau == 3): ?>
          <center><img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
          <br><br><br><br><p> Votre compte ne possède pas les droits de visionner cette page, veuillez contacter l'administrateur du site ! </p>
          <p><a href="/connect" class="button buttonnovalidate">Accueil</a></p>
          <p><a href="/deconnexion" class="button buttonnovalidate">Se déconnecter</a></p></center>
          <?php return redirect(''); ?>
        <?php endif; ?>
        <!-- Fin de test du niveau du compte de l'utilisateur -->

@extends('layouts.scripts')
@extends('layouts.style')
@extends('layouts.navbar')

<!DOCTYPE html>
<html>
<title>Gestion des fournisseurs</title>
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
    <th>VIF</th>
    <th>Intitulé</th>
    <th>Enseigne</th>
    <th>Ville</th>
    <th>Code Postal</th>
    <th>Actif</th>
    </tr>
    <tr>
      <td>
          {{ $fournisseur->VIF }}
      </td>
      <td>
          {{ $fournisseur->Intitule }}
      </td>
      <td>
          {{ $fournisseur->Enseigne }}
      </td>
      <td>
          {{ $fournisseur->Ville }}
      </td>
      <td>
          {{ $fournisseur->CodePostal }}
      </td>
      <td>
        <?php $actif = "$fournisseur->Actif"; ?>
        <?php if ($actif == 0): ?>
          <p><a href="/fournisseurs-inactif" class="button buttonnovalidate">Inactif</a></p>
        <?php endif; ?>
        <?php if ($actif == 1): ?>
          <p><a href="/fournisseurs-actif" class="button buttonvalidate">Actif</a></p>
        <?php endif; ?>
      </td>
    </tr>
    </table>

  </div>
</div>

<center><a href="/fournisseurs" class="button button3">Retour</a>

<?php if ($niveau == 1): ?>

  <?php $actif = "$fournisseur->Actif"; ?>
  <?php if ($actif == 0): ?>
    <a href="/fournisseurs/activer/{{$fournisseur->VIF}}" class="button button3">Activer</a>
  <?php endif; ?>
  <?php if ($actif == 1): ?>
    <a href="/fournisseurs/desactiver/{{$fournisseur->VIF}}" class="button button3">Désactiver</a>
  <?php endif; ?>
  <a href="/fournisseurs/delete/{{$fournisseur->VIF}}" class="button button3">Supprimer</a></center>
<?php endif; ?>

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
