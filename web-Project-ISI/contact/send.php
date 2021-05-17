<?php 
session_start();
var_dump($_POST);
if (isset($_POST["submit"])){

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$msg = $_POST["msg"];



/*if (empty($name, $email, $phone, $msg)==true){
    header("location:index.php?error=empty");
    exit();
}*/

if (empty($name)||empty($email)||empty($phone)||empty($msg)){
    header("location:index.php?error=empty");
    exit();
}

}

//send($name, $email, $phone, $msg);

?>