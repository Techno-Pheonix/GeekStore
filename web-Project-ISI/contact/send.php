<?php 
session_start();
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
$msgf=$name." | ".$email." | ".$phone." | Message : ".$msg;
mail("hafhoufgeek@gmail.com","Geeks Store : ".$name,$msgf);
header("location:index.php?error=none");
exit();
}

//send($name, $email, $phone, $msg);

?>