
<?php
  session_start();
  if ($_SESSION["loggedin"]!=true){
    $_SESSION["sign-to-cart"] = true;
    header("location:../signin");
  }  
  $count = count($_SESSION["shopping_cart"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../admin/assets/css/styles.css">
    <link rel="stylesheet" href="../admin/assets/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="form-validation.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <link rel="icon" href="../pictures/fav.ico" /> 
    <link rel="stylesheet" href="global.css" />
  <title>Shipment</title>
</head>

<body>


<?php include "../includes/dbh.inc.php";
  if (!isset($_SESSION["shopping_cart"])){
    $_SESSION["shopping_cart"] = array();
  }
  if(isset($_SESSION['loggedin']) == false){
    $_SESSION['user'] = "guest";
    $_SESSION['isadmin'] = false;
    $_SESSION['purl'] = "../pictures/default.png";
    $p = $_SESSION['purl'];

  }

  else {
    $_SESSION['purl'] = "../avatars/".$_SESSION['avatar'];
    $p = $_SESSION['purl'];
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark"
  style="background: linear-gradient(135deg, rgb(57, 79, 230) 0%, rgb(0, 204, 255) 100%);">
  <a href="../">
    <img class="nav-logo" src="../pictures/logof2.png" width="80" height="auto" alt="">
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
        <a class="nav-link dropdown-toggle" href="../browse?catg=<?php echo $row["slug"] ?>" id="navbarDropdown"
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
            href="../browse?catg=<?php echo $row["slug"] ?>&sub_catg=<?php echo $row_cat["title"] ?>"><?php echo $row_cat["title"] ?></a>
          <?php endwhile ?>
          <?php else: ?>
          <a class="dropdown-item" href="#">No Sub Categories</a>
          <?php endif; ?>
          <?php endwhile ?>
    </ul>

    <form action="../browse" method="get" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
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
            class="d-none d-lg-inline mr-2 text-white-600 small"><?php echo($_SESSION['user']); ?></span>
            <img
            class="border rounded-circle img-profile" width=60px height=60px src="<?php echo($p); ?>">
            </button>
        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
          <?php 
            if($_SESSION['user'] == "guest"){
              echo "<a class=\"dropdown-item\" role=\"presentation\" href=\"../signup\"><i
              class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\"></i>&nbsp;Signup</a>
              ";}
            else{
              echo "<a class=\"dropdown-item\" role=\"presentation\" href=\"../profile\"><i
              class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\" ></i>&nbsp;Profile</a>
              ";
              }
              ?>
          <a class="dropdown-item" role="presentation" href="../cart"><i
              class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Shopping Cart</a>
          <a class="dropdown-item" role="presentation" href="../log"><i
              class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Purchase
            log</a>
          <?php 
            if($_SESSION['user'] == "guest"){
              echo "<div class=\"dropdown-divider\"></div><a class=\"dropdown-item\" role=\"presentation\" href=\"../signin\"><i
              class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\" ></i>&nbsp;Login</a>
              ";}
            else{
              echo "<div class=\"dropdown-divider\"></div><a class=\"dropdown-item\" role=\"presentation\" href=\"../includes/logout.inc.php\"><i
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

<?php if (count($_SESSION["shopping_cart"])):?> 

<?php 
require_once '../includes/dbh.inc.php';
$x=$_SESSION['user_id'];
$sql = "select * from user where id_user = '$x'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$fname = $row["first_name"];
$lname = $row["last_name"];
$email = $row["email"];
$address = $row["adress"];


?>

<section class="container">

<div class="title text-center mt-4">
        <h1>Shipment</h1>
    </div>
    <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?php echo($count); ?></span>
      </h4>

      <ul class="list-group mb-3">
        <?php
        $total=0;
        $ftotal=0;
          

        for ($i = 0 ;$i<$count;$i++){
            
            $title = $_SESSION["shopping_cart"][$i]["item_name"];
            $quantity = "Quantity : ".$_SESSION["shopping_cart"][$i]["item_quantity"];
            $quant = $_SESSION["shopping_cart"][$i]["item_quantity"];
            $price = $_SESSION["shopping_cart"][$i]["item_price"];
            $total = $total+($price*$quant);
            echo('
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">'.$title.'</h6>
                <small class="text-muted">'.$quantity.'</small>
              </div>
              <span class="text-muted">$'.(number_format($total,2)).'</span>
            </li>');
            $ftotal = $ftotal + $total;
            $total =0;
          }
       ?>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong><?php
              $ftotal = (($ftotal/100)*12)+$ftotal;
              echo("$".number_format($ftotal,2));?></strong>
            </li>
          </ul>

      
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation " id="payment-form" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo(''.$fname); ?>" required>
            <input type="text" class="d-none item_id" id="total_price" name="total_price" value="<?php echo $ftotal?>">
            <input type="text" class="d-none all_items" id="all_items" name="all_items" value='<?php echo json_encode($_SESSION["shopping_cart"])?>'>
            <input type="text" class="d-none all_items" id="user_id" name="user_id" value='<?php echo $_SESSION["user_id"]?>'>
            
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo(''.$lname); ?>" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="" value="<?php echo(''.$email); ?>" required>
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo(''.$address); ?>" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" name="country" required>
              <option value="" selected>Choose...</option>
              <option value="Tunisia">Tunisia</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" name="state" required>
              <option value="">Choose...</option>
              <option>Tunis</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-2">
        <div class="custom-control custom-checkbox">
        </div>

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" value="Credit" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" value="shippment" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">On shippment</label>
          </div>
        </div>
        
        
        <hr class="mb-4">
        <div id="credit-from">
            <div id="card-element"><!--Stripe.js injects the Card Element--></div>
            <button id="submit">
              <div class="spinner hidden " id="spinner"></div>
              <span id="button-text">Pay now</span>
            </button>
            <p id="card-error" role="alert"></p>
            <p class="result-message hidden">
              Payment succeeded, see the result in your
              <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
            </p>
        </div>    
        <div id="shipping-from" class="d-none">
          <button class="btn btn-primary mx-auto" type="submit">Order Now</button>
        </div>            
      </form>
    </div>
  </div>
</div>
<?php else : ?>
  <div class="alert alert-primary container my-5" role="alert">
      No Items In Cart To do any payment
  </div>
<?php endif; ?>

</section>
<?php require_once '../includes/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="form-validation.js"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
        <script src="./client.js" defer></script>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
</html>
