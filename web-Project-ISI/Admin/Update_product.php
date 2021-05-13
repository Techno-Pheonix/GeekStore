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
    $select= "SELECT * from product where id_p =".$_SESSION['id_p'];
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

if(isset($_POST['picInfo']))
 {
    $current = date("Y-m-d h:i:sa");
    $select= "SELECT * from product where id_p =".$_SESSION['id_p'];
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res = $row['id_p'];
    $target_dir = "../pictures/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $_SESSION['file'] = $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    header("location:Product.php?slug=".$_SESSION['slug']."&error=format");
    exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=failure";
        header($arg);
        exit();
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        $_SESSION['upload'] = "The image ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
        $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=success2";
        header($arg);
        exit();
    } 
    else {
        $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=failure2";
           header($arg);
           exit();
    }
    $update = "UPDATE product set picture='$target_file', updated_at='$current' where id_p=".$_SESSION['id_p'].";";
    $sql2=mysqli_query($conn,$update);
    if(!$sql2)
    {
        /*sorry your profile was not updated*/
        $arg = "location:Product.php?slug=".$_SESSION['slug']."&res=failure";
        header($arg);
        exit();
    }
    }
}
?>