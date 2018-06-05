@extends('layouts.style')
<!DOCTYPE html>
<html>
<title>Gestion des collectes</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>

@extends('layouts.navbar')

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div><br><br>

  <p><center><h6> Pour ajouter une collecte, veuillez remplir tous les champs ce-dessous et valider </h6></center></p>

  <form action="/inscription" method="post">
    {{csrf_field() }}
  <div class="w3-row">
    <div class="container">
      <label for="uname"><b>Nom :</b></label>
      <input type="text" placeholder="Nom de la collecte" name="nom" required>

      <label for="uname"><b>Poids palette :</b></label>
      <input type="text" placeholder="Poids d'une palette" name="poidspal" required>

      <label for="uname"><b>Poids grille :</b></label>
      <input type="text" placeholder="Poids d'une grille" name="poidsgrille" required>

      <p><center><button class="button button3" type="submit">Ajouter la collecte</button></center></p>

    </div>
    </div>
  </form>
</div>

<script>


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
