<?php

    include("connection.php");

    $izena = $_GET["izena"];

    $query = "INSERT INTO logins (izena,data) values ('$izena',now());";
    mysqli_query($con, $query);

    echo '<script type="text/javascript">location.href="signup.php"</script>';
    exit;

?>