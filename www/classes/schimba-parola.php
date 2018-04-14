<?php

	require('db_user.php');
	
	session_start();

	$parola = $_POST["parolaNoua"];
	$email = $_SESSION["currentUserEmail"];
	
	$userAccountDao = new UserAccountDAO();
	$userAccountDao->updateParola($email, $parola);
?>