<?php
include "./includes/header.php";
include "./includes/tdDbc.php";

// if(isset($_SESSION['username'])){
//         echo ('<p>You are logged in.</p>');
// }
// else{
//         echo ('<p>You are logged out</p>');
//         header('Location: index.php');
// }

?>
<?php
if(isset($_SESSION['id_user'])){
    
echo(
'<form name = "tasklist" action = "includes/tasks_list.inc.php" method = "POST">

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
');

//shows the tasks in a table below the form
$id_user_num = $_SESSION['id_user'];
// echo($id_user_num);
$sql = "SELECT * FROM tasks WHERE '$id_user_num' LIKE id ;"; //gets results from database
        $results = mysqli_query($conn, $sql); //connects and displays 
        $queryresults = mysqli_num_rows($results); //checks rows and results
            if( $queryresults > 0){
                while($row = mysqli_fetch_assoc($results)){ //contains data from results in database
                    echo 
                        "<div class = 'table'>
                        <table>
                            <tr>
                                <th>Task #:</th>
                                <th>Task:</th>
                                <th>Class:</th>
                                <th>Due Date:</th>
                                <th>Description:</th>
                                <th>DELETE</th>
                            </tr>
                            <tr>
                                <td><h3 class = 'records'>".$row['task_num']."</h3></td>
                                <td><h3 class = 'records'>".$row['task']."</h3></td>
                                <td><h3 class = 'records'>".$row['class']."</h3></td>
                                <td><h3 class = 'records'>".$row['due_date']."</h5></td>
                                <td><h3 class = 'records'>".$row['descrip']."</h5></td>

                                <form method = 'POST' action = 'includes/delete.php'>
                                <td>Delete Activity: <input type = 'submit' value = ".$row['task_num']." name = 'delete' class = 'buttonstyles'> <small>Click to delete</small></td>
                                </form>
                            </tr>
                        </table>
                        </div>";
                }
            }
        }
    else{
        header("Location: index.php");
    }            
?>
<br>
<?php
    include "./includes/footer.php";
?>