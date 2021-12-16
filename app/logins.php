<?php

    include("connection.php");
    
    if($_COOKIE['login_errors'] == true){
        $izena = $_GET["izena"];
        $_COOKIE['loggedin_time'] = time();
        $query = "INSERT INTO logins (izena,data) values ('$izena',now());";
        mysqli_query($con, $query);
        echo '<script type ="text/JavaScript">';  
		echo 'alert("Erabiltzaile edo pasahitz okerra")';  
		echo '</script>';  
        echo '<script type="text/javascript">location.href="login.php"</script>';
    }
    else{
        echo '<script type="text/javascript">location.href="datuak.php"</script>';
    }
    
?>