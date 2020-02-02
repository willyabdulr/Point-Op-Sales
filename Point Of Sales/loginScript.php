<?php

include 'dbscripts/dbconnect.php';

session_start();

if(isset($_SESSION['id'])){
	header("location: index.php");
}

$username = $_POST['loginID'];
$password = $_POST['Pass'];

$log_sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
$log_query = mysqli_query($con, $log_sql) or die(mysqli_error($con));

if(mysqli_num_rows($log_query)>0){
	while ($row = mysqli_fetch_array($log_query)) {

		$_SESSION['id'] = $row['user_id'];
		$_SESSION['name'] = $row['user_name'];
		$_SESSION['role'] = $row['role'];
	}

	header("location: index.php");
}else{
	header("location: login.php");
}

?>