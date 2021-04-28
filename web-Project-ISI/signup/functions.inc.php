<?php

function emptyInputSignup($firstname, $lastname, $adress, $password, $confirm, $gender, $email, $phone, $secquestion, $answer){
    $result;
    if (empty($firstname) || empty($$lastname) || empty($adress) || empty($password) || empty($confirm) || empty($gender) || empty($email) || empty($phone) || empty(secquestion) || empty($answer)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
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
}
