<!DOCTYPE html>
<html>
<head>
<title>BA Nancy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
}

/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
    background-image: url('https://lions-evry.myassoc.org/img/Lions_E2uYP6mbNv79/1454_6d6daff2f/medias/large-f18c98d27a1f7081b36589b4a8e299e6.gif');
    min-height: 70%;
}

/* Second image (Portfolio) */
.bgimg-2 {
    background-image: url("/w3images/parallax2.jpg");
    min-height: 400px;
}

/* Third image (Contact) */
.bgimg-3 {
    background-image: url("/w3images/parallax3.jpg");
    min-height: 400px;
}

.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
b{
  margin: 5px 0% 5px 30%;
}


/* Full-width inputs */
input[type=text], input[type=password] {
    width:40%;
    padding: 12px 20px;
    margin: 8px 30% 2px 30%;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    width:40%;
    padding: 14px 20px;
    margin: 8px 30% 2px 30%;
    border: none;
    cursor: pointer;

}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 40%;
    border-radius: 50%;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
  @media only screen and (max-device-width: 1024px) {
      .bgimg-1, .bgimg-2, .bgimg-3
       {
          background-attachment: scroll;
      }
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
}
</style>
</head>
<body>

  <div class="w3-top">
    <div class="w3-bar" id="myNavbar">
      <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
        <i class="fa fa-bars"></i>
      </a>
      <a href="http://localhost/home" class="w3-bar-item w3-button">Accueil</a>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
      <a href="#" class="w3-bar-item w3-button">search</a>
    </div>
  </div>

<form action="http://localhost/login">
  <div class="imgcontainer">
    <img src="https://www.banquealimentaire.org/sites/all/themes/custom/ffba/images/ffba_logo.png" alt="Avatar" class="img">
  </div>
  <div class="container">
    <label for="uname"><b>Utilisateur :</b></label>
    <input type="text" placeholder="Nom d'Utilisateur" name="name" required>

    <label for="psw"><b>Mot de passe :</b></label>
    <input type="password" placeholder="Mot de Passe" name="psw" required>

    <button type="submit">Se connecter</button>

  </div>
</form>
</body>
</html>
