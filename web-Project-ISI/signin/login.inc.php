<?php 
if (isset($_POST["submit"])){
$email = $_POST["email"];
$password = $_POST["password"];

require_once 'functions.inc.php';
require_once 'dbh.inc.php';

if (emptyInputlogin($email, $password)!==false) {
    header("location:index.php?error=emptyinput");
    exit();
}

loginuser($conn, $email, $password);
}

else {
    header("location:index.php");
    exit();
}


?>