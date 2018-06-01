<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="/" class="w3-bar-item w3-button">Accueil</a>
    <a href="/utilisateurs" class="w3-bar-item w3-button w3-hide-small"> Utilisateurs</a>
    <?php $user = Auth::user();?>
    <a href="" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-green"><i class=""></i> <?php echo "$user->pseudo";?></a>
    <a href="/deconnexion" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red"><i class=""></i>Déconnexion</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#collecte" class="w3-bar-item w3-button" onclick="toggleFunction()">Collecte</a>

  </div>
</div>
