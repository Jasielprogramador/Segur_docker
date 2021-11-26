<?php

	function isLoginSessionExpired() {
		$login_session_duration = 10; 
		$current_time = time(); 

		echo time() - $_COOKIE['loggedin_time'];
		echo("TATATA");
		echo $login_session_duration;
	
		if(isset($_COOKIE['loggedin_time']) and isset($_COOKIE["user_id"])){  
			if(((time() - $_COOKIE['loggedin_time']) > $login_session_duration)){ 
				return true; 
			} 
		}
		return false;
	}

?>