<?php 

	include("connection.php");

	$isbn = $_GET["isbn"];
	$izena = $_GET["izena"];
	$editoriala = $_GET["editoriala"];
	$salmentak = $_GET["salmentak"];
	$nan = $_COOKIE["user_id"];


	$query = "update liburuak set izena='$izena',editoriala='$editoriala',salmentak='$salmentak',nan='$nan' where isbn='$isbn'";
	$result = mysqli_query($con, $query);


	header("Location: db.php");
	die;

?>