<?php

	function isLoginSessionExpired() {


		$current_time = time(); 
		$login_session_duration = 60;

		echo time() - $_COOKIE['loggedin_time'];
		echo("--------");
		echo $login_session_duration;
	
		if(isset($_COOKIE['loggedin_time']) and isset($_COOKIE["user_id"])){  
			if(((time() - $_COOKIE['loggedin_time']) > $login_session_duration)){
				return true; 
			} 
		}
		return false;
	}

	function resetTimer(){
		echo ("ESTAMOS DENTRO PAPU");
		$_COOKIE['loggedin_time'] = time();
	}

?>