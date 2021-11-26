<?php 
	if(!isset($_COOKIE["user_id"])){
		exit;
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
		<th>Izena</th>
		<th>Editoriala</th>
		<th>Salmentak</th>
	</tr>

	<?php

	include("connection.php");


	$isbn = $_GET["isbn"];

	$query = "SELECT * FROM liburuak where isbn ='$isbn'";
	$result = mysqli_query($con, $query);


	if($result-> num_rows > 0){
		while($row = mysqli_fetch_array($result)){

			$izena = $row["izena"];
			$editoriala = $row["editoriala"];
			$salmentak = $row["salmentak"];

			echo "<tr><td id ='izena'>" . $izena . "</td><td id = 'editoriala'>" . $editoriala . "</td><td id = 'salmentak'>" . $salmentak . "</td></tr>";
		}


	}
	else{
		echo "0 result";
	}

	
	?>

</table>

<div class ="flex">
	
	<input type="submit" id="button1" value="Gorde">
	<input type="submit" id="button2" value="Cancel">
	<input type="submit" id="button3" value="Ezabatu">

</div>


<script type="text/javascript">

	var table = document.getElementById('tabla');
	var cells = table.getElementsByTagName('td');

	for(var i = 0; i < cells.length;i++){
		cells[i].onclick = function(){

            if(this.hasAttribute('data-clicked')){
                return;
            }

            this.setAttribute('data-clicked','yes');
            this.setAttribute('data-text',this.innerHTML);

			var input = document.createElement('input');
            input.setAttribute('type','text');
            input.value = this.innerHTML;
            input.style.width = this.offsetWidth - (this.clientLeft * 2) + "px";
            input.style.height = this.offsetHeight - (this.clientTop * 2) + "px";
            input.style.border = "0px";
            input.style.fontFamily = "inherit";
            input.style.fontSize = "inherit";
            input.style.textAlign = "inherit";
            input.style.backgroundColor = "LightGoldenRedYellow";


            input.onblur = function(){
                var td = input.parentElement;
                var orig_text = input.parentElement.getAttribute('data-text');
                var current_text = this.value;

               

                if(orig_text != current_text){
      	
                    td.removeAttribute('data-clicked');
                    td.removeAttribute('data-text');
                    td.innerHTML = current_text;
                    td.style.cssText = 'padding: 5px';
                    console.log(orig_text + ' se cambia a '+ current_text);

                }
                else{
                    td.removeAttribute('data-clicked');
                    td.removeAttribute('data-text');
                    td.innerHTML = orig_text;
                    td.style.cssText = 'padding: 5px';
                    console.log('No changes made');
                }

            }

            input.onkeypress = function(event){
                if(event.keyKode == 13){
                    this.blur();
                }
            }

            this.innerHTML = '';
            this.style.cssText = 'padding:0px 0px';
            this.append(input);
            this.firstElementChild.select();
		}
	}
	console.log(cells);

</script>


<script type="text/javascript">
	
	document.getElementById('button1').onclick = function() {

		isbn = "<?php echo $isbn; ?>"

		izena = document.getElementById("izena").innerHTML;

		editoriala = document.getElementById("editoriala").innerHTML;

		salmentak = document.getElementById("salmentak").innerHTML;

		location.href = "update.php?isbn="+isbn+"&izena="+izena+"&editoriala="+editoriala+"&salmentak="+salmentak;
   	}


	document.getElementById('button2').onclick = function() {

		location.href = "db.php";
   	}

   	document.getElementById('button3').onclick = function() {

   		isbn = "<?php echo $isbn; ?>"

		location.href = "ezabatu.php?isbn="+isbn;

   	}

</script>


</body>
</html	