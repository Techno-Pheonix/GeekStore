<?php 

if (isset($_POST["submit"])) {

    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $adress=$_POST["adress"];
    $password=$_POST["password"];
    $confirm=$_POST["confirmpassword"];
    $gender=$_POST["gender"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $secquestion=$_POST["secquestion"];
    $answer=$_POST["answer"];

    require_once 'functions.inc.php';

    //check if inputs are empty
    if (emptyInputSignup($firstname, $lastname, $adress, $password, $confirm, $gender, $email, $phone, $secquestion, $answer)!==false) {
        header("location:index.php?error=emptyinput");
        exit(); //stop the script from running
    }



}

else {
    header("location:../signup/index.php");
}

?>