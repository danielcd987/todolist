<?php
include "./includes/header.php";
?>


<h2 class = "heading">Login:</h2>

<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyfields"){
        echo"<h3 class = 'error'>ERROR: Fill in Every Field</h3>";
    }
    else if($_GET["error"] == "logininfailedsql"){
        echo"<h3 class = 'error'>ERROR: Something Went Wrong Please Try Again.</h3>";
    }
    else if($_GET["error"] == "incorrectpassword"){
        echo"<h3 class = 'error'>ERROR: Incorrect Password.</h3>";
    }
    else if($_GET["error"] == "noerrors"){
        echo"<h3 class = 'error'>Success: Your Account Was Created Successfully</h3>";
    }
}




?>


<form method = "POST" action = "includes./login.inc.php">
    <div class = "centerbox">
        <input type = "text" placeholder="Username" class = "inputstyle" name = "username"><br>
    </div><br>

    <div class = "centerbox">
        <input class = "inputstyle" placeholder = "Password" name = "password" type = "password">
    </div><br>

    <div class = "centerbox">
        <button class = "buttonstyles" type = "submit" name = "login">LOGIN</button>
    </div>
</form><br>

<?php
include "./includes/footer.php";
?>