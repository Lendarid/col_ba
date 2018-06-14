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
<title>Gestion des fournisseurs</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>



<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div><br><br>

  <p><center><h6> Pour ajouter un fournisseur, veuillez remplir tous les champs ce-dessous et valider </h6></center></p>

  <form action="/ajoutfournisseur" method="post">
    {{csrf_field() }}
  <div class="w3-row">
    <div class="container">
      <label for="uname"><b>VIF :</b></label>
      <input type="text" placeholder="Code VIF du fournisseur" name="vif" required>

      <label for="uname"><b>Intitulé :</b></label>
      <input type="text" placeholder="Intitulé" name="intitule" required>

      <label for="uname"><b>Enseigne :</b></label>
      <input type="text" placeholder="Enseigne" name="enseigne" required>

      <label for="uname"><b>Ville :</b></label>
      <input type="text" placeholder="Ville de l'enseigne" name="ville" required>

      <label for="uname"><b>Code Postal :</b></label>
      <input type="text" placeholder="Code Postal de l'enseigne" name="codepostal" required>

      <label for="uname"><b>Libellé réduit :</b></label>
      <input type="text" placeholder="Libellé réduit" name="libellereduit" required>

      <label for="uname"><b>Activité du fournisseur :</b></label>
      <center><p><select name="actif" required>
        <option value="0">Désactivé</option>
      </select></p></center>

      <p><center><button class="button button3" type="submit">Ajouter le fournisseur</button></center></p>

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
