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
<title>Gestion des fournisseurs inactifs</title>
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
    <p><center><a href="/fournisseurs" class="button button3">Retour</a>
    <a href="/ajoutfournisseur" class="button button3">Ajouter un fournisseur</a></center></p>
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
