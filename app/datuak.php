<?php 


	include("connection.php");
	require_once('timer.php');

    $_COOKIE['login_errors'] = false;
    $nan = $_COOKIE['user_id'];

	$query = "SELECT * FROM Erregistroa where nan='$nan'";
    $result = mysqli_query($con, $query);

    if($result-> num_rows > 0){
        
        while($row = mysqli_fetch_array($result)){

            $user_name = $row["IzenAbizen"];
			$nan = $row["nan"];
            $telefonoa = $row["telefonoa"];
            $jaiotzeData = $row["JaiotzeData"];
            $email = $row["email"];
            $bankua = $row["bankua"];      
        }

    }  
	if(isset($_POST['button1'])){

        $_COOKIE['loggedin_time'] = time();

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{

			$query = "select id from Erregistroa where nan='$nan'";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			$id = $row["id"];

			//something was posted
			$user_name = $_POST['user_name'];
			$nan = $_POST['nan'];
			$telefonoa = $_POST['telefonoa'];
			$jaiotzeData = $_POST['jaiotzeData'];
			$email = $_POST['email'];
            $bankua = $_POST['bankua'];

			//save to database
			$query = "update Erregistroa set IzenAbizen='$user_name', nan='$nan', telefonoa=$telefonoa, JaiotzeData='$jaiotzeData', email='$email', bankua=AQUI VA LO K NO SE where id=$id";

			echo $query;

			$_COOKIE['user_id'] = $nan;

			$result = mysqli_query($con, $query);
				
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

			<p><label for="izena">Banku-kontu-zenbakia:</label><br>
			<input id="bankua" type="bankua" value="<?php echo $bankua;?>" name="bankua"><br><br>

            <script type="text/javascript" src="script.js"></script>
			<input id="button1" name="button1" type="submit" value="Aldatu" onclick="konprobatu()"><br><br>

            <input id="button2" name="button2" type="submit" value="Cancel"><br><br>

		</form>
	</div>

    <script type="text/javascript">

        document.getElementById('button2').onclick = function() {

            var denbora = "<?php echo time();?>";
            document.cookie = "loggedin_time ="+denbora
            location.href="menu.php";
        }
    </script>

	


</body>
</html>