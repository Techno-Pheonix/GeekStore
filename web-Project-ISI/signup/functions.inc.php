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
    $i = 0;
    $query = "SELECT * from user where email='$email'";
    $result = mysql_query($conn, $query);
   if (mysqli_num_rows($result)>0) {
    $result = true;
   }

   else {
       $result = false;
   }
   

    
   /* $sql = "SELECT * FROM user WHERE email =?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepate($stmt, $sql)) {
        header("location:index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result();
    if ($row = mysqli_fetch_assoc($resultdata)){
        $result = true;
    }

    else {
        $result = false;
    }

    mysqli_stmt_close($stmt);
    return $result;*/

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
