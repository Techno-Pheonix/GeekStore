<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Hello, world!</title>
  </head>
  <body>
    
  <?php require_once "../includes/navbar.php"; ?>
    <?php 
    $sql = "SELECT * FROM product where id_p = ".$_GET["id"].";";
    $result = mysqli_query($conn, $sql);
    ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="container">
      <div class="product row mt-4">
        <img class="col-md-6 col-sm-12" src="../pictures/<?php echo $row["picture"]?>" alt="" height="500px" width="30%">
        <div class="col-md-5 col-sm-12 prod-form pt-5">
          <form action="">  
            <h1 class="prod-name my-5"><?php echo $row["title"] ?></h1>
            <div class=" price-add row">
              <h4 class="col-4 " style="color :#14213d">Quantity : </h4>
              <div class="col-4 d-flex" style="height:40px">
                <button class="btn" >-</button>
                <div class="form-group">
                  <input type="text" class="form-control" value="1" width=20>
                </div>
                <button class="btn">+</button>
              </div>
            </div>
            <div class="price-add">
              <h2><?php echo number_format($row["price"],2) ?> &nbsp $</h2>
              <button type="submit" id="to_cart">Add To Cart</button>
            </div>
          </form>
        </div>
      </div>
      <div class="prod-desc">
        <h1 class="other-title">
          Description :
        </h1>
        <p><?php echo $row["summary"] ?></p>
      </div>
    <?php endwhile ?> 


      <h1 class="other-title">
        Other Items :
      </h1>
      <div class="other-items my-4 row gx-3">
                <?php 
                $sql = "SELECT * FROM sub_category INNER JOIN sub_category ON product.sub_category = sub_category.id_sub where p.id_p <> ".$_GET["id"].";";
                $result = mysqli_query($conn, $sql);
                ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                  <?php echo $row["title"];?>
                  <div class="card col-md-4 col-12 pt-1">
                    <img class="card-img-top" src="img.jpg" alt="Card image cap" height = "300px">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                <?php endwhile ?>   
        
        
        <div class="card col-md-4 col-12 pt-1">
          <img class="card-img-top" src="img.jpg" alt="Card image cap" height = "300px">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>