<?php

include 'dbscripts/dbconnect.php';

session_start();
$user = $_SESSION['id'];
$name = $_SESSION['name'];
$role = $_SESSION['role'];

$check_sql = "SELECT * FROM users WHERE user_id = '$user' AND user_name = '$name' AND role = '$role' ";
$check_query = mysqli_query($con, $check_sql); 

if(mysqli_num_rows($check_query) == 0){
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['role']);
	session_destroy();
	header("location:login.php");
}

?>