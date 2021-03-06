@extends('layouts.style')
@extends('layouts.scripts')

<!DOCTYPE html>
<html>
<title>BA Nancy</title>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="60" > 
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
            <a href="#home" class="w3-bar-item w3-button">Accueil</a>
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

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="w3-row">
      <h1 class="w3-center">Notre Dernière Collecte</h1>
      <br>


        <?php
        // RECUPERATION DU POIDS D'UNE PALETTE ET GRILLE DANS LA COLLECTE
        $COLLECTE = DB::table('Collectes')->orderBy('DateDebut', 'desc')->pluck('ID')->first(); //Récupère l'ID de la collecte avec la date la plus lointaine
				$col = DB::table('Collectes')->orderBy('DateDebut', 'desc')->first();
        ?>

           <?php  $PoidsPalette = $col->PoidsPal;
                  $PoidsGrille = $col->PoidsGrille;
                  $NomCollecte = $col->Nom; ?>

        <?php
        // RECUPERATION DES PRODUITS
        $PRO = DB::table('Produits')->where('ID_Collecte','=',$NomCollecte)->get();
        $arrPRO = $PRO->toArray();
        ?>

        <?php
        $Palette = 0;
        $Grille = 0;
        $Somme = 0;
        ?>
        @foreach($arrPRO as $pro)
          <?php $actif = "$pro->Valider";
          if ($actif == 1):
            $Palette += $pro->NbPal;
          endif; ?>

          <?php if ($actif == 1):
            $Grille += $pro->NbGrille;
          endif; ?>

          <?php if ($actif == 1):
            $Somme += $pro->Poids;
          endif; ?>
        @endforeach

        <?php
        $TotalAutres = 0;
        $Total = 0;
        $TotalAutres = ($PoidsPalette * $Palette) + ($PoidsGrille * $Grille);

        $Total = $Somme - $TotalAutres;
        ?>
        <h3 class="w3-center"><span style="text-decoration: underline;"><em><?php echo $col->Nom; ?></em><span></h3>
        <div class="w3-row">
        <h4>
        <center>
        Début de la collecte : <?php echo $col->DateDebut; ?>
        &emsp;&emsp;&emsp;
        Fin de la collecte : <?php echo $col->DateFin; ?>
        &emsp;&emsp;&emsp;
        <br>

        Nombre de palette(s) : <?php echo $Palette; ?>
        &emsp;&emsp;&emsp;
        Nombre de grille(s) : <?php echo $Grille; ?>
        <br>
        <b><center> Poids des denrées : <?php echo $Total; ?> Kg </center></b>
       </center>
     </h4>

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

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="info">
  <h3 class="w3-center">Où sommes nous !</h3>

  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m4 w3-container">
      <!-- Add Google Maps -->
      <iframe id="googleMap" class="w3-round-large w3-greyscale" style="width:100%;height:400px;"src="https://www.google.com/maps/d/embed?mid=1J9RA9XD0hXvwIwTup6Ek5qalaFxJQIEH" width="800" height="600"></iframe>

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

<footer class="w3-center w3-black w3-padding-32 w3-container w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Haut de page</a>
  </footer>


</body>
</html>
