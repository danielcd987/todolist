<?php
//servernames and database names needed to connect
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "activity";

//connects database
$conn = mysqli_connect($servername, $dBUsername, $dBPassword,$dBName);


//alerts if the connection failed
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}