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
