<?php $user = Auth::user();?>
<?php $actif = "$user->actif";?>
<?php if ($actif == 0): ?>
  <center><img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  <br><br><br><br><p> Votre compte n'est pas actif, veuillez contacter l'administrateur du site ! </p>
  <p><a href="/deconnexion" class="button buttonnovalidate">Se déconnecter</a></p></center>
  <?php return redirect(''); ?>
<?php endif; ?>
<!-- Fin de test de l'activité du compte de l'utilisateur -->

<?php $user = Auth::user();?>
<?php $niveau = "$user->niveau";?>
<?php if ($niveau == 2 || $niveau == 3): ?>
  <center><img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  <br><br><br><br><h3 class="w3-center w3-grayscale w3-xlarge"> Votre compte ne possède pas les droits de visionner cette page, veuillez contacter l'administrateur du site ! </h3>
  <p><a href="/connect" class="button buttonnovalidate">Accueil</a></p>
  <p><a href="/deconnexion" class="button buttonnovalidate">Se déconnecter</a></p></center>
  <?php return redirect(''); ?>
<?php endif; ?>
<!-- Fin de test du niveau du compte de l'utilisateur -->

@extends('layouts.scripts')
@extends('layouts.style')
@extends('layouts.navbar')

<!DOCTYPE html>
<html>
<title>BA Nancy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>


<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div><br><br>

  <p><center><h6> Pour ajouter un utilisateur, veuillez remplir tous les champs ce-dessous et valider </h6></center></p>

  <form action="/inscription" method="post">
    {{csrf_field() }}
  <div class="w3-row">
    <div class="container">
      <label for="uname"><b>Utilisateur :</b></label>
      <input type="text" placeholder="Nom d'Utilisateur" name="pseudo" required>

      <label for="uname"><b>Email :</b></label>
      <input type="text" placeholder="Email" name="email" required>

      <label for="uname"><b>Niveau :</b></label>
      <center><p><select name="niveau" required>
        <option value="1">Administrateur</option>
        <option value="2">Consultant</option>
        <option value="3">Visiteur</option>
      </select></p></center>

      <label for="uname"><b>Activité :</b></label>
      <center><p><select name="actif" required>
        <option value="0">Désactivé</option>
      </select></p></center>

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

      <p><center><button class="button button3" type="submit">Ajouter l'utilisateur</button></center></p>

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
