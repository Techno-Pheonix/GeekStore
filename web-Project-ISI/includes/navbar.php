<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a  href="/">
      <img class="nav-logo" src="pictures/logof2.png" width="80" height="auto" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tech
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Keyboard</a>
            <a class="dropdown-item" href="#">Mouse</a>
            <a class="dropdown-item" href="#">Headset</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Trending</a>
          </div>
        </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gaming
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Console</a>
          <a class="dropdown-item" href="#">Games</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Trending</a>
        </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Anime
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Figures</a>
            <a class="dropdown-item" href="#">Manga</a>
            <a class="dropdown-item" href="#">Posters</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Trending</a>
          </div>
        </li>
        <form class="form-inline my-2 my-lg-0">
   
   <input class="form-control mr-sm-2 ml-2" type="search" placeholder="Search" aria-label="Search">
   <button id="sbtn" class="btn btn-light my-2 my-sm-0" type="submit"><i class="fas fa-search bs"></i></button>
 </form>
      </ul>

     

    <div class="login mr-4">
  
    </div>
    <?php 
        if (isset($_SESSION["user"])){
          $username = $_SESSION['user'];
          echo('
          <h5 class="mr-2 ml-2 id="usern">'.$username.'</h5>
          <button type="button" class="btn btn-dark btn-sm mr-2 ml-2" onclick="profilered()"><i class="fas fa-user"></i></button>
          <button type="button" class="btn btn-dark btn-sm" onclick="logoutred()"><i class="fas fa-sign-out-alt"></i></button>
          ');
        }
        else {
          echo('
          <button type="button" class="btn btn-dark btn-sm mr-2 ml-2" onclick="signupred()"><i class="fas fa-user-plus"></i></button>
          <button type="button" class="btn btn-dark btn-sm" onclick="signinred()"><i class="fas fa-sign-in-alt"></i></button>
          ');
        }
      ?>
  </div>
</nav>
