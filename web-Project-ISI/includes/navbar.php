<?php include "dbh.inc.php";
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
    <img class="nav-logo" src="pictures/logof2.png" width="80" height="auto" alt="">
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
            class="border rounded-circle img-profile" src="pictures/avatar1.jpeg"></button>
        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
          <?php 
            if($_SESSION['user'] == "guest"){
              echo "<a class=\"dropdown-item\" role=\"presentation\" href=\"signup/index.php\"><i
              class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\" onclick=\"logoutred()\"></i>&nbsp;Signup</a>
              ";}
            else{
              echo "<a class=\"dropdown-item\" role=\"presentation\" href=\"#\"><i
              class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\" ></i>&nbsp;Profile</a>
              ";
              }
              ?>
          <a class="dropdown-item" role="presentation" href="#"><i
              class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Shopping Cart</a>
          <a class="dropdown-item" role="presentation" href="#"><i
              class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Purchase
            log</a>
          <?php 
            if($_SESSION['user'] == "guest"){
              echo "<div class=\"dropdown-divider\"></div><a class=\"dropdown-item\" role=\"presentation\" href=\"signin/index.php\"><i
              class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\" onclick=\"logoutred()\"></i>&nbsp;Login</a>
              ";}
            else{
              echo "<div class=\"dropdown-divider\"></div><a class=\"dropdown-item\" role=\"presentation\" href=\"includes/logout.inc.php\"><i
              class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\" onclick=\"logoutred()\"></i>&nbsp;Logout</a>
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