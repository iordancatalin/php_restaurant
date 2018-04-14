<?php

	require('db_user.php');
	
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	$email = $_POST["email"];
	
	$parola = generateRandomString(10);
	
	$userAccountDao = new UserAccountDAO();
	$userAccountDao->updateParola($email, $parola);
	
	$message = "Pentru a intra in cont folisiti urmatoarea parola: ".$parola." . Dupa ce a-ti intrat in cont schimbati parola.";
	
	echo $message;
?>