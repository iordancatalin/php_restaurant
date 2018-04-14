<?php
	require('db_preparat.php');
	require('preparat-wrapper.php');
	
	session_start();	
	
	$id_produs = $_POST["id"];
		
	CommonUtil::addPreparat($id_produs);
	
	echo CommonUtil::countPreparate();
?>