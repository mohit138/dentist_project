<?php
// this will enable connection to databse. 
// if want to use for other database, change dbName to current using databse. 

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "dentist_db";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
