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
	</head>
	<body>
		<div class="header-container">
			<?php
				require('fragments/header.php');
			?>
		</div>
		<div class="fragment-default-container acasa-container">
			<?php
				require('fragments/acasa.php');
			?>
		</div>
		<div class="fragment-default-container">
			<?php
				require('fragments/meniu.php');
			?>
		</div>
		<div class="fragment-default-container default-back-color h-70">
			<?php
				require('fragments/galerie.php');
			?>
		</div>
		<div class="fragment-default-container default-back-color h-30">
			<?php
				require('fragments/rezervare.php');
			?>			
		</div>
		<div class="fragment-default-container default-back-color h-50">
			<?php
				require('fragments/footer.php');
			?>
		</div>
	</body>
</html>