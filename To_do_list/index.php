<?php
    include "includes/tdDbc.php";
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
<form name = "tasklist" action = "includes/index.inc.php" method = "POST">
    
        <h1 class = "heading">TO DO LIST:</h1>
     <a href = "schedule.php" class = "schedulelink" >Class Schedule</a>

    <br>
    <h3 class = "heading">Enter Task:</h3> 
    
    <div class = "centerbox"> 
        <input class = "inputstyle" placeholder = "Task" name = "task" type = "text" > 
    </div>
    <h3 class = "heading">Class:</h3>
    <div class = "centerbox"> 
        <input class = "inputstyle" placeholder = "Class" name = "class" type = "text"> 
    </div>
    <h3 class = "heading">Enter Due Date:</h3>
    <div class = "centerbox">
        <input type = "date" name = "duedate">
    </div>                      
     <div class = "centerbox">
         <h3 class = "heading">Description:</h3>
         <input type = "textarea" size = "30" placeholder = "DESCRIPTION" class = "inputstyle" name = "descript">
    </div>
    <br>
    <div class = "centerbox">
        <button class = "buttonstyles" type = "submit" name = "submittasks">SUBMIT</button>
     </div>
</form>

<br>
<?php

$sql = "SELECT * FROM tasks;"; //gets results from database
        $results = mysqli_query($conn, $sql); //connects and displays 
        $queryresults = mysqli_num_rows($results); //checks rows and results
            if( $queryresults > 0){
                while($row = mysqli_fetch_assoc($results)){ //contains data from results in database
                    echo 
                        "<div class = 'table'>
                        <table>
                            <tr>
                                <th>Task:</th>
                                <th>Class:</th>
                                <th>Due Date:</th>
                                <th>Description:</th>
                            </tr>
                            <tr>
                                <td><h3 class = 'records'>".$row['task']."</h3></td>
                                <td><h3 class = 'records'>".$row['class']."</h3></td>
                                <td><h3 class = 'records'>".$row['due_date']."</h5></td>
                                <td><h3 class = 'records'>".$row['descrip']."</h5></td>
                            </tr>
                        </table>
                        </div>";
                }
            }
?>
<br>

</BODY>
</HTML>