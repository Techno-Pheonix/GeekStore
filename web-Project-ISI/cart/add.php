<?php 
session_start();
if (isset($_GET["arr"])){
    $array = json_decode($_GET["arr"], true);
    $count = count($array);
    for ($i = 0 ;$i<$count;$i++){
      $_SESSION["shopping_cart"][$i]["item_quantity"] =$array[$i]["item_quantity"];  
    }
}
?>
