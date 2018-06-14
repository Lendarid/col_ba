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
<title>Total de la collecte</title>
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
    <th>Fournisseur</th>
    <th>Collecte</th>
    <th>Poids</th>
    </tr>
    <?php foreach ($produits as $produit): ?>
      <?php $actif = "$produit->Valider"; ?>
      <?php if ($actif == 1): ?>
    <tr>
    <td>
        {{ $produit->ID_Fournisseur }}
    </td>
    <td>
        <?php $Nom = $produit->ID_Collecte; ?>{{ $produit->ID_Collecte }}
    </td>
    <td>
        {{ $produit->Poids }}
    </td>
    <?php if ($niveau == 2 | $niveau == 1): ?>
      <td>
          <p><a href="/produits/{{$produit->id}}" class="button button3">En savoir plus</a></p>
        </td>
    <?php endif; ?>
    </tr>
    <?php endif; ?>
    <?php endforeach; ?>
</table>

<?php
// RECUPERATION DU POIDS D'UNE PALETTE DANS LA COLLECTE
$PAL = DB::table('Collectes')->where('Nom','=',$Nom)->get();
$arrPAL = $PAL->toArray();
?>
@foreach($arrPAL as $pal)
   <?php  $PoidsPalette = $pal->PoidsPal; ?>
@endforeach

<?php
// RECUPERATION DU POIDS D'UNE GRILLE DANS LA COLLECTE
$GRILLE = DB::table('Collectes')->where('Nom','=',$Nom)->get();
$arrGRILLE = $GRILLE->toArray();
?>
@foreach($arrGRILLE as $grille)
   <?php  $PoidsGrille = $grille->PoidsGrille; ?>
@endforeach

<?php $Somme = 0; ?>
<?php foreach ($produits as $produit): ?>
  <?php $actif = "$produit->Valider"; ?>
  <?php if ($actif == 1):
    $Somme += $produit->Poids ?>
  <?php endif; ?>
<?php endforeach; ?>

<?php $Palette = 0; ?>
<?php foreach ($produits as $produit): ?>
  <?php $actif = "$produit->Valider"; ?>
  <?php if ($actif == 1):
    $Palette += $produit->NbPal ?>
  <?php endif; ?>
<?php endforeach;
$TotalPalette = $Palette * $PoidsPalette;
?>

<?php $Grille = 0; ?>
<?php foreach ($produits as $produit):?>
  <?php $actif = "$produit->Valider"; ?>
  <?php if ($actif == 1):
    $Grille += $produit->NbGrille ?>
  <?php endif; ?>
<?php endforeach;
$TotalGrille = $Grille * $PoidsGrille;?>

<?php $TotalFinal = $Somme - $TotalPalette - $TotalGrille ;?>

<br>
<table id="customers">
    <tr>
    <th>Total</th>
    </tr>
    <tr>
    <td>
        {{ $Somme }} Kg dont {{ $Palette }} palette(s) et {{ $Grille }} grille(s) = {{ $Somme }} - ( {{ $TotalPalette }} + {{ $TotalGrille }} ) = {{ $TotalFinal }} Kg
    </td>
    </tr>
</table>
<?php if ($niveau == 1): ?>
    <p><a href="/ajoutproduit" class="button button3">Ajouter un produit</a></p>
<?php endif; ?>

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
