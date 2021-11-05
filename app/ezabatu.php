<?php

	session_start();

	$isbn = $_GET["isbn"];

	include("connection.php");
	$query = "DELETE FROM liburuak where isbn='$isbn'";
	$result = mysqli_query($con, $query);

	header("Location: db.php");
	die;
		
?>