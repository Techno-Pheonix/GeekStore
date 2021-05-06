<?php 
session_start();

if (isset($_POST["submit"])) {
    $email=$_POST["email"];
    $password=$_POST["password"];


    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    
    if (emptyInputlogin($email, $password)==true) {
        header("location:../login.php?error=emptyinput");
        exit();
    }

    /*if (email($email)!==false) {
        header("location:index.php?error=invalidemail");
        exit();
    }*/

    adminmail($conn, $email,$password);


}

else {
    header("location:index.php");
}


?>