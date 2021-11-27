<?php

	function isLoginSessionExpired() {

		$current_time = time(); 
		$login_session_duration = 60;

		echo time() - $_COOKIE['loggedin_time'];
		echo("--------");
		echo $login_session_duration;
	
		if(isset($_COOKIE['loggedin_time'])){  
			if(((time() - $_COOKIE['loggedin_time']) > $login_session_duration)){
				return true; 
			} 
		}
		return false;
	}

?>