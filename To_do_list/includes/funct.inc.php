<?php
function emptyInputSignup($firstname,$lastname,$username,$email,$password,$pwd2){
    
    $results = NULL;

    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($pwd2)){
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;

}

function invalidUserName($username){
    $results = NULL;
    if (!preg_match("/^[a-zA-Z0-9]/", $username)){
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;

}

function invalidEmail($email){
    $results = NULL;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;

}

function invalidPassword($password,$pwd2){
    $results = NULL;
    if ($password !== $pwd2){
        $results = true;
    }
    else{
        $results = false;
    }
    return $results;
}


?>

