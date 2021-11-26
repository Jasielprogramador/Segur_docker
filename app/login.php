<?php 

session_start();

	include("connection.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['eizena'];
		$password = $_POST['pasahitza'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//read from database
			$query = "select * from Erregistroa where IzenAbizen = '$user_name' and pasahitza = '$password'";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);

					$_SESSION['loggedin_time'] = time();  

					$_SESSION['user_id'] = $user_data['user_id'];
				}
			}
			
			echo "Erabiltzaile edo pasahitz okerra";
		}else
		{
			echo "Erabiltzaile edo pasahitz okerra";
		}
	}

	if(isset($_SESSION["user_id"])) {
		if(!isLoginSessionExpired()) {
			header("Location: db.php");
		} else {
			header("Location:logout.php");
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>
			
			<p><label for="izena">Erabiltzaile izena:</label><br>
			<input id="text" type="text" name="eizena" placeholder="Erabiltzailea"><br><br>

			
			<p><label for="izena">Pasahitza:</label><br>
			<input id="text" type="password" name="pasahitza" placeholder="Pasahitza"><br><br>
			

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>

		</form>
	</div>
</body>
</html>
