<?php
    include "./includes/header.php";
    include "./includes/tdDbc.php";
?>


<br><h2 class = "heading">Sign Up:</h2>

<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyfields"){
        echo"<h3 class = 'error'>ERROR: Fill in Every Field</h3>";
    }
    else if($_GET["error"] == "username"){
        echo"<h3 class = 'error'>ERROR: Include No Spaces in User Name.</h3>";
    }
    else if($_GET["error"] == "email.uname"){
        echo"<h3 class = 'error'>ERROR: Enter valid Email and User Name.</h3>";
    }
    else if($_GET["error"] == "email"){
        echo"<h3 class = 'error'>ERROR: Enter Valid Email</h3>";
    }
    else if($_GET["error"] == "username_taken"){
        echo"<h3 class = 'error'>ERROR: User Name Taken</h3>";
    }
    else if($_GET["error"] == "invaliduserid"){
        echo"<h3 class = 'error'>ERROR: Enter Valid User Name</h3>";
    }
    else if($_GET["error"] == "password_nomatch"){
        echo"<h3 class = 'error'>ERROR: Passwords Dont Match</h3>";
    }
    else if($_GET["error"] == "sqlerrors"){
        echo"<h3 class = 'error'>ERROR: An Error Has Occurred Please Try Again.</h3>";
    }
    else if($_GET["error"] == "noerrors"){
        echo"<h3 class = 'error'>Success: Your Account Was Created Successfully</h3>";
    }
}

?>

<form name = "signup" action = "includes/signup.inc.php" method = "POST">
    
    <h3 class = "heading">First Name:</h3> 

    <div class = "centerbox"> 
        <input class = "inputstyle" placeholder = "First Name" name = "firstname" type = "text" > 
    </div>

    <h3 class = "heading">Last Name:</h3> 

    <div class = "centerbox"> 
        <input class = "inputstyle" placeholder = "Last Name" name = "lastname" type = "text" > 
    </div>

    <h3 class = "heading">User Name:</h3> 

    <div class = "centerbox"> 
        <input class = "inputstyle" placeholder = "Username" name = "username" type = "text" > 
    </div>

    <h3 class = "heading">Email:</h3> 

    <div class = "centerbox"> 
        <input class = "inputstyle" placeholder = "Email" name = "email" type = "text" > 
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
<?php
    include "./includes/footer.php";
?>