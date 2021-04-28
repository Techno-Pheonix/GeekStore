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


    //check the first pattern
    if (invalidfn($firstname)!==false) {
        header("location:../index.php?error=invliadfn");
        exit(); //stop the script from running
    }

    /*
    //check email 
    if (email($email)!==false) {
        header("location:../index.php?error=invalidemail");
        exit(); //stop the script from running
    }

    //check if the password fields are identic 
    if (pwdmatch($password, $confirm)!==false) {
        header("location:../index.php?error=pwdmatch");
        exit(); //stop the script from running
    }

    //check if the email already exists 
    if (existmail($conn, $email)!==false) {
        header("location:../index.php?error=emailtaken");
        exit(); //stop the script from running
    }
    
    //sign up the user 
    createuser($conn, $firstname, $lastname, $adress, $password, $confirm, $gender, $email, $phone, $secquestion, $answer )
*/

}

else {
    header("location:../signup/index.php");
}

?>