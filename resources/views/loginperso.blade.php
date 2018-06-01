@extends('layouts.style')
<!DOCTYPE html>

<html>
<head>
<title>BA Nancy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

  <div class="w3-top">
    <div class="w3-bar" id="myNavbar">
      <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
        <i class="fa fa-bars"></i>
      </a>
      <a href="http://localhost/home" class="w3-bar-item w3-button">Accueil</a>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
      <a href="#" class="w3-bar-item w3-button">search</a>
    </div>
  </div>

<form action="http://localhost/login">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div>
  <div class="container">
    <label for="uname"><b>Utilisateur :</b></label>
    <input type="text" placeholder="Nom d'Utilisateur" name="name" required>

    <label for="psw"><b>Mot de passe :</b></label>
    <input type="password" placeholder="Mot de Passe" name="psw" required>

    <button type="submit">Se connecter</button>

  </div>
</form>
</body>
</html>
