<?php
    include 'tdDbc.php';


    $task = $_POST['task'];
    $class = $_POST['class'];
    $date = $_POST['duedate'];
    $descrip = $_POST['descript'];

    $sql = "INSERT INTO `tasks`(`task`, `class`, `due_date`, `descrip`) VALUES ('$task','$class','$date','$descrip')";
    mysqli_multi_query($conn, $sql);

    header("Location: ../index.php?task=submitted");