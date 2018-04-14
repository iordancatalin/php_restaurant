<?php
	session_start();
	
	require('user.php');
	require('db_user.php');
	
	$email = $_POST["email"];
	$parola = $_POST["parola"];
	
	$userAccountDao = new UserAccountDAO();
	
	$userAccount = $userAccountDao->findUserAccount($email, $parola);
	
	if($userAccount == null){
		echo 0;
	}else{
		$_SESSION["currentUserNume"] = $userAccount->nume;
		$_SESSION["currentUserId"] = $userAccount->id;
		$_SESSION["currentUserEmail"] = $userAccount->email;
		$_SESSION["currentUserTelefon"] = $userAccount->telefon;
		$_SESSION["currentUserAdresa"] = $userAccount->adresa;
		
		echo json_encode($userAccount);
	}
?>