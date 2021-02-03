<?php
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['login'])){
    if($username == "dan"){
        echo"TRUE";
    }
    else{
        echo"FALSE";
    }
}

?>