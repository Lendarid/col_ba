@if (Route::has('login')) <!-- Bouton Login / Logout -->
    <div class="top-right links">
        @if (Auth::check())
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
          <br><br><br><br><p> Votre compte ne possède pas les droits de visionner cette page, veuillez contacter l'administrateur du site ! </p>
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
<title>Gestion des utilisateurs</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>


<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="collecte">
  <h3 class="w3-center">
    <div class="imgcontainer">
      <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
    </div><br>

  <div class="w3-row">

    <table id="customers">
    <tr>
    <th>Pseudo</th>
    <th>Email</th>
    <th>Niveau</th>
    <th>Activité</th>
    </tr>
    <tr>
    <td>
        {{ $utilisateur->pseudo }}
    </td>
    <td>
        {{ $utilisateur->email }}
    </td>
    <td>
    <?php $niveau = "$utilisateur->niveau"; ?>
    <?php if ($niveau == 1): ?>
      Administrateur
    <?php endif; ?>
    <?php if ($niveau == 2): ?>
      Consultant
    <?php endif; ?>
    <?php if ($niveau == 3): ?>
      Visiteur
    <?php endif; ?>
    </td>
    <td>
    <?php $actif = "$utilisateur->actif"; ?>
    <?php if ($actif == 0): ?>
      <p><a href="/utilisateurs-inactif" class="button buttonnovalidate">Désactivé</a></p>
    <?php endif; ?>
    <?php if ($actif == 1): ?>
      <p><a href="/utilisateurs-actif" class="button buttonvalidate">Activé</a></p>
    <?php endif; ?>
    </td>
    </tr>
    </table>

  </div>
</div>

<center><p><a href="/utilisateurs" class="button button3">Retour</a>

  <?php $actif = "$utilisateur->actif"; ?>
  <?php if ($actif == 0): ?>
    <a href="/utilisateurs/activer/{{$utilisateur->id}}" class="button button3">Activer</a></p>
  <?php endif; ?>
  <?php if ($actif == 1): ?>
    <a href="/utilisateurs/desactiver/{{$utilisateur->id}}" class="button button3">Désactiver</a>
  <?php endif; ?>
    <a href="/utilisateurs/delete/{{$utilisateur->pseudo}}" class="button button3">Supprimer</a></p>

  <?php if ($niveau == 1): ?>
    <a href="/utilisateurs/consultant/{{$utilisateur->id}}" class="button button3">Modifier en consultant</a>
    <a href="/utilisateurs/visiteur/{{$utilisateur->id}}" class="button button3">Modifier en visiteur</a>
  <?php endif; ?>
  <?php if ($niveau == 2): ?>
    <a href="/utilisateurs/admin/{{$utilisateur->id}}" class="button button3">Modifier en administrateur</a>
    <a href="/utilisateurs/visiteur/{{$utilisateur->id}}" class="button button3">Modifier en visiteur</a>
  <?php endif; ?>
  <?php if ($niveau == 3): ?>
    <a href="/utilisateurs/admin/{{$utilisateur->id}}" class="button button3">Modifier en administrateur</a>
    <a href="/utilisateurs/consultant/{{$utilisateur->id}}" class="button button3">Modifier en consultant</a>
  <?php endif; ?>


</body>
</html>
@else
     Vous n'êtes pas connecté !
@endif
</div>
@endif
