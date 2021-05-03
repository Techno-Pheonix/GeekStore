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
    <title>Home</title>
</head>

<body>
    
    <header>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a  href="http://store.hafhouf.com">
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
        
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button id="sbtn" class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>

    </header>
    <div class="slcontainer d-flex justify-content-center mt-4">
    <div class="slider">
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
    
    <div >
      <footer class="pt-4 my-md-5 pt-md-5 border-top d-flex justify-content-center mt-4">
        <div class="footer row">
          
          <div class="col-6 col-md">
            <h5>Products</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Trending</a></li>
              <li><a class="text-muted" href="#">Best Seller</a></li>
              <li><a class="text-muted" href="#">Discounts</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>User</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">My Account</a></li>
              <li><a class="text-muted" href="/faq">FAQ</a></li>
              <li><a class="text-muted" href="#">Terms and conditions</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About Us</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Contact</a></li>
              <li><a class="text-muted" href="#">Location</a></li>
              <li><a class="text-muted" href="#">Delivery</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</html>