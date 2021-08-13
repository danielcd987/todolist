<?php
if(isset($_POST['delete'])){
include 'tdDbc.php';

$id = $_POST['delete'];
$sql = "DELETE FROM `tasks` WHERE `id` = $id ";
$results = mysqli_query($conn,$sql);

if(!$results){
    echo'Error in deleting file!';
}
else{
    header("Location: ./tasks_list.php?data=deleted");
}

}
//got the delete section based off the youtube tutorial from https://www.youtube.com/watch?v=08fYqZqtaeU
?>