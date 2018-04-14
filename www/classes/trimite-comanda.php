<?php 
	
	require('common-util.php');
	require('db_comanda.php');
	require('preparat-wrapper.php');
	require('db_comanda_preparat.php');
	require('preparat.php');
	
	session_start();
	
	$numeFacturare = $_POST["numeFacturare"];
	$telefonFacturare = $_POST["telefonFacturare"];
	$adresaFacturare = $_POST["adresaFacturare"];
	
	$date = date("Y-m-d H:i:s");
	
	$comanda = new Comanda($date, $_SESSION["currentUserId"], $numeFacturare, $telefonFacturare, $adresaFacturare);
	$comandaDao = new ComandaDAO();
	$comandaPreparatDao = new ComandaPreparatDAO();
	
	$idComanda = $comandaDao->persist($comanda);
	
	foreach($_SESSION["preparate"] as $preparatWrapper){
		$comandaPreparat = new ComandaPreparat($idComanda, $preparatWrapper->preparat->id, $preparatWrapper->numar);
		$comandaPreparatDao->persist($comandaPreparat);
	}
	
	echo true;
?>