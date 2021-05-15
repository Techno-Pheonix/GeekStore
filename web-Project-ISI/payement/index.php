<?php 
session_start();
if (isset($_GET["arr"])){
    $array = json_decode($_GET["arr"], true);
    $count = count($array);
    for ($i = 0 ;$i<$count;$i++){
      $_SESSION["shopping_cart"][$i]["item_quantity"] =$array[$i]["item_quantity"];  
    }

    if ($_SESSION["loggedin"]!=true){
      $_SESSION["sign-to-cart"] = true;
      header("location:../signin");
    }
}
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
<?php require_once '../includes/navbar.php'; ?>


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

$arr = $_GET['arr'];
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
              <span class="text-muted">'.$total.'</span>
            </li>');
            $ftotal = $ftotal + $total;
            $total =0;
          }
       ?>
       <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong><?php
              $ftotal = (($ftotal/100)*12)+$ftotal;
              echo($ftotal);?></strong>
            </li>
          </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation " id="payment-form" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <?php/* echo"<input type=\"text\" class=\"form-control\" id=\"firstName\" placeholder=\"'$fname'\" value=\"\" required>" */?>
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
          <input type="text" class="form-control" id="address" placeholder="" value="<?php echo(''.$address); ?>" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="Nothing" selected>Choose...</option>
              <option value="Tunisia">Tunisia</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>Tunis</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
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
            <input id="credit" name="paymentMethod"value="Credit"  type="radio" class="custom-control-input" checked required>
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
