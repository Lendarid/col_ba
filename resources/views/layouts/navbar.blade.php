<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <li class="dropdown">
      <?php $user = Auth::user();?>
      <a href="javascript:void(0)" class="dropbtn"><?php echo "$user->pseudo";?></a>
      <div class="dropdown-content">

        <a href="/utilisateurs/{{$user->pseudo}}"><i class=""></i>Mon compte</a>
        <a href="/deconnexion"><i class=""></i>Déconnexion</a>
      </div>
    </li>
    <a href="/" class="w3-bar-item w3-button">Accueil</a>
    <a href="/utilisateurs" class="w3-bar-item w3-button w3-hide-small"> Utilisateurs</a>
    <a href="/collectes" class="w3-bar-item w3-button w3-hide-small"> Collectes</a>
    <a href="/fournisseurs" class="w3-bar-item w3-button w3-hide-small"> Fournisseurs</a>
    <a href="/produits" class="w3-bar-item w3-button w3-hide-small"> Validation</a>
    <a href="/consultation-collecte" class="w3-bar-item w3-button w3-hide-small"> Consultation</a>


  </div>


  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">


  </div>
</div>
@include('flash::message')
