<?php 

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

		$query = "SELECT * FROM Erregistroa WHERE nan='$nan' and ";
		$result = mysqli_query($con, $query);

		if ($result && mysqli_num_rows($result) > 0){
			echo "erabiltzailea jada erregistratuta dago";
		}else{

			//save to database
			$query = "insert into Erregistroa values ('$user_name','$nan','$telefonoa','$jaiotzeData','$email','$password')";

			$query = mysqli_query($con, $query);
			
			if($query){
				header("Location: db.php");
				die;
			}

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
		
		<form method="post" name="erregistroa">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<p><label for="izena">Erabiltzaile izena:</label><br>
			<input id="izena" type="text" name="user_name"><br><br>

			<p><label for="nan">Nan:</label><br>
			<input id="nan" type="text" name="nan"><br><br>

			<p><label for="telefonoa">Telefonoa:</label><br>
			<input id="telefonoa" type="text" name="telefonoa"><br><br>

			<p><label for="jaiotzeData">Jaiotze Data:</label><br>
			<input id="jaiotzeData" type="text" name="jaiotzeData"><br><br>

			<p><label for="email">email:</label><br>
			<input id="email" type="text" name="email"><br><br>

			<p><label for="izena">Pasahitza	:</label><br>
			<input id="pasahitza" type="password" name="password"><br><br>


			<input id="button" type="submit" value="Signup" onclick="konprobatu()"><br><br>

			<a href="login.php">Click to Login</a><br><br>

		</form>
	</div>
	
	<script type="text/javascript" src="script.js"></script>
</body>
</html>