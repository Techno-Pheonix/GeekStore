<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="pictures/fav.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Home</title>
</head>



<body>
       <?php
        require_once 'includes/navbar.php';
       ?>
    <div class="slcontainer d-flex justify-content-center py-1">
    <div class="slider container">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="pictures/blackwidow.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  
                </div>
              </div>
              <div class="carousel-item">
                <img src="pictures/vallhala.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Assasin's Creed Valhalla</h5>
                  <p>Become Eivor and build your own viking legend</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="pictures/naruto.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          </div>
    </div>

    <div class="title mt-4">
        <p class="h1 text-center">Tech</p>
    </div>
    <div class="tech-container d-flex justify-content-center">
        <div class="tech-prod d-flex flex-row bd-highlight justify-content-center mt-4 row">
        <div class="c">
        <div class="card" style="width: 18rem;">
            <img src="pictures/viper.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">RAZER VIPER 8K</h5>
              <p class="card-text">Ambidextrous Esports Gaming Mouse with 8000Hz Polling Rate</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>320 DT</a>
            </div>
          </div>
        </div>

        <div class="c">
        <div class="card" style="width: 18rem;">
            <img src="pictures/hyperxcloud.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">HyperX Cloud</h5>
              <p class="card-text">ultra-comfortable gaming headset with amazing sound</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>450 DT</a>
            </div>
          </div>
        </div>

          <div class="c">
          <div class="card" style="width: 18rem;">
            <img src="pictures/brahma.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Redragon Brahma</h5>
              <p class="card-text">Ultimate Budget mechanical Keyboard</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>250 DT</a>
            </div>
          </div>
        </div>
        
        <div class="mbt mt-4">
        <button type="button" class="btn btn-primary btn-lg btn-block">Show More</button>
        </div>

          
    </div>
    </div>

    <div class="title mt-4">
        <p class="h1 text-center">Gaming</p>
    </div>
    <div class="tech-container d-flex justify-content-center">
        <div class="tech-prod d-flex flex-row bd-highlight justify-content-center mt-4 row">
        <div class="c">
        <div class="card" style="width: 18rem;">
            <img src="pictures/cyberpunk.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Cyberpunk 2077</h5>
              <p class="card-text">Role playing game in the open World Cyberpubk universe</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>170 DT</a>
            </div>
          </div>
        </div>

        <div class="c">
        <div class="card" style="width: 18rem;">
            <img src="pictures/ps5.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Playstation 5</h5>
              <p class="card-text">The iconic Gaming console from Sony</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>1500 DT</a>
            </div>
          </div>
        </div>

          <div class="c">
          <div class="card" style="width: 18rem;">
            <img src="pictures/nswitch.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Nintendo Switch</h5>
              <p class="card-text">Best mobile family gaming console</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>250 DT</a>
            </div>
          </div>
        </div>

        <div class="mbt mt-4">
            <button type="button" class="btn btn-primary btn-lg btn-block">Show More</button>
            </div>
          
    </div>
    </div>

    <div class="title mt-4">
        <p class="h1 text-center">Anime</p>
    </div>
    <div class="tech-container d-flex justify-content-center">
        <div class="tech-prod d-flex flex-row bd-highlight justify-content-center mt-4 row">
        <div class="c">
        <div class="card" style="width: 18rem;">
            <img src="pictures/hokagehoodie.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Naruto Hokage Hoodie</h5>
              <p class="card-text">Inherit the will of the fourth Hokage</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>50 DT</a>
            </div>
          </div>
        </div>

        <div class="c">
        <div class="card" style="width: 18rem;">
            <img src="pictures/onepiece.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">One piece Volume</h5>
              <p class="card-text">The most popular manga in shonen jump</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>35 DT</a>
            </div>
          </div>
        </div>

          <div class="c">
          <div class="card" style="width: 18rem;">
            <img src="pictures/nogame.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Anime Posters</h5>
              <p class="card-text">High quality limited edition posters</p>
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary mr-4">Buy</a>
                <a>15 DT</a>
            </div>
          </div>
        </div>

        <div class="mbt mt-4">
            <button type="button" class="btn btn-primary btn-lg btn-block">Show More</button>
            </div>
          
    </div>
    </div>

    <div class="all">
        
    </div>
      <?php require_once 'includes/footer.php'; ?>
      <script src="//code.tidio.co/efjlrepe7bd17y58klof8khgda5tjwzw.js" async></script>
</body>

<script>
    function signupred() {
      window.location.href = "/signup/";
    } 

    function signinred() {
      window.location.href = "/signin/";
    }

    function profilered() {
      window.location.href = "profile/";
    }  

    function logoutred() {
      window.location.href = "includes/logout.inc.php";
    }  

</script> 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>