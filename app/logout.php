<?php

	setcookie("user_id",2,-1);
	setcookie("loggedin_time",1,-1);
	setcookie("login_errors",false,-1);

	header("Location: login.php");
?>