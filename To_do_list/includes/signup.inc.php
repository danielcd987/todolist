<?php
if(isset($_POST['signup'])){ //if the button from sign-up is clicked


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwd2 = $_POST['password_match'];


    require "tdDbc.php"; //gets the database connection file
    // require_once "funct.inc.php";

    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($pwd2)){
        header("Location: ../sign-up.php?signup=fail_emptyfields");
        exit();
    }
    else if(preg_match('/\s/',$username)){
        header("Location: ../sign-up.php?signup=fail_username");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../sign-up.php?signup=fail_email.pwd.uname");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../sign-up.php?signup=fail_email");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ //looks through username for symbols 
        header("Location: ../signup.php?error=invaliduserid&email=".$username);
        exit();
    }
    else if($password !== $pwd2){
        header("Location: ../sign-up.php?password_nomatch");
        exit();
    }
    else{
        $sql = "SELECT user_names FROM users WHERE user_names = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../sign-up.php?sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    header("Location: ../sign-up.php?username_taken");
                    exit();
                }
                else{
                    $sql = "INSERT INTO users (first_name , last_name, user_names, email, pwd) VALUES (?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../sign-up.php?sqlerrors");
                        exit();
                    }
                    else{
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $email, $hash);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../sign-up.php?signup_success");
                        exit();
                    }
                }
        }
    } 
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("Location: ../sign-up.php");
    exit();
}


?>