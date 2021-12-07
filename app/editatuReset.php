<?php

    $isbn = $_GET["isbn"];

?>
<script type="text/javascript">

    var denbora = "<?php echo time();?>";
	document.cookie = "loggedin_time ="+denbora
    
    isbn = "<?php echo $isbn; ?>"
    location.href = "editatu.php?isbn="+isbn
</script>

