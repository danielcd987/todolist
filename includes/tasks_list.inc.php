<?php
//submits the tasks into the task DB
session_start();
    include 'tdDbc.php';


    $task = $_POST['task'];
    $class = $_POST['class'];
    $date = $_POST['duedate'];
    $descrip = $_POST['descript'];
    $id_user_num = $_SESSION['id_user'];


    $sql = "INSERT INTO `tasks`(`task`, `class`, `due_date`, `descrip`, `id`) VALUES ('$task','$class','$date','$descrip','$id_user_num')";
    mysqli_multi_query($conn, $sql);

    header("Location: ../tasks_list.php?task=submitted");