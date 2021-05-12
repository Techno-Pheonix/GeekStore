<?php
  if (isset($_GET["quantity"])){
    array_push($_SESSION["shopping_cart"],[$_POST["id"],$_POST["price"],$_POST["quantity"]]);
    var_dump($_SESSION["shopping_cart"]);
  }
?>