<?php

    include("connection.php");
    
    if($_COOKIE['login_errors'] == true){
        $izena = $_GET["izena"];
        echo $izena;
        $_COOKIE['loggedin_time'] = time();
        $query = "INSERT INTO logins (izena,data) values ('$izena',now());";
        mysqli_query($con, $query);
        //echo '<script type="text/javascript">location.href="login.php"</script>';
    }
    else{
        echo '<script type="text/javascript">location.href="datuak.php"</script>';
    }
    
?> 


<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>

</body>
</html> 
