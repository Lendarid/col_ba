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
    <th></th>
    <th>VIF</th>
    <th>Intitule</th>
    <th>Enseigne</th>
    <th>Activité</th>
    </tr>
    <?php foreach ($fournisseurs as $fournisseur): ?>
    <tr>
    <td>
    <?php $nom = "$fournisseur->Enseigne"; ?>
    <?php
      $LOGO = DB::table('Images')->where('nom','=',$nom)->get(); //Récupère les données de la table Fournisseur
      $arrLOGO = $LOGO->toArray(); //Les convertis en tableau de valeurs
    ?>
    @foreach($arrLOGO as $logo)
      <img src="<?php echo $logo->lien;?>" height="100" width="100" alt="Avatar" class="img">
    @endforeach
    </td>
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
    <?php $actif = "$fournisseur->Actif"; ?>
    <?php if ($actif == 0): ?>
      <p><a href="/fournisseurs-inactif" class="button buttonnovalidate">Inactif</a></p>
    <?php endif; ?>
    <?php if ($actif == 1): ?>
      <p><a href="/fournisseurs-actif" class="button buttonvalidate">Actif</a></p>
    <?php endif; ?>
    </td>
    <td>
      <p><a href="/fournisseurs/{{$fournisseur->VIF}}" class="button button3">En savoir plus</a></p>
    </td>
    </tr>
    <?php endforeach; ?>

</table>
    <p><a href="/ajoutfournisseur" class="button button3">Ajouter un fournisseur</a></p>
    <p><a href="/images" class="button button3">Gérer les logos</a></p>
    <p><a href="/fournisseurs-actif" class="button button3">Les fournisseurs actifs</a>
    <a href="/fournisseurs-inactif" class="button button3">Les fournisseurs inactifs</a></p>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>

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
