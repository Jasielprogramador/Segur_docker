<?php

	if(!isset($_COOKIE["user_id"])){
		exit;
	}


	include("connection.php");
	require_once('timer.php');


	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$isbn = $_POST['isbn'];
		$izena = $_POST['izena'];
		$editoriala = $_POST['editoriala'];
		$salmentak = $_POST['salmentak'];

		if(!empty($izena) && !empty($isbn) && !empty($editoriala) && !empty($salmentak)){

			$query = "INSERT INTO liburuak VALUES ($isbn,'$izena','$editoriala',$salmentak)";
			$result = mysqli_query($con, $query);

			header("Location: db.php");
			exit;
			
	}
	else
		{
			echo "Please enter some valid information!";
		}
	}



	if(isLoginSessionExpired()){
		echo '<script type="text/javascript">location.href="logout.php"</script>';
		exit;
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
			<div style="font-size: 20px;margin: 10px;color: white;">Gehitu</div>

			<p><label for="izena"¡>Liburuaren isbn:</label><br>
			<input id="text" type="text" name="isbn" placeholder ="XXX-X-XXX-XXXXX-X"><br><br>

			<p><label for="izena"¡>Liburuaren izena:</label><br>
			<input id="text" type="text" name="izena" placeholder="Liburu berria"><br><br>

			<p><label for="izena">Liburuaren editoriala:</label><br>
			<input id="text" type="text" name="editoriala" placeholder="Editorialaren izena"><br><br>

			<p><label for="izena">Liburuaren salmenta kopurua:</label><br>
			<input id="text" type="text" name="salmentak" placeholder="34224"><br><br>


			<input id="button" type="submit" value="Bidali"><br><br>

		</form>
	</div>
</body>
</html>
