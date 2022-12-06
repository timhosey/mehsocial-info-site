<?php require_once('functions.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>meh.social info</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
</head>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <a href='https://meh.social'><img src="https://meh.social/system/site_uploads/files/000/000/002/original/30021af0f9401d61.png" style="width:100%" alt="meh social mascot by @jankhambrams@meh.social" /></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>home</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-question w3-xxlarge"></i>
    <p>about</p>
  </a>
  <a href="#stats" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-chart-simple w3-xxlarge"></i>
    <p>stats</p>
  </a>
  <a href="#moderation" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>moderation</p>
  </a>
  <a href="#support" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-mug-hot w3-xxlarge"></i>
    <p>support meh</p>
  </a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>contact</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">home</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">about</a>
    <a href="#stats" class="w3-bar-item w3-button" style="width: 25% !important">stats</a>
    <a href="#moderation" class="w3-bar-item w3-button" style="width:25% !important">moderation</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">support meh</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">you've found</span> meh social</h1>
    <p>social media shouldn't be stressful.</p>
    <img src="https://meh.social/system/site_uploads/files/000/000/001/@1x/48e668e114427851.png" alt="meh social logo by @jankhambrams@meh.social" class="w3-image" width="50%">
  </header>
