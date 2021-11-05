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
		<th>id</th>
		<th>Izen Abizenak</th>
		<th>Aprobatu Kopurua</th>
		<th>Matrikula Kopurua</th>
		<th>Editatu</th>
	</tr>
	<?php


	include("connection.php");

	$query = "SELECT * FROM liburuak";
	$result = mysqli_query($con, $query);


	if($result-> num_rows > 0){
		while($row = mysqli_fetch_array($result)){

			$isbn = $row["isbn"];
			$izena = $row["izena"];
			$editoriala = $row["editoriala"];
			$salmentak = $row["salmentak"];

			echo "<tr><td>" . $isbn . "</td><td>" . $izena . "</td><td>" . $editoriala . "</td><td>" . $salmentak . "</td><td>" . "<a href='editatu.php?isbn=$isbn'>editatu</a>" . "</td></tr>";
		}


	}
	else{
		echo "0 result";
	}

	
	?>

</table>

<div class ="flex">
	
	<input type="submit" id="button1" value="Logout">
	<input type="submit" id="button2" value="Gehitu">

</div>

<script type="text/javascript">
	
	document.getElementById('button1').onclick = function() {

		location.href = "logout.php";
   	}

   	document.getElementById('button2').onclick = function() {

		location.href = "gehitu.php";
   	}


</script>

</body>
</html	