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
<title>BA Nancy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>

@extends('layouts.navbar')

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="imgcontainer">
    <br><br>
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div><br><br>

    <center>  @include('flash::message') </center>

  <?php $user = Auth::user();?>
  <h1 class="w3-center">Bienvenue <?php echo "$user->pseudo";?> !</h1>
  <p class="w3-center"><em>     </em></p>

  <div class="w3-row">
      <p><center>           </center></p>
      <br><br><br><br><br><br><br><br><br><br>
    </div>
</div>

<script>

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
