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
<title>Gestion des images</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>



<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div><br><br>

  <p><center><h6> Pour ajouter un logo, veuillez remplir tous les champs ce-dessous et valider </h6></center></p>

  <form action="/ajoutimage" method="post">
    {{csrf_field() }}
  <div class="w3-row">
    <div class="container">
      <label for="uname"><b>Nom :</b></label>
      <input type="text" placeholder="Nom du logo" name="nom" required>

      <label for="uname"><b>Lien :</b></label>
      <input type="text" placeholder="Lien du logo" name="lien" required>

      <p><center><button class="button button3" type="submit">Ajouter le logo</button></center></p>

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
