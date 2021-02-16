<?php
if(isset($_POST['login'])){
        
    require_once 'tdDbc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE user_names = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=loginfailedsql");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $username,$username);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            
            if($rows = mysqli_fetch_assoc($result)){
                $checkpassword = password_verify($password, $rows["pwd"]);
                if($checkpassword == false){
                    header("Location: ../index.php?error=incorrectpassword");
                    exit();
                }
                else if($checkpassword == true){
                    session_start();
                    $_SESSION['id'] = $row['id']; 
                    $_SESSION['user_name'] = $row['user_name']; 
                    $_SESSION['first_name'] = $row['first_name']; 
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['email'] = $row['email']; 
                   header("Location: ../tasks_list.php?login=success");
                   exit();  

                }
            }
            else{
                header("Location: ../index.php?error=wrongpassword");
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