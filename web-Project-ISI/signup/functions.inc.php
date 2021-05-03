<?php

function emptyInputSignup($firstname, $lastname, $adress, $password, $confirm, $gender, $email, $phone, $secquestion, $answer){
    $result;
    if (empty($firstname) || empty($lastname) || empty($adress) || empty($password) || empty($confirm) || empty($email) || empty($phone) || empty($answer)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function email($email){
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function pwdmatch($password, $confirm){
    $result;
    if ($password!=$confirm){
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}



function existmail($conn, $email){
    $result;

    $sql = "SELECT * FROM user where email='$email'";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck>0){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;

}

function passlen($password){
    $result;

    if (strlen($password)<8){
        $result = false;
    }
    else {
        $result = true;
    }

    return $result;
}

function quest($secquestion){
    $result;

    if ($secquestion!=1 || $secquestion!=2 || $secquestion!=3){
        $result = false;
    }
    else{
        $result = true;
    }
    return $result; 
}


function createuser($conn, $firstname, $lastname, $adress, $password, $confirm, $gender, $email, $phone, $secquestion, $answer){
    $id;
    $admin = 0;
    $registered = date("Y-m-d H:i:s");
    $lastlog = date("Y-m-d H:i:s");
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user(`first_name`, `last_name`, `adress`, `phone`, `email`, `password`, `admin`, `gender`, `registered_at`, `lastlogin`, `sec_quest`, `sec_answer`) VALUES ('$firstname', '$lastname', '$adress', '$phone' ,'$email', '$hashed', '$admin', '$gender', '$registered', '$lastlog', '$secquestion', '$answer')";
    if (mysqli_query($conn,$sql)){
        die("insert c bon ");
    }
    else {
        die("erreur dinsertion".mysqli_error($conn));
    }
    mysqli_close($conn);
    $_SESSION['username'] = $firstname;
    $_SESSION['success'] = "You are now logged in";
    header("location:index.php?error=none");
    exit();
}

//this function is not compatible with the host php version
/*
function invalidfn($firstname) {
    $result;
    $pattern = "/^[a-zA-Z]*$/";
    //if the firstname not matching the pattern so we have a problem
    if (!preg_match($pattern), $firstname) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
    */ 
