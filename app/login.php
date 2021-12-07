<?php 

	include("connection.php");

	if(isset($_POST['button1'])){
	
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//something was posted
			$user_name = $_POST['eizena'];
			$password = $_POST['pasahitza'];

			//Cookiaren bizitza denbora definitzeko
			$biHilabetetan = 60 * 60 * 24 * 60 + time();


				if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
				{
					//read from database
					$query = "select * from Erregistroa where IzenAbizen = '$user_name' and pasahitza = '$password'";
					$result = mysqli_query($con, $query);

					if($result)
					{
						if($result && mysqli_num_rows($result) > 0)
						{
							$row = mysqli_fetch_array($result);
							$nan = $row["nan"];

							//Definimos las cookies 
							setcookie("user_id",$nan,$biHilabetetan);
							setcookie("loggedin_time",time(),$biHilabetetan);

							header("Location:menu.php");
						}
					}
					echo "Erabiltzaile edo pasahitz okerra";
					
				}else
				{
					echo "Erabiltzaile edo pasahitz okerra";
				}
		}
	}
	if(isset($_POST['button2'])){

		if(isset($_COOKIE['loggedin_time'])){
			$biHilabetetan = 60 * 60 * 24 * 60 + time();
			setcookie("loggedin_time",time(),$biHilabetetan);
		}

		echo '<script type="text/javascript">location.href="signup.php"</script>';
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
			

			<input id="button1" name="button1" type="submit" value="Login"><br><br>

			<input id="button2" name="button2" type="submit" value="Signup"><br><br>



		</form>
	</div>
</body>
</html>
