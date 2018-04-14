<?php

	require('classes/common-util.php');
	require('classes/db_comanda.php');
	
	session_start();
	
	$comandaDao = new ComandaDAO();
	$comenzi = $comandaDao->getAllComenziByUSer($_SESSION["currentUserId"]);

?>

<!DOCTYPE html>
<html>
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poor+Story"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<link href="css/comenzile-mele.css" rel="stylesheet" />
	</head>
	<body>
		<div class="header">
			<a href="index.php">Inapoi la site</a>
		</div>
		<div class="body" style="overflow: auto">
			<div class="comenzi-container">
				<table cellpadding="0" cellspacing="0" class="comenzi-table"> 
					<tbody>
						<?php foreach($comenzi as $comanda) { ?>
						<tr> 
							<td>
								<div class="left-container">
									<div class="numar-comanda-container">
										<div class="numar-comanda-panel">
											<span>Nr. comanda <?php echo $comanda->id ?></span>
										</div>
									</div>
									<div class="adresa-comanda-container">
										<span><?php echo $comanda->telefonFacturare." / ".$comanda->adresaFacturare ?></span>
									</div>
								</div>
								<div class="right-container">
									<button type="button" class="detalii-comanda">
										<i class="glyphicon glyphicon-option-vertical"></i>
									</button>
								</div>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>