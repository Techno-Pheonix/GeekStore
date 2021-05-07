<?php include "dbh.inc.php"; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a  href="/">
      <img class="nav-logo" src="pictures/logof2.png" width="80" height="auto" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php 
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn, $sql);?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="./browse?catg=<?php echo $row["slug"] ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $row['title'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
            $sql_cat = "SELECT sub.* FROM sub_category sub,category where category.id_cat = sub.id_cat and category.id_cat = ".$row['id_cat'].";";
            $result_cat = mysqli_query($conn, $sql_cat);
            ?>
            <?php while ($row_cat = mysqli_fetch_assoc($result_cat)): ?>
              <a class="dropdown-item" href="./browse?catg=<?php echo $row["slug"] ?>&sub_catg=<?php echo $row_cat["title"] ?>"><?php echo $row_cat["title"] ?></a>
            <?php endwhile ?>
            <?php endwhile ?>
    </ul>

     

    <div class="login mr-4"></div>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button id="sbtn" class="btn btn-light my-2 my-sm-0" type="submit"><i class="fas fa-search bs"></i></button>
    </form>
    <?php 
        if (isset($_SESSION["user_id"])){
          $username = $_SESSION['user'];
          echo('
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
