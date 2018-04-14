<?php

	require('preparat-wrapper.php');
	require('preparat.php');
	
	session_start();

	$idPreparat = $_POST["id"];
	$nouaCantitate = $_POST["cantitate"];
	
	foreach($_SESSION["preparate"] as $preparatWrapper){
		if($preparatWrapper->preparat->id == $idPreparat){
			$preparatWrapper->numar = $nouaCantitate;
		}
	}
?>