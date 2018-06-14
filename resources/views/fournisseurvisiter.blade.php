@extends('layouts.style')
@extends('layouts.scripts')

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
              <a href="/connect" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-orange">Panneau de gestion</a>
          </div>

          @else
          <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
              <i class="fa fa-bars"></i>
            </a>
            <a href="/" class="w3-bar-item w3-button">Accueil</a>
            <a href="#collecte" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> Collecte</a>
            <a href="#info" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> Info</a>
              <a href="/connexion" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-orange">Se connecter</a>
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
<br><br><br><br><div class="imgcontainer">
  <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
</div><br>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="w3-row">
    <table id="customers">
    <tr>
    <th>VIF</th>
    <th>Intitulé</th>
    <th>Enseigne</th>
    <th>Ville</th>
    <th>Code Postal</th>
    <th>Actif</th>
    </tr>
    <tr>
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
          {{ $fournisseur->Ville }}
      </td>
      <td>
          {{ $fournisseur->CodePostal }}
      </td>
      <td>
        <?php $actif = "$fournisseur->Actif"; ?>
        <?php if ($actif == 0): ?>
          <p><a href="#" class="button buttonnovalidate">Inactif</a></p>
        <?php endif; ?>
        <?php if ($actif == 1): ?>
          <p><a href="#" class="button buttonvalidate">Actif</a></p>
        <?php endif; ?>
      </td>
    </tr>
    </table>

    <?php $ID = "$fournisseur->Intitule"; ?>
    <?php
    // RECUPERATION
    $INFO = DB::table('Produits')->where('ID_Fournisseur','=',$ID)->orderBy('ID_Collecte')->get();
    $arrINFO = $INFO->toArray();
    ?>

    <br><br><br>
    <table id="customers">

    <tr>
    <th>Collecte</th>
    <th>Poids</th>
    <th>Nombre de palette(s)</th>
    <th>Nombre de grille(s)</th>
    </tr>
    @foreach($arrINFO as $INFO)
    <tr>
      <td>
          {{ $INFO->ID_Collecte }}
      </td>
      <td>
          {{ $INFO->Poids }}
      </td>
      <td>
          {{ $INFO->NbPal }}
      </td>
      <td>
          {{ $INFO->NbGrille }}
      </td>
    </tr>
      @endforeach
    </table>


</div> </div>


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



<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
