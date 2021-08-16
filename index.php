<?php
include "./includes/header.php";
?>

<h2 class = "heading">Login:</h2>


<form method = "POST" action = "includes./login.inc2.php">
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