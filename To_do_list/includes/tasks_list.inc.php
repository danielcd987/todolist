<?php
//submits the tasks into the task DB
    include 'tdDbc.php';


    $task = $_POST['task'];
    $class = $_POST['class'];
    $date = $_POST['duedate'];
    $descrip = $_POST['descript'];
    $session = $_SESSION['id'];

    $sql = "INSERT INTO `tasks`(`task`, `class`, `due_date`, `descrip`,'id') VALUES ('$task','$class','$date','$descrip', '$session')";
    mysqli_multi_query($conn, $sql);

    header("Location: ../tasks_list.php?task=submitted");