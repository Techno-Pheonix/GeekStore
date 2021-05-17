<?php
    require_once "../includes/dbh.inc.php";
    //Start session
    session_start();

    //Synatize input
    $id_user = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
    $adress1 = mysqli_real_escape_string($conn,$_POST["address"]);
    $adress2 = mysqli_real_escape_string($conn,$_POST["address2"]);
    $country= mysqli_real_escape_string($conn,$_POST["country"]);
    $state = mysqli_real_escape_string($conn,$_POST["state"]);
    $zip = mysqli_real_escape_string($conn,$_POST["zip"]);
    $payement = mysqli_real_escape_string($conn,$_POST["paymentMethod"]);

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
            $sql = "UPDATE product set quantity = quantity - ".$quantity."where id_p = ".$id_p." ";
            $result = mysqli_query($conn, $sql);
        }

        //Insert into Commande table
        $sql = "INSERT into sales
        (`id_p`,`datetime`,`quantity`,`total_price`,`id_c`) 
        VALUES('$id_p','$datetime','$quantity','$total_price','$id_c')"; //? its a placeholder
        mysqli_query($conn, $sql);
    }
    
?>