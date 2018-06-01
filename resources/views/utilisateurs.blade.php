@if (Route::has('login')) <!-- Bouton Login / Logout -->
    <div class="top-right links">
        @if (Auth::check())

@extends('layouts.style')
<!DOCTYPE html>
<html>
<title>Gestion des utilisateurs</title>
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
    <th>ID</th>
    <th>Pseudo</th>
    <th>Email</th>
    <th>Niveau</th>
    </tr>
    <?php foreach ($utilisateurs as $utilisateur): ?>
    <tr>
    <td>

        {{ $utilisateur->id }}
    </td>
    <td>
        {{ $utilisateur->pseudo }}
    </td>
    <td>
        {{ $utilisateur->email }}
    </td>
    <td>
        {{ $utilisateur->niveau }}
    </td>
    </tr>
    <?php endforeach; ?>

</table>
    <p><a href="/inscription" class="button button3">Ajouter un utilisateur</a></p>
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
