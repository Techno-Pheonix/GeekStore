<?php
 session_start();
 require_once "includes/functions.inc.php";
 include "includes/dbh.inc.php";
 if(isset($_POST['pInfo']))
 {
    
    $pname=$_POST['product_name'];
    $summary=$_POST['summary'];
    $price=$_POST['price'];
    $productId=$_POST['product_id'];
    $current = date("Y-m-d h:i:sa");
    $select= "SELECT * from product where id_p =".$_SESSION['id_p'];
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res = $row['id_p'];
    if (emptyInputUpdate($pname, $summary, $price)==true) 
        {
        header("location:Product.php?slug=".$_SESSION['slug']."&error=emptyinput");
        exit();
        }
    if($res === $_SESSION['id_p']){
       $update = "UPDATE product set title='$pname', summary='$summary', price='$price', updated_at ='$current' where id_p=".$_SESSION['id_p'].";";
       $sql2=mysqli_query($conn,$update);
       $_SESSION['update'] = $update;
       $_SESSION['query'] = $sql2; 
       if($sql2)
       { 
           /*Successful*/
           $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=success";
           header($arg);
           exit();
       }
       else
       {
           /*sorry your product was not updated*/
           $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=failure";
           header($arg);
           exit();
       }
    }
}
 
 if(isset($_POST['shopInfo']))
 {
    $qty=$_POST['quantity'];
    $meta=$_POST['meta_title'];
    $current = date("Y-m-d h:i:sa");
    $select= "SELECT * from product where slug =".$_SESSION['slug'];
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res = $row['id_p'];
    if (emptyInputlogin($qty, $meta)==true) {
        header("location:Product.php?slug=".$_SESSION['slug']."&error=emptyinput");
        exit();
    }
    if($res === $_SESSION['id_p']){
       $update = "UPDATE product set quantity='$qty', meta_title='$meta', updated_at='$current' where id_p=".$_SESSION['id_p'].";";
       $sql2=mysqli_query($conn,$update);
       if($sql2)
       { 
           /*Successful*/
           $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=success";
           header($arg);
           exit();
       }
       else
       {
           /*sorry your profile was not updated*/
           $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=failure";
           header($arg);
           exit();
       }
    }
}
 

?>