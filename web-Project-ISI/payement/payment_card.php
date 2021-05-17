<?php

require 'vendor/autoload.php';
require_once "../includes/dbh.inc.php";
//Start session
session_start();

// This is your real test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51IqdUVGpFYvTwmSoi84jix5uxWonUqCImUj6zGAAR5SQ2GNesbc9o8clWNneSdM5fGsPONFimk4Z2OAvAvZ75kWt00zpm9xzvf');

header('Content-Type: application/json');


try {
  // retrieve JSON from POST body
  $json_str = file_get_contents('php://input');
  $json_obj = json_decode($json_str);

  $paymentIntent = \Stripe\PaymentIntent::create([
    'amount' => $json_obj->total_price,
    'currency' => 'usd',
  ]);


  //Insert Into DB

  //Synatize input
  $id_user = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
  $adress1 = mysqli_real_escape_string($conn,$json_obj->address);
  $adress2 = mysqli_real_escape_string($conn,$json_obj->address2);
  $country= mysqli_real_escape_string($conn,$json_obj->country);
  $state = mysqli_real_escape_string($conn,$json_obj->state);
  $zip = mysqli_real_escape_string($conn,$json_obj->zip);
  $payement = mysqli_real_escape_string($conn,$json_obj->pay_method);

  //Insert into Commande table
  $sql = "INSERT into commande
  (`id_user`,`adress1`,`adress2`,`country`,`state`,`zip`,`payment`) 
  VALUES('$id_user','$adress1','$adress2','$country','$state','$zip','$payement')"; //? its a placeholder 
  
  mysqli_query($conn, $sql);
  $commande_id = mysqli_insert_id($conn);

  foreach($_SESSION["shopping_cart"] as $item){  
      //Synatize input
      $id_p = mysqli_real_escape_string($conn,$item["item_id"]);
      $datetime = date("Y-m-d h:i:sa");
      $quantity = mysqli_real_escape_string($conn,$item["item_quantity"]);
      $total_price = mysqli_real_escape_string($conn,$item["item_price"]);
      $id_c = mysqli_real_escape_string($conn,$commande_id);

      //check av quantity of product
      $sql = "SELECT quantity from product where id_p = ".$id_p.";";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      if ($row["quantity"]>=$quantity){
          $sql = "UPDATE product set quantity = quantity - ".$quantity." where id_p = ".$id_p;
          $result = mysqli_query($conn, $sql);
      }

      //Insert into Commande table
      $sql = "INSERT into sales
      (`id_p`,`datetime`,`quantity`,`total_price`,`id_c`) 
      VALUES('$id_p','$datetime','$quantity','$total_price','$id_c')"; //? its a placeholder
      mysqli_query($conn, $sql);
  }
    

  $output = [
    'clientSecret' => $paymentIntent->client_secret,
  ];
  echo json_encode($output);

} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}