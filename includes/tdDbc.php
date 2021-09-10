<?php
//servernames and database names needed to connect
$servername = "us-cdbr-east-04.cleardb.com";
$dBUsername = "b66f47e4e41f6f";
$dBPassword = "8a30a3ed";
$dBName = "heroku_30e79bb25759c2d";

//for xampp

// $servername = "localhost";
// $dBUsername = "root";
// $dBPassword = "";
// $dBName = "activity";

//connects database
$conn = mysqli_connect($servername, $dBUsername, $dBPassword,$dBName);


//alerts if the connection failed
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}

//connects the db to the heroku platform 
//from the tutorial created by doable danny

//Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);