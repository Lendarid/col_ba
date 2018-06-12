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

@extends('layouts.style')
<!DOCTYPE html>
<html>
<title>Total de la collecte</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>

@extends('layouts.navbar')

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
    <td>
      <p><a href="/produits/{{$produit->id}}" class="button button3">En savoir plus</a></p>
    </td>
    </tr>
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
<?php foreach ($produits as $produit):
$Somme += $produit->Poids ?>
<?php endforeach; ?>

<?php $Palette = 0; ?>
<?php foreach ($produits as $produit):
$Palette += $produit->NbPal ?>
<?php endforeach;
$TotalPalette = $Palette * $PoidsPalette;
?>

<?php $Grille = 0; ?>
<?php foreach ($produits as $produit):
$Grille += $produit->NbGrille ?>
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
        {{ $Somme }} Kg dont {{ $Palette }} palette(s) et {{ $Grille }} grille(s) = {{ $TotalPalette }} + {{ $TotalGrille }} + {{ $Somme }} = {{ $TotalFinal }} Kg
    </td>
    </tr>
</table>

    <p><a href="/ajoutproduit" class="button button3">Ajouter un produit</a></p>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>


<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(48.657087, 6.190892);
  var mapOptions= {
    center:myCenter,
    zoom:15.6, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
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
