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

    $sql = "SELECT * FROM user WHERE email = ?;"; //? its a placeholder 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);//take the data from user the s for string 
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt); //got the result baby XD

    if ($row = mysqli_fetch_assoc($resultData)) {//if true so there is a data 
        return $row; //reuturn all the data if it exists 
    }

    else {
        $result = false;
    }

    return $result;

    mysqli_stmt_close($stmt);
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
