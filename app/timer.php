<?php

	function isLoginSessionExpired() {

		$login_session_duration = 60;
	
		if(isset($_COOKIE['loggedin_time'])){  
			if(((time() - $_COOKIE['loggedin_time']) > $login_session_duration)){
				return true; 
			}
		}
		return false;
	}
?>