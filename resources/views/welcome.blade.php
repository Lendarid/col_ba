@extends('layouts.style')
<!DOCTYPE html>
<html>
<title>BA Nancy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  @if (Route::has('login'))
      <div class="top-right links">
          @if (Auth::check())

          <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
              <i class="fa fa-bars"></i>
            </a>
            <a href="#home" class="w3-bar-item w3-button">Accueil</a>
            <a href="#collecte" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> Collecte</a>
            <a href="#info" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> Info</a>
              <a href="/connect" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">Panneau de gestion</a>
          </div>

          @else
          <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
              <i class="fa fa-bars"></i>
            </a>
            <a href="#home" class="w3-bar-item w3-button">Accueil</a>
            <a href="#collecte" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> Collecte</a>
            <a href="#info" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> Info</a>
              <a href="/connexion" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-green">Se connecter</a>
          </div>
          @endif
          </div>
          @endif

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#collecte" class="w3-bar-item w3-button" onclick="toggleFunction()">Collecte</a>
    <a href="#info" class="w3-bar-item w3-button" onclick="toggleFunction()">Info</a>
    <a href="#" class="w3-bar-item w3-button">SEARCH</a>
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="w3-row">
    <?php foreach ($collectes as $collecte): ?>
      <h3 class="w3-center">Collecte</h3>
      <p class="w3-center"><em>{{ $collecte->Nom }}</em></p>
      <div class="w3-row">
      <p><center>Début de la collecte : {{ $collecte->DateDebut }} -- Fin de la collecte : {{ $collecte->DateFin }} </center></p>
      </div> </div>
    <?php endforeach; ?>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Third Parallax Image with Portfolio Text -->
<div class="bgimg-3 w3-display-container w3-opacity-min">
  <div class="w3-display-middle">
     <span class="w3-xxlarge w3-text-white w3-wide">Info</span>
  </div>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="info">
  <h3 class="w3-center">Où sommes nous !</h3>

  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m4 w3-container">
      <!-- Add Google Maps -->
      <div id="googleMap" class="w3-round-large w3-greyscale" style="width:100%;height:400px;"></div>
    </div>
    <div class="w3-col m8 w3-panel">
      <div class="w3-large w3-margin-bottom">
        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Vandœuvre-lès-Nancy, France<br>
        <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Téléphone : 03 83 51 69 59<br>
        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: ba540@banquealimentaire.org<br>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Haut de page</a>
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
