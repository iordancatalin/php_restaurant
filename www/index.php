<?php

	require('classes/preparat-wrapper.php');
	require('classes/db_preparat.php');
	require('classes/category-enum.php');

	session_start();
	

?>

<html>
	<head>
		<title>Restaurant</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Tajawal" />
		<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poor+Story" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/header.css" />
		<link rel="stylesheet" href="css/acasa.css" />
		<link rel="stylesheet" href="css/meniu.css" />
		<link rel="stylesheet" href="css/galerie.css" />
		<link rel="stylesheet" href="css/rezervare.css" />
		<link rel="stylesheet" href="css/footer.css" />
		<link rel="stylesheet" href="css/authentication.css" />		
	</head>
	<body>
		<?php require('fragments/authentication.php'); ?>
		<div class="header-container">
			<?php
				require('fragments/header.php');
			?>
		</div>
		<div id="acasa" class="fragment-default-container acasa-container">
			<?php
				require('fragments/acasa.php');
			?>
		</div>
		<div id="meniu" class="fragment-default-container">
			<?php
				require('fragments/meniu.php');
			?>
		</div>
		<div id="galerie" class="fragment-default-container default-back-color h-70">
			<?php
				require('fragments/galerie.php');
			?>
		</div>
		<div id="rezervare" class="fragment-default-container default-back-color h-30">
			<?php
				require('fragments/rezervare.php');
			?>			
		</div>
		<div id="contact" class="fragment-default-container default-back-color h-50">
			<?php
				require('fragments/footer.php');
			?>
		</div>
		<script src="js/meniu.js" ></script>
		<script src="js/header.js" ></script>
		<script src="js/authentication.js" ></script>
	</body>
</html>