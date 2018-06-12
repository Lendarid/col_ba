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
<title>Mon compte</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>

@extends('layouts.navbar')

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div><br><br>

  <p><center><h6> Pour modifier votre compte, veuillez remplir tous les champs ce-dessous et valider </h6></center></p>

  <?php $user = Auth::user();
    $pseudo = $user->pseudo;

    $UTILISATEUR = DB::table('Utilisateurs')->where('pseudo','=',$pseudo)->get(); //Récupère les données de la table Fournisseur
    $arrUTILISATEUR = $UTILISATEUR->toArray(); //Les convertis en tableau de valeurs
  ?>

  <form action="/modification-mot-de-passe" method="post">
    {{csrf_field() }}
  <div class="w3-row">
    <div class="container">
      @foreach($arrUTILISATEUR as $utilisateur)

         <label for="pseudo"><b>Pseudo :</b></label>
         <input type="text" value="<?php echo $utilisateur->pseudo;?>" name="pseudo" required>
         <?php if ($errors->has('password')): ?>
            <center><p> {{ $errors->first('password')}} </p></center>
         <?php endif; ?>
      @endforeach

      <label for="psw"><b>Mot de passe :</b></label>
      <input type="password" placeholder="Mot de Passe" name="password" required>
      <?php if ($errors->has('password')): ?>
         <center><p> {{ $errors->first('password')}} </p></center>
      <?php endif; ?>

      <label for="psw"><b>Mot de passe (confirmation) :</b></label>
      <input type="password" placeholder="Mot de Passe" name="password_confirmation" required>
      <?php if ($errors->has('password_confirmation')): ?>
          {{ $errors->first('password_confirmation')}}
      <?php endif; ?>

      <p><center><button class="button button3" type="submit">Modifier mon compte</button></center></p>

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
