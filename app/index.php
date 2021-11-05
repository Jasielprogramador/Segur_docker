<?php 

session_start();

	include("connection.php");
	header("Location: login.php");
	die;

	$user_data = check_login($con);

?>
