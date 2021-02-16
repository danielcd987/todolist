<?php
if(isset($_POST['signup'])){ //if the button from sign-up is clicked


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwd2 = $_POST['password_match'];


    require "tdDbc.php"; //gets the database connection file
    //if there are empty fields from the form
    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($pwd2)){
        header("Location: ../sign-up.php?error=emptyfields");
        exit();
    }
    //checking if the username is valid with no spaces 
    else if(preg_match('/\s/',$username)){
        header("Location: ../sign-up.php?error=username");
        exit();
    }
    //valadates email and user name by checking for special/specific characters 
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../sign-up.php?error=email.uname");
        exit();
    }
    //checking email
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../sign-up.php?error=email");
        exit();
    }
    //checks for symbols in username and alerts if error
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ //looks through username for symbols 
        header("Location: ../signup.php?error=invaliduserid=".$username);
        exit();
    }
    //sees if the passwords dont match
    else if($password !== $pwd2){
        header("Location: ../sign-up.php?error=password_nomatch");
        exit();
    }
    else{
        //checks to see if the user name is taken
        $sql = "SELECT user_names FROM users WHERE user_names = ?";
        $stmt = mysqli_stmt_init($conn); //initiates connection with DB
        if(!mysqli_stmt_prepare($stmt,$sql)){ //runs the sql query and connection
            header("Location: ../sign-up.php?sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss",$username,$email); //submits the username 
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);//returns number of rows from the stmt
                if($resultCheck > 0){//if the number of rows is greater than zero than the username is taken
                    header("Location: ../sign-up.php?error=username_taken");
                    exit();
                }
                else{
                   //if there are no errors then all the information submitted in the form is passed through the DB
                    $sql = "INSERT INTO users (first_name , last_name, user_names, email, pwd) VALUES (?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);//prepared statement which is when values arent revealed when communicating with DB and prevents SQL injection
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header("Location: ../sign-up.php?error=sqlerrors");
                        exit();
                    }
                    else{
                        //hashes the pwd for security 
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $username, $email, $hash);//submits the given values into the DB
                        mysqli_stmt_execute($stmt);
                        header("Location: ../sign-up.php?error=noerrors");
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