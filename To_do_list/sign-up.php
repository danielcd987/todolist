<?php
    include "header.php";
    include "includes/tdDbc.php";
?>

<br><h2 class = "heading">Sign Up:</h2>

<form name = "signup" action = "includes/signup.inc.php" method = "POST">
    
<h3 class = "heading">User Name:</h3> 

<div class = "centerbox"> 
    <input class = "inputstyle" placeholder = "Username" name = "username" type = "text" > 
</div>

<h3 class = "heading">Password:</h3>

<div class = "centerbox">
    <input class = "inputstyle" type = "password" name = "password" placeholder = "Enter Password">
</div>  

<h3 class = "heading">Re-enter Password:</h3>
<div class = "centerbox">
    <input class = "inputstyle" type = "password" name = "password_match" placeholder = "Re-enter Password">
</div>

<br>
<div class = "centerbox">
    <button class = "buttonstyles" type = "submit" name = "signup">Sign Up</button>
 </div>
</form>