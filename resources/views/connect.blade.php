@extends('layouts.style')
@if (Route::has('login')) <!-- Bouton Login / Logout -->
    <div class="top-right links">
        @if (Auth::check())

<!DOCTYPE html>
<html>
<title>BA Nancy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="#home" class="w3-bar-item w3-button">Accueil</a>
    <a href="#collecte" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> Collecte</a>
    <a href="#info" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> Info</a>
    <a class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Déconnexion') }}
    </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#collecte" class="w3-bar-item w3-button" onclick="toggleFunction()">Collecte</a>
    <a href="#info" class="w3-bar-item w3-button" onclick="toggleFunction()">Info</a>
    <a href="#" class="w3-bar-item w3-button">SEARCH</a>
  </div>
</div>

<?php

?>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <?php $user = Auth::user();?>
  <h3 class="w3-center">Bienvenue <?php echo "$user->name";?> !</h3>
  <p class="w3-center"><em>Printemps 2018</em></p>

  <div class="w3-row">
      <p><center>Début de la collecte : 2018-04-27 -- Fin de la collecte : 2018-04-28 </center></p>
    </div>
</div>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="/" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Retour Accueil</a>
  </footer>

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
