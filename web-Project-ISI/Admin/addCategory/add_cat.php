<?php 
    require_once "../../includes/dbh.inc.php";
    if (isset($_POST["submit"])){
        //Synatize input
        $Category_name = mysqli_real_escape_string($conn,$_POST["Category_name"]);
        $Category_meta = mysqli_real_escape_string($conn,$_POST["Category_meta"]);
        $Category_slug = mysqli_real_escape_string($conn,$_POST["Category_slug"]);

        // Check if slug exists
        $sql = "SELECT * FROM category where slug='$Category_slug'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        if ($resultcheck>0){
            header("location:index.php?slug=exits");
            exit();
        }
        //Insert into database
        $sql = "INSERT into category
        (`title`,`meta_title`,`slug`) 
        VALUES('$Category_name','$Category_meta','$Category_slug')";
        
        if (mysqli_query($conn, $sql)) {
            header("location:index.php?error=None");
        } else {
            header("location:index.php?error=stmtfailed");
            exit();
        }
}
?>
