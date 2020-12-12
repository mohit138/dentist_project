<?php
 
 include_once 'dbh.inc.php';

$first = $_POST['first'];		//'' contains 'name' argument from the form !!
$last = $_POST['last'];
$email = $_POST['email'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid,user_pwd)
	VALUES ('$first','$last','$email','$uid','$pwd');";

mysqli_query($conn, $sql);


header("Location: ../index.php?signup=success");


