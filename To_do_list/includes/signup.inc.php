<?php
if(isset($_POST['signup'])){ //if the button from sign-up is clicked


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwd2 = $_POST['password_match'];


    include "tdDbc.php"; //gets the database connection file
    require_once "funct.inc.php";

    if(emptyInputSignup($firstname,$lastname,$username,$email,$password,$pwd2) !== false){
        header("Location: ../sign-up.php?signup=fail_emptyfields");
        exit();
    }
    if(invalidUserName($username) !== false){
        header("Location: ../sign-up.php?signup=fail_username");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("Location: ../sign-up.php?signup=fail_email");
        exit();
    }
    if(invalidPassword($password,$pwd2) !== false){
        header("Location: ../sign-up.php?signup=fail_password_nonmatch");
        exit();
    }
    if(takenUsername($conn,$username) !== false){
        header("Location: ../sign-up.php?signup=fail_usernameTaken");
        exit();
    }
    
    createNewUser($conn, $firstname, $lastname, $username, $email, $password)

    // echo($username. " ". $password. " ". $pwd2);
}

else{
    header("Location: ../sign-up.php");
    exit();
}


?>