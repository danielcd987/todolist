<?php
header("Location: ../index.php?task=submitted");
$sqls = "SELECT * FROM tasks;"; //choses all data
$results = mysqli_query($conn, $sqls); //connection to db and the query that runs

 $checkresults = mysqli_num_rows($results); //amount of data
 if($checkresults > 0){
     while ($row = mysqli_fetch_assoc($results)){
         echo "
         <table>
             <tr>
                 <th class = 'table'>Task:</th>
                 <th class = 'table'>Class:</th>
                 <th class = 'table'>Description:</th>
             </tr>
             <tr>
                 <td><h5 class = 'records'>".$row['task']."</h5></td>
                 <td><h5 class = 'records'>".$row['class']."</h5></td>
                 <td><h5 class = 'records'>".$row['description']."</h5></td>
             </tr>
         </table>
         ";
 }
}    