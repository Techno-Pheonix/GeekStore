<?php

if (isset($_POST["submit"])){
    //Check for file extension
    $file = $_FILES["file"];
    extract($file); 
    var_dump($file);
    $file_extension = explode(".",$name)[1];
    if ($file_extension != "jpg"){
        header("location:index.php?error=file_ext");
    }
    //extract values and protect against sql injection
    $file_extension = explode(".",$name)[1];
    $prod_name = mysqli_real_escape_string($conn,$_POST["prod-name"]);
    $prod_meta = mysqli_real_escape_string($conn,$_POST["prod-meta"]);
    $prod_slug = mysqli_real_escape_string($conn,$_POST["prod-slug"]);
    $prod_summary= mysqli_real_escape_string($conn,$_POST["prod-summary"]);
    $prod_catg = mysqli_real_escape_string($conn,$_POST["prod-category"]);
    $quantity = mysqli_real_escape_string($conn,$_POST["Quantity"]);
    $price = mysqli_real_escape_string($conn,$_POST["Price"]);



    //get file name and save image
    $fileNewName = uniqid("",true).".".$name;
    $fileDestination="../../pictures/".$fileNewName;
    #move_uploaded_file($tmp_name,$fileDestination);
    
    //Insert into database
    $sql = "INSERT into Products values(?,?,?,?,?,?,?,?)"; //? its a placeholder 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssdds", $prod_name,$prod_meta,$prod_slug,$prod_summary,$prod_catg,floatval($quantity),floatval($price),$fileNewName );//take the data from user the s for string 
    mysqli_stmt_execute($stmt);

}



?>