<?php 
session_start();

if (isset($_POST["submit"])) {

    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $adress=$_POST["adress"];
    $password=$_POST["password"];
    $confirm=$_POST["confirmpassword"];
    $gender=$_POST["gender"];
    if ($gender =="male"){
        $gender = "M";
    }
    else {
        $gender = "F";
    }
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $secquestion=$_POST["secquestion"];

    $answer=$_POST["answer"];

    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    //check if inputs are empty
    if (emptyInputSignup($firstname, $lastname, $adress, $password, $confirm, $gender, $email, $phone, $secquestion, $answer)!==false) {
        header("location:index.php?error=emptyinput");
        exit(); //stop the script from running
    }

  


    //check the first pattern (incompativle with host php version)
    /*if (invalidfn($firstname)!==false) {
        header("location:../index.php?error=invliadfn");
        exit(); //stop the script from running
    }*/ 

    
    //check email 
    if (email($email)!==false) {
        header("location:index.php?error=invalidemail");
        exit();
    }



    //check if the password fields are identic 
    if (pwdmatch($password, $confirm)!==true) {
        header("location:index.php?error=pwdmatch");
        exit(); 
    }

    
    //check if the email already exists 
    if (existmail($conn, $email)==true) {
        header("location:index.php?error=emailtaken");
         exit();
    }

    //check the password length
    if (passlen($password)==false){
        header("location:index.php?error=pwdlen");
        exit();
    }

    //die("$firstname, $lastname, $adress, $password, $confirm, $gender, $email, $phone, $secquestion, $answer,$admin,$registered,$lastlog");

    createuser($conn, $firstname, $lastname, $adress, $password, $confirm, $gender, $email, $phone, $secquestion, $answer);


}

else {
    header("location:index.php");
}

?>