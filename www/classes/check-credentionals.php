<?php
	
	session_start();
		
	if(isset($_SESSION["currentUserId"])){
		echo "true";
	}else{
		echo "false";
	}
	
?>