<?php 


	include("connection.php");
	require_once('timer.php');

    $_COOKIE['login_errors'] = false;
    $nan = $_COOKIE['user_id'];

	$query = "SELECT * FROM Erregistroa where nan='$nan'";
    $result = mysqli_query($con, $query);


    if($result-> num_rows > 0){
        
        if($row = mysqli_fetch_array($result)){

			$user_name = $row["IzenAbizen"];
			$nan = $row["nan"];
			$telefonoa = $row["telefonoa"];
			$jaiotzeData = $row["JaiotzeData"];
			$email = $row["email"];
			$password = $row["pasahitza"];


			$hash = $row["bankua"];
			$query = "SELECT zenbakia from bankuHash where hash='$hash';";
			$result = mysqli_query($con, $query);

			if($result-> num_rows > 0){

				if($row = mysqli_fetch_array($result)){
					$bankua = $row["zenbakia"];
				}
			}
			
		}

    }  
	if(isset($_POST['button1'])){

        $_COOKIE['loggedin_time'] = time();

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{

			$query = "select id from Erregistroa where nan='$nan'";
			$result = mysqli_query($con, $query);
			if($row = mysqli_fetch_array($result)){
				$id = $row["id"];
			}

			//guardar el hash
			$query = "select id from bankuHash where zenbakia=$bankua";
			$result=mysqli_query($con, $query);
			if($row = mysqli_fetch_array($result)){
				$idBankua = $row["id"];
			}

			//something was posted
			$user_name = $_POST['user_name'];
			$nan = $_POST['nan'];
			$telefonoa = $_POST['telefonoa'];
			$jaiotzeData = $_POST['jaiotzeData'];
			$email = $_POST['email'];
            $bankua = $_POST['bankua'];
			$password = $_POST['password'];

			//save to database
			$query = "update Erregistroa set IzenAbizen='$user_name', nan='$nan', telefonoa=$telefonoa, JaiotzeData='$jaiotzeData', email='$email', bankua=sha1('$bankua'), pasahitza=md5('$password') where id=$id";
			$result = mysqli_query($con, $query);

			$_COOKIE['user_id'] = $nan;

			//update hash
			$query = "update bankuHash set hash=sha1('$bankua'),zenbakia='$bankua' where id=$idBankua";
			mysqli_query($con, $query);

			if($result){
				echo '<script type="text/javascript">location.href="menu.php"</script>';
			}
		}
	}

    if(isset($_POST['button2'])){
        echo '<script type="text/javascript">location.href="menu.php"</script>';
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
		
		<form method="post" name="erregistroa">
			<div style="font-size: 20px;margin: 10px;color: white;">Datu pertsonalak</div>

			<p><label for="izena">Erabiltzaile izena:</label><br>
			<input id="izena" type="text" value="<?php echo $user_name;?>" name="user_name"><br><br>

			<p><label for="nan">Nan:</label><br>
			<input id="nan" type="text" value="<?php echo $nan;?>" name="nan"><br><br>

			<p><label for="telefonoa">Telefonoa:</label><br>
			<input id="telefonoa" type="text" value="<?php echo $telefonoa;?>" name="telefonoa"><br><br>

			<p><label for="jaiotzeData">Jaiotze Data:</label><br>
			<input id="jaiotzeData" type="text" value="<?php echo $jaiotzeData;?>" name="jaiotzeData"><br><br>

			<p><label for="email">email:</label><br>
			<input id="email" type="text" value="<?php echo $email;?>" name="email"><br><br>

			<p><label for="izena">Pasahitza	:</label><br>
			<input id="pasahitza" type="password" name="password"><br><br>

			<p><label for="izena">Banku-kontu-zenbakia:</label><br>
			<input id="bankua" type="bankua" value="<?php echo $bankua;?>" name="bankua"><br><br>

			<input id="button" name="button" type="submit" value="Aldatu" onclick="konprobatu()"><br><br>

            <input id="button2" name="button2" type="submit" value="Cancel"><br><br>

		</form>
	</div>

	<script type="text/javascript" src="script.js"></script>

</body>
</html>