

<?php $user = Auth::user();?>
<?php $actif = "$user->actif";?>
<?php if ($actif == 0): ?>
  <center><img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  <br><br><br><br><h2> Votre compte n'est pas actif, veuillez contacter l'administrateur du site ! </h2>
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
<title>Gestion des collectes</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>

@extends('layouts.navbar')

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div><br><br>

  <p><center><h6> Pour ajouter une collecte, veuillez remplir tous les champs ce-dessous et valider </h6></center></p>

  <form action="/ajoutcollecte" method="post">
    {{csrf_field() }}
  <div class="w3-row">
    <div class="container">
      <label for="uname"><b>Nom :</b></label>
      <input type="text" placeholder="Nom de la collecte" name="nom" required>

      <label for="uname"><b>Date de début :</b></label>
      <input type="date" placeholder="Date de début" name="datedebut" required>

      <label for="uname"><b>Date de fin :</b></label>
      <input type="date" placeholder="Date de fin" name="datefin" required>

      <label for="uname"><b>Poids palette :</b></label>
      <input type="text" placeholder="Poids d'une palette" name="poidspal" required>

      <label for="uname"><b>Poids grille :</b></label>
      <input type="text" placeholder="Poids d'une grille" name="poidsgrille" required>

      <p><center><button class="button button3" type="submit">Ajouter la collecte</button></center></p>

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
