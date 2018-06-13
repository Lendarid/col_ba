<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: grey;
    text-align: center;
    padding: 8px 16px;
    text-decoration: none;
    width: 150px;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #EE801C;
    color: black;
}

li.dropdown {
    display: inline-block;
    float: right;
}


.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    float: right;

}

.dropdown-content a {
    color: grey;
    padding: auto;
    text-decoration: none;
    display: block;
    text-align: center;
}
.opaque-navbar {
    background-color: rgba(0,0,0,0);
    height: 60px;
    border-bottom: 0px;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

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
select {
    width: 40%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #EE801C;
    color: white;
}

/* First image (Logo. Full height) */
.bgimg-1 {
    background-image: url('http://1.bp.blogspot.com/-R_XYQOl4vjo/VIA5Z52965I/AAAAAAAAF8Y/78253JYa6ik/s1600/Banque-alimentaire.png');
    min-height: 100%;
    background-size :45%;
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
input[type=text], input[type=date], input[type=password] {
    width:40%;
    padding: 12px 20px;
    margin: 8px 30% 2px 30%;
    display: inline-block;
    border: 1px solid orange;
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
    opacity: 0.8s;
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
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white;
    color: black;
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}

.button2 {
    background-color: white;
    color: black;
    border: 2px solid green;
}

.button2:hover {
    background-color: green;
    color: white;
}

.buttonvalidate {
    background-color: white;
    color: black;
    border: 2px solid green;
}

.buttonnovalidate:hover {
    background-color: red;
    color: white;
}

.buttonnovalidate {
    background-color: white;
    color: black;
    border: 2px solid red;
}

.buttonvalidate:hover {
    background-color: green;
    color: white;
}

.button3 {
    background-color: white;
    color: black;
    border: 2px solid #EE801C;
}

.button3:hover {
    background-color: #EE801C;
    color: white;
}

.button4 {
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
}


/* Change styles for span and cancel button on extra small screens */
/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
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
