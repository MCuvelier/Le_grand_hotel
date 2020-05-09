<?php include "templates/header.php"; ?>
    <div class="fluid">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <img class= "bordimage" alt="hotel" src = "./images/hotel.jpeg"/> <br>
        </div>
      </div>
      <div class="title-bar" data-responsive-toggle="example-animated-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle></button>
  <div class="title-bar-title">Menu</div>
</div>

<div class="top-bar" id="example-animated-menu" data-animate="hinge-in-from-top spin-out">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Le Grand Hôtel</li>
      <li>
        <a href="#">Accueil</a>
        <ul class="menu vertical">
          <li><a href="#">Informations</a></li>
        </ul>
      </li>
      <li><a href="#">Documentation</a></li>
      <li><a href="#">A propos</a></li>
    </ul>
  </div>
</div>
<div class="grid-x grid-padding-x grid-margin-x">
  <div class="callout primary large-4 medium-4 cell">
      <p>Réserver<br/><br/><a class="success button" href="reservation.php">faire une réservation</a>
  </div>
  <div class="callout primary large-4 medium-4 cell">
    <img class= "bordimage" alt="chambre" src = "./images/54.jpg"/>
  </div>
  <div class="callout primary large-4 medium-4 cell">
    <h5> Informations Générales </h5>
  </div>
</div>
<?php include "templates/footer.php"; ?>
