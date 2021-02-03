<?php
    include "./includes/header.php";
    include "includes/tdDbc.php";
?>

<a href = "login.php">login page</a>
<a href = "sign-up.php">signup page</a>

<form name = "tasklist" action = "includes/index.inc.php" method = "POST">

    <h3 class = "heading">Enter Task:</h3> 
    <div class = "centerbox"> 
        <input class = "inputstyle" placeholder = "Task" name = "task" type = "text" > 
    </div><br>

    <h3 class = "heading">Class:</h3>
    <div class = "centerbox"> 
        <input class = "inputstyle" placeholder = "Class" name = "class" type = "text"> 
    </div><br>

    <h3 class = "heading">Enter Due Date:</h3>
    <div class = "centerbox">
        <input type = "date" name = "duedate">
    </div><br>     

     <h3 class = "heading">Description:</h3>                 
     <div class = "centerbox">
         <input type = "textarea" size = "30" placeholder = "DESCRIPTION" class = "inputstyle" name = "descript">
    </div><br>

    <div class = "centerbox">
        <button class = "buttonstyles" type = "submit" name = "submittasks">SUBMIT</button>
     </div>
</form>

<br>
<?php
//shows the tasks in a table below the form
$sql = "SELECT * FROM tasks;"; //gets results from database
        $results = mysqli_query($conn, $sql); //connects and displays 
        $queryresults = mysqli_num_rows($results); //checks rows and results
            if( $queryresults > 0){
                while($row = mysqli_fetch_assoc($results)){ //contains data from results in database
                    echo 
                        "<div class = 'table'>
                        <table>
                            <tr>
                                <th>ID:</th>
                                <th>Task:</th>
                                <th>Class:</th>
                                <th>Due Date:</th>
                                <th>Description:</th>
                                <th>DELETE</th>
                            </tr>
                            <tr>
                                <td><h3 class = 'records'>".$row['id']."</h3></td>
                                <td><h3 class = 'records'>".$row['task']."</h3></td>
                                <td><h3 class = 'records'>".$row['class']."</h3></td>
                                <td><h3 class = 'records'>".$row['due_date']."</h5></td>
                                <td><h3 class = 'records'>".$row['descrip']."</h5></td>

                                <form method = 'POST' action = 'includes/delete.php'>
                                <td>Delete Activity: <input type = 'submit' value = ".$row['id']." name = 'delete' class = 'buttonstyles'></td>
                                </form>
                            </tr>
                        </table>
                        </div>";
                }
            }
?>
<br>
<?php
    include "./includes/footer.php";
?>