<?php 
session_start();

	include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$nan = $_POST['nan'];
		$telefonoa = $_POST['telefonoa'];
		$jaiotzeData = $_POST['jaiotzeData'];
		$email = $_POST['email'];

		$erabiltzaileaBilatu = "SELECT * FROM Erregistroa WHERE nan='$nan'";

		if ($count==1){
			echo "nan hori beste erabiltzaile batena da";
		}else{

			//save to database
			$query = "insert into Erregistroa values ('$user_name','$nan','$telefonoa','$jaiotzeData','$email','$password')";

			mysqli_query($con, $query);

			header("Location: db.php");
			die;
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<p><label for="izena">Erabiltzaile izena:</label><br>
			<input id="text" type="text" name="user_name"><br><br>

			<p><label for="nan">Nan:</label><br>
			<input id="text" type="text" name="nan"><br><br>

			<p><label for="telefonoa">Telefonoa:</label><br>
			<input id="text" type="text" name="telefonoa"><br><br>

			<p><label for="jaiotzeData">Jaiotze Data:</label><br>
			<input id="text" type="text" name="jaiotzeData"><br><br>

			<p><label for="email">email:</label><br>
			<input id="text" type="text" name="email"><br><br>

			<p><label for="izena">Pasahitza	:</label><br>
			<input id="text" type="password" name="password"><br><br>


			<input id="button" type="submit" value="Signup" onclick="konprobaketa()"><br><br>

			<a href="login.php">Click to Login</a><br><br>

		</form>
	</div>
</body>
</html>