<?php $user = Auth::user();?>
<?php $actif = "$user->actif";?>
<?php if ($actif == 0): ?>
  <center><img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  <br><br><br><br><p> Votre compte n'est pas actif, veuillez contacter l'administrateur du site ! </p>
  <p><a href="/deconnexion" class="button buttonnovalidate">Se déconnecter</a></p></center>
  <?php return redirect(''); ?>
<?php endif; ?>
<!-- Fin de test de l'activité du compte de l'utilisateur -->

@extends('layouts.scripts')
@extends('layouts.style')
@extends('layouts.navbar')

<!DOCTYPE html>
<html>
<title>Gestion des produits</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>


<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div><br><br>

  <p><center><h6> Pour ajouter un produit, veuillez remplir tous les champs ce-dessous et valider </h6></center></p>

  <form action="/ajoutproduit" method="post">
    {{csrf_field() }}
  <div class="w3-row">
    <div class="container">

<?php
  $FOURN = DB::table('Fournisseurs')->where('Actif','=',1)->orderBy('Intitule')->get(); //Récupère les données de la table Fournisseur
  $arrFOURN = $FOURN->toArray(); //Les convertis en tableau de valeurs
  $COLL = DB::table('Collectes')->orderBy('datedebut')->get(); //Récupère les données de la table COllecte
  $arrCOLL = $COLL->toArray(); //Les convertis en tableau de valeurs
  $USER = DB::table('Utilisateurs')->orderBy('pseudo')->get(); //Récupère les données de la table utilisateurs
  $arrUSER = $USER->toArray(); //Les convertis en tableau de valeurs

  $user = Auth::user();

?>



      <label for="uname"><b>Fournisseur :</b></label>
      <center><p><select name="id_fournisseur" required>
        @foreach($arrFOURN as $fourn)
			     <option value="<?php echo $fourn->Intitule;?>"><?php echo $fourn->Intitule;?></option>
        @endforeach
      </select></p></center>

      <label for="uname"><b>Collecte :</b></label>
      <center><p><select name="id_collecte" required>
        @foreach($arrCOLL as $coll)
			     <option value="<?php echo $coll->Nom;?>"><?php echo $coll->Nom;?></option>
        @endforeach
      </select></p></center>

      <label for="uname"><b>Poids :</b></label>
      <input type="text" placeholder="Poids" name="poids" required>

      <label for="uname"><b>Nombre palette :</b></label>
      <input type="text" placeholder="Nb Pal" name="nbpal" required>

      <label for="uname"><b>Nombre grille :</b></label>
      <input type="text" placeholder="Nb Grille" name="nbgrille" required>

      <input type='hidden' name='creation' id='timestamp' value='<?php echo date("Y-m-d G:H:s"); ?>' />

      <input type="hidden" name="id_user" value="<?php echo "$user->pseudo";?>" />

      <label for="uname"><b>Activité :</b></label>
      <center><p><select name="valider" required>
        <option value="0">Désactivé</option>
      </select></p></center>

      <p><center><button class="button button3" type="submit">Ajouter le produit</button></center></p>

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
