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
    $select= "SELECT * from product where slug =".$_SESSION['slug'];
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    if (emptyInputUpdate($pname, $summary, $price)==true) 
        {
        header("location:Product.php?slug=".$_SESSION['slug']."&error=emptyinput");
        exit();
        }
       $update = "UPDATE product set title='$pname', summary='$summary', price='$price' where id_p='$productId'";
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
           /*sorry your product was not updated*/
           $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=failure";
           header($arg);
           exit();
       }
}
 
 if(isset($_POST['shopInfo']))
 {
    $qty=$_POST['quantity'];
    $meta=$_POST['meta_title'];
    $select= "SELECT * from product where slug =".$_SESSION['slug'];
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    if (emptyInputlogin($qty, $meta)==true) {
        header("location:Product.php?slug=".$_SESSION['slug']."&error=emptyinput");
        exit();
    }
       $update = "UPDATE product set quantity='$qty', meta_title='$meta' where slug=".$_SESSION['slug'];
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
 

?>