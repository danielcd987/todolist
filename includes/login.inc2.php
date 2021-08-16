<?php
    if(isset($_POST['login'])){
        require_once "tdDbc.php";

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            header("Location: ../index.php?error=emptyinputs");
            exit();
        }
        else{
            // $sql = "SELECT * FROM users WHERE user_names =? OR email = ?;";
            $sql = "SELECT * FROM users WHERE user_names = ?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else{

                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)) {
                    $paswdCheck = password_verify($password, $row['pwd']);

                    if($paswdCheck == false){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                    }
                    else if($paswdCheck == true){
                        session_start();
                        $_SESSION['id_user'] = $row['id'];
                        $_SESSION['username'] = $row['user_names'];

                        header("Location: ../tasks_list.php?login=success");
                        exit(); 
                    }
                    else{
                        header("Location: ../index.php?error=wrongpwd2");
                        exit();   
                    }
                }
                else{
                    header("Location: ../index.php?error=nouserexists");
                    exit();
                }
            }
        }
    }
    else{
        header("Location: ../index.php");
        exit();
    }

?>