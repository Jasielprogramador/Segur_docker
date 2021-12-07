<?php 

    if(!isset($_COOKIE["user_id"])){
        echo '<script type="text/javascript">location.href="login.php"</script>';
        die;
    }

	include("connection.php");
	require_once('timer.php');


    if(isLoginSessionExpired()){
        echo '<script type="text/javascript">location.href="logout.php"</script>';
        exit;
    }

    if(isset($_POST['button1'])){
        echo '<script type="text/javascript">location.href="datuak.php"</script>';
    }

    if(isset($_POST['button2'])){
        echo '<script type="text/javascript">location.href="db.php"</script>';
    }

    if(isset($_POST['button3'])){
        echo '<script type="text/javascript">location.href="logout.php"</script>';
    }


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.block {
  display: block;
  width: 100%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.block:hover {
  background-color: #ddd;
  color: black;
}

.red {
  display: block;
  width: 100%;
  border: none;
  background-color: #f7072b;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}

.red:hover {
  background-color: #ddd;
  color: black;
}
</style>
</head>
<body>
</style>
</head>
<body>



<h2>Mesedez sakatu egin nahi duzuna</h2>

<div id="box">
		
		<form method="post">
		
			<input id="button1" name="button1" class="block" type="submit" value="Datu pertsonalak aldatu"><br><br>

			<input id="button2" name="button2" class="block" type="submit" value="Zure liburu kolekzioa ikusi"><br><br>

            <input id="button2" name="button3" class="red" type="submit" value="Logout"><br><br>


		</form>
	</div>

<script type="text/javascript">
	
	document.getElementById('button1').onclick = function() {

        var denbora = "<?php echo time();?>";
		document.cookie = "loggedin_time ="+denbora
		
   	}

   	document.getElementById('button2').onclick = function() {

		var denbora = "<?php echo time();?>";
		document.cookie = "loggedin_time ="+denbora
   	}


</script>

</body>
</html>
