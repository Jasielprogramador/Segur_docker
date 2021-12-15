<?php 
	if(!isset($_COOKIE["user_id"])){
		echo '<script type="text/javascript">location.href="login.php"</script>';
		die;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Table with database</title>
	<style>
		table,th,td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
		}
		table{
			border-collapse: collapse;
			width: 100%;
			color: #d96549;
			font-family: monospace;
			font-size: 25px;
			text-align: left;

		}
	</style>

</head>
<body>
<table id="tabla">
	<tr>
		<th>isbn</th>
		<th>Izena</th>
		<th>Editoriala</th>
		<th>Salmentak</th>
		<th>Editatu</th>
	</tr>



	<?php

		include("connection.php");
		require_once('timer.php');

		$nan = $_COOKIE['user_id'];

		$query = "SELECT * FROM liburuak where nan='$nan'";

		$result = mysqli_query($con, $query);


		if($result-> num_rows > 0){
			while($row = mysqli_fetch_array($result)){

				$isbn = $row["isbn"];
				$izena = $row["izena"];
				$editoriala = $row["editoriala"];
				$salmentak = $row["salmentak"];

				echo "<tr><td>" . $isbn . "</td><td>" . $izena . "</td><td>" . $editoriala . "</td><td>" . $salmentak . "</td><td>" . 
				"<a href='editatuReset.php?isbn=$isbn'>editatu</a>" . "</td></tr>";
				
			}
			
		}
		else{
			echo "Ez da ezer aurkitu";
		}

		if(isLoginSessionExpired()){
			echo '<script type="text/javascript">location.href="logout.php"</script>';
			exit;
		}
		
	?>

</table>


<div class ="flex">
	
	<input type="submit" id="button1" value="Logout">
	<input type="submit" id="button2" value="Gehitu">
	<input type="submit" id="button3" value="Cancel">


</div>

<script type="text/javascript">
	
	document.getElementById('button1').onclick = function() {

		location.href = "logout.php";
   	}

   	document.getElementById('button2').onclick = function() {

		var denbora = "<?php echo time();?>";
		document.cookie = "loggedin_time ="+denbora
		location.href = "gehitu.php";
   	}

	
   	document.getElementById('button3').onclick = function() {

		var denbora = "<?php echo time();?>";
		document.cookie = "loggedin_time ="+denbora
		location.href = "menu.php";
	}


</script>

</body>
</html	