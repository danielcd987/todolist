<?php
    session_start();

?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>TO DO LIST</TITLE>
<meta charset="UTF-8" />
<META name="author" description="Dan DeCarlo"/>
<link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="liststyle.css">
</HEAD>
<BODY>

<h1 class = "heading">TO DO LIST:</h1>

<nav>
    <ul>
        <!-- <li><a href = "index.php">Login</a></li>
        <li><a href = "sign-up.php">Sign Up</a></li> -->
        
        <?php
        if(isset($_SESSION['id_user'])){ //creates a logout link if the login session is true
            echo("<ul>
                <li><a href='logout.php'>Logout</a></li> 
                <li><a href = 'tasks_list.php'>Tasks</a></li>
                <li><p>You are logged in</p></li>
                </ul>"); //creates the link to view tasks when loggedin 
        }
        else{
            echo("<ul>
                 <li><a href = 'index.php'>Login</a></li>
                 <li><a href = 'sign-up.php'>Sign Up</a></li>
                 <li><p>You are logged out</p></li>
                </ul>");
                
        }
        ?>
    </ul>
</nav>
 