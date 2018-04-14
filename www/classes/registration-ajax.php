<?php
	
	require('user.php');
	require('db_user.php');
		
	$nume = $_POST["nume"];
	$parola = $_POST["parola"];
	$email = $_POST["email"];
	$telefon = $_POST["telefon"];
	$adresa = $_POST["adresa"];
	
	$userAccount = new UserAccount($nume, $email, $parola, $telefon, $adresa);
	$userDao = new UserAccountDAO();
	
	$email_valid;	

	if($userDao->isEmailValid($userAccount->email))
	{
		$userDao->persist($userAccount);	
		$email_valid = true;
	}
	else
	{
		$email_valid = false;
	}

	echo json_encode($email_valid);
?>