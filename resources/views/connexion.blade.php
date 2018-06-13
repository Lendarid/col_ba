@extends('layouts.scripts')
@extends('layouts.style')
@extends('layouts.navbar')
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
    <a href="/" class="w3-bar-item w3-button">Accueil</a>

  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="/" class="w3-bar-item w3-button">Accueil</a>

  </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">

  <form action="/connexion" method="post">
    {{csrf_field() }}
    <div class="imgcontainer">
      <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
    </div><br>

    <center> @include('flash::message') </center>

  <div class="w3-row">
    <div class="container">
      <label for="uname"><b>Utilisateur :</b></label>
      <input type="text" placeholder="Nom d'Utilisateur" name="pseudo" required>

      <p><label for="psw"><b>Mot de passe :</b></label>
      <input type="password" placeholder="Mot de Passe" name="password" required>
      <?php if ($errors->has('password')): ?>
         <center><p> {{ $errors->first('password')}} </p></center>
      <?php endif; ?></p>

      <center><button class="button button3" type="submit">Se connecter</button></center>

    </div>
    </div>
  </form>
</div>


<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
