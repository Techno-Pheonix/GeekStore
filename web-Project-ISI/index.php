
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home/style.css">
    <link rel="stylesheet" href="admin/assets/css/styles.css">
    <link rel="stylesheet" href="admin/assets/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet" href="admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="pictures/fav.ico" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Home</title>
</head>



<body>
       <?php
        require_once 'includes/navbar.php';
        require_once 'includes/dbh.inc.php';
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

    <?php
      $sql1 = "SELECT * FROM category;";
      $res_1 = mysqli_query($conn, $sql1);
    ?>
    <?php while ($row_cat = mysqli_fetch_assoc($res_1)):?>
      <?php 
      $sql = "SELECT DISTINCT p.*,c.slug as cat_slug from product as p, category as c,sub_category as s 
      where p.id_cat = s.id_sub and s.id_cat = c.id_cat and c.id_cat =".$row_cat["id_cat"].";";
      $result = mysqli_query($conn, $sql);
      $resultcheck = mysqli_num_rows($result);?>
    
      <div class="title mt-4">
          <p class="h1 text-center"><?php echo $row_cat["slug"];?></p>
      </div>
   
      <?php if ($resultcheck==0):?>
      <div class="mbt mt-4 d-flex justify-content-center">
        <div class="alert alert-primary" role="alert">
            No products yet
        </div>
      </div>
      <?php endif ?>
   
      <div class="tech-container d-flex justify-content-center">
        <div class="tech-prod d-flex flex-row bd-highlight justify-content-center mt-4 row">
      <?php while ($row = mysqli_fetch_assoc($result)):?>
        <div class="c">
        <div class="card" style="width: 18rem;">
            <img src="pictures/<?php echo $row["picture"];?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["title"];?></h5>
              <p class="card-text"><?php echo $row["summary"];?></p>
            </div>
            <div class="card-body">
                <a href="./product?id=<?php echo $row["id_p"];?>" class="btn btn-primary mr-4">Buy</a>
                <a><?php echo $row["price"];?>$</a>
            </div>
          </div>
        </div>
      <?php endwhile?>
      <div class="mbt mt-4">
        <button type="button" class="btn btn-primary btn-lg btn-block">Show More</button>
      </div>
      </div>
    </div>
    <?php endwhile?>
    <div class="all">
        
    </div>
      <?php require_once 'includes/footer.php'; ?>
      <script src="//code.tidio.co/efjlrepe7bd17y58klof8khgda5tjwzw.js" async></script>
</body>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="admin/assets/js/theme.js"></script>
</html>