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
    <link rel="icon" href="pictures/fav.ico" />

  <title>Shipment</title>
</head>

<body>
<?php require_once '../includes/navbar.php'; ?>

<section>
<div class="title text-center mt-4">
        <h1>Shipment</h1>
    </div>



</section>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
</html>
