<?php 
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck>0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['title'];
        }
    }

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
        $fileNewName = uniqid("",true).".".$name;
        $fileDestination="../../pictures/".$fileNewName;
        move_uploaded_file($tmp_name,$fileDestination);
        
        //Insert into database
        $sql = "INSERT into Products
        ('title','meta_title','slug','summary','id_cat','picture','price','quantity','created_at','updated_at','published_at') 
        VALUES('$prdo_title','$prdo_meta','$product_slug','$product_summary','$prod_catg','$fileNewName','$price','$quantity','$prod_date','$prod_date','$prod_date')"; //? its a placeholder 
        
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            header("location:index.php?error=stmtfailed");
            exit();
        } 
}
?>
