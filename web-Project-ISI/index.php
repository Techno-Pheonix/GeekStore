
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
<?php include "includes/dbh.inc.php";
  session_start(); 
  if (!isset($_SESSION["shopping_cart"])){
    $_SESSION["shopping_cart"] = array();
  }
  if(isset($_SESSION['loggedin']) == false){
    $_SESSION['user'] = "guest";
    $_SESSION['isadmin'] = false;
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark"
  style="background: linear-gradient(135deg, rgb(57, 79, 230) 0%, rgb(0, 204, 255) 100%);">
  <a href="/">
    <img class="nav-logo" src="./pictures/logof2.png" width="80" height="auto" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php 
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn, $sql);?>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="./browse?catg=<?php echo $row["slug"] ?>" id="navbarDropdown"
          role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $row['title'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php 
            $sql_cat = "SELECT sub.* FROM sub_category sub,category where category.id_cat = sub.id_cat and category.id_cat = ".$row['id_cat'].";";
            $result_cat = mysqli_query($conn, $sql_cat);
            $resultcheck = mysqli_num_rows($result_cat);
            if ($resultcheck>0):?>
          <?php while ($row_cat = mysqli_fetch_assoc($result_cat)): ?>
          <a class="dropdown-item"
            href="./browse?catg=<?php echo $row["slug"] ?>&sub_catg=<?php echo $row_cat["title"] ?>"><?php echo $row_cat["title"] ?></a>
          <?php endwhile ?>
          <?php else: ?>
          <a class="dropdown-item" href="#">No Sub Categories</a>
          <?php endif; ?>
          <?php endwhile ?>
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button id="sbtn" class="btn btn-light my-2 my-sm-0" type="submit"><i class="fas fa-search bs"></i></button>
    </form>
    <div class="d-none d-sm-block topbar-divider" id="divider" style="
    width: 0;
    border-right: 1px solid #e3e6f0;
    height: 2.375rem;
    margin: auto 1rem;"></div>
    <div class="nav-item dropdown no-arrow" role="presentation">
      <div class="nav-item dropdown no-arrow"><button class="btn btn-primary dropdown-toggle"
          style="background: linear-gradient(135deg, rgb(42, 39, 218), rgb(42, 170, 200));" data-toggle="dropdown"
          aria-expanded="false" type="button"><span
            class="d-none d-lg-inline mr-2 text-white-600 small"><?php echo($_SESSION['user']); ?></span><img
            class="border rounded-circle img-profile" src="../pictures/avatar1.jpeg"></button>
        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
          <?php 
            if($_SESSION['user'] == "guest"){
              echo "<a class=\"dropdown-item\" role=\"presentation\" href=\"signup\"><i
              class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\"></i>&nbsp;Signup</a>
              ";}
            else{
              echo "<a class=\"dropdown-item\" role=\"presentation\" href=\"#\"><i
              class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\" ></i>&nbsp;Profile</a>
              ";
              }
              ?>
          <a class="dropdown-item" role="presentation" href="cart"><i
              class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Shopping Cart</a>
          <a class="dropdown-item" role="presentation" href="#"><i
              class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Purchase
            log</a>
          <?php 
            if($_SESSION['user'] == "guest"){
              echo "<div class=\"dropdown-divider\"></div><a class=\"dropdown-item\" role=\"presentation\" href=\"signin\"><i
              class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\" ></i>&nbsp;Login</a>
              ";}
            else{
              echo "<div class=\"dropdown-divider\"></div><a class=\"dropdown-item\" role=\"presentation\" href=\"includes/logout.inc.php\"><i
              class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\"></i>&nbsp;Logout</a>
              ";
              }
              ?>

        </div>
      </div>
    </div>
    <?php /*
        if (isset($_SESSION["user"])){
          $username = $_SESSION['user'];
          if ($_SESSION['admin'] == true){
            $username = $_SESSION['user']." (admin)";
          }
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
        }*/
      ?>
  </div>
</nav>


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
      $resultcheck = mysqli_num_rows($result);
      ?>
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
        <?php $i=0;?>
      <?php while ($row = mysqli_fetch_assoc($result)):?>
        <?php $i=$i+1;?>
        <?php if ($i%3==0):?>
          <div class="row equal">
        <?php endif ?>
        <div class="c ">
        <div class="card my-2 align-items-stretch h-100" style="width: 18rem;">
            <img src="./pictures/<?php echo $row["picture"];?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["title"];?></h5>
              <p class="card-text"><?php echo substr($row["summary"],0,40)."...";?></p>
            </div>
            <div class="card-body">
                <a href="./product?id=<?php echo $row["id_p"];?>" class="btn btn-primary mr-4">Buy</a>
                <a><?php echo $row["price"];?>$</a>
            </div>
          </div>
        </div>
        <?php if ($i%3==0):?>
          </div>
        <?php endif ?>
      <?php endwhile?>
      <div class="mbt mt-4">
        <a href="./browse?catg=<?php echo $row_cat["slug"] ?>">
          <button type="button" class="btn btn-primary btn-lg btn-block">Show More</button>
        </a>
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