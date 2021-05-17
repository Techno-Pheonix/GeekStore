<?php 
session_start();
if (isset($_POST["submit"])){
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$msg = $_POST["msg"];

require_once 'send.inc.php';

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