<?php
	
	require("db_preparat.php");
	
	$categorie = $_GET["categorie"];
	$elementsPerPage = $_GET["elementsPerPage"];
	$page = $_GET["page"];
	
	$preparatDAO = new PreparatDAO();
	$preparate = $preparatDAO->getPage($categorie, $elementsPerPage, $page);
	
	echo json_encode($preparate);
?>