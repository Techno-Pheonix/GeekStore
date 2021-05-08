<?php 
    require_once "../../includes/dbh.inc.php";

    if (isset($_POST["submit"])){
        //Check for file extension
        $file = $_FILES["file"];
        extract($file); 

        //Check File extension
        $file_extension = explode(".",$name)[1];
        if ($file_extension != "jpg" and $file_extension != "png"){
            header("location:index.php?error=file_ext");
            exit();
        }

        //Synatize input
        $prod_name = mysqli_real_escape_string($conn,$_POST["prod-name"]);
        $prod_meta = mysqli_real_escape_string($conn,$_POST["prod-meta"]);
        $prod_slug = mysqli_real_escape_string($conn,$_POST["prod-slug"]);
        $prod_summary= mysqli_real_escape_string($conn,$_POST["prod-summary"]);
        $prod_catg = mysqli_real_escape_string($conn,$_POST["prod-category"]);
        $quantity = mysqli_real_escape_string($conn,$_POST["Quantity"]);
        $price = mysqli_real_escape_string($conn,$_POST["Price"]);
        $prod_date = date("Y-m-d h:i:sa");

        //Check slug
        if ($prod_catg == "none"){
            header("location:index.php?category=nothing");
            exit();
        }
        
        // Check if slug exists
        $sql = "SELECT * FROM product where slug='$prod_slug'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        if ($resultcheck>0){
            header("location:index.php?slug=exits");
            exit();
        }
        
        //Image Upload
        $fileNewName = time().".".$name;
        $fileDestination="../../pictures/".$fileNewName;
        move_uploaded_file($tmp_name,$fileDestination);
        
        //Insert into database
        $sql = "INSERT into product
        (`title`,`meta_title`,`slug`,`summary`,`id_cat`,`picture`,`price`,`quantity`,`created_at`,`updated_at`,`published_at`) 
        VALUES('$prod_name','$prod_meta','$prod_slug','$prod_summary','$prod_catg','$fileNewName','$price','$quantity','$prod_date','$prod_date','$prod_date')"; //? its a placeholder 
        move_uploaded_file($tmp_name,$fileDestination);
        
        if (mysqli_query($conn, $sql)) {
            header("location:index.php?sucess=true");
        } else {
            header("location:index.php?error=stmtfailed");
            exit();
        } 
}
?>
