<?php 
    require_once "../../includes/dbh.inc.php";
    if (isset($_POST["submit"])){
        //Synatize input
        $sub_name = mysqli_real_escape_string($conn,$_POST["sub-name"]);
        $sub_cat = mysqli_real_escape_string($conn,$_POST["sub-category"]);

        //Insert into database
        $sql = "INSERT into sub_category
        (`title`,`id_cat`) 
        VALUES('$sub_name','$sub_cat')";
        
        if (mysqli_query($conn, $sql)) {
            header("location:index.php?sucess=true");
        } else {
            header("location:index.php?error=stmtfailed");
            exit();
        }
}
?>
