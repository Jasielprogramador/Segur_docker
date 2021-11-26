<?php

	function isLoginSessionExpired() {
		$login_session_duration = 60; 
		$current_time = time(); 
	
		if(isset($_COOKIE['loggedin_time']) and isset($_COOKIE["user_id"])){  
			if(((time() - $_COOKIE['loggedin_time']) > $login_session_duration)){ 
				return true; 
			} 
		}
		return false;
	}

?>