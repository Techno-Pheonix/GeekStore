<?php 

session_start();
if (isset($_POST["submit"])){
    require_once '../includes/dbh.inc.php';
    $x= $_POST["email"];
    
    $sql="select count(*) as total from user where email = '$x'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $mail = $row["total"];
    if ($mail==0){
        header("location:index.php?error=dontexist");
        exitg();
    }

    else if (empty($x)){
        header("location:index.php?error=empty");
        exit();
    }
    else {
        $_SESSION['mailpass']=$x;
        header("location:password.php");
    }
}

?>