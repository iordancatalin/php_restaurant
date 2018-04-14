<?php
	require('classes/preparat-wrapper.php');
	require('classes/db_preparat.php');
	
	session_start();	
?>

<!DOCTYPE html>
<html>
	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poor+Story"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<link href="css/cos-cumparaturi.css" rel="stylesheet" />
	</head>
	<body>
		<div class="header">
			<a href="index.php">Inapoi la site</a>
		</div>
		
		<div class="total-container">
			<span style="display: inline-blockl; width: 30%;">Toal de plata:</span>
			<span style="margin-right: 5px; color: red;"><?php echo CommonUtil::calculValoarePreparate(); ?></span>
			<span>lei</span>
		</div>
		<div class="body">
			<div class="comenzi-container">
				<table cellpadding="0" cellspacing="0" class="comenzi-table"> 
					<tbody>
						<?php
						if(isset($_SESSION["preparate"])){
							foreach($_SESSION["preparate"] as $preparatWrapper) { ?>
						<tr> 
							<td>
								<div class="image-container">
									<img src="<?php echo $preparatWrapper->preparat->imaginePath; ?>" ></img>
								</div>
								<div class="left-container">
									<div class="numar-comanda-container">
										<div class="numar-comanda-panel">
											<span><?php echo $preparatWrapper->preparat->denumire; ?></span>
										</div>
									</div>
									<div class="adresa-comanda-container">
										<span> <?php echo $preparatWrapper->numar." x ".$preparatWrapper->preparat->pret." = ".($preparatWrapper->numar * $preparatWrapper->preparat->pret)." lei" ?></span>
									</div>	
								</div>
								<div class="cantitate-container">
									<select onchange="modificaCantitate(<?php echo $preparatWrapper->preparat->id ?>, this)">
										<?php 
											for($i = 1; $i <= 15; $i++){
												if($preparatWrapper->numar == $i){	
													echo "<option value=".$i." selected>".$i."</option>";
												}else{
													echo "<option value=".$i.">".$i."</option>";													
												}
											}
										
										?>
									</select>
								</div>
								<div class="right-container">
									<button type="button" class="detalii-comanda">
										<span>Sterge</span>
									</button>
								</div>
							</td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
				<!--<div class="pagination-container">
					<ul class="pagination-list">
						<li class="active"><a>1</a></li>
						<li><a>2</a></li>
						<li><a>3</a></li>
					</ul>
				</div>-->
			</div>
		</div>
		<div class="footer">
			<button type="button" onclick="showDetaliiFacturare()">Vezi date facturare</button>
			<button type="button" onclick="trimiteComanda()">Trimi-te comanda</button>
		</div>
		
		<div id="detaliiFacturareContainer" class="detalii-facturare-container">
			<div class="detalii-facturare-panel">
				<div class="header">
				<button type="button" onclick="hiddeDetaliiFacturare()">
						<img src="images/cancel.svg" style="width: 100%; height: 100%"></img>
				</button>
				</div>
				<div class="body">
					<form id="formFacturare" style="display: block; height: 90%;">
						<input type="text" name="numeFacturare" placeholder="Nume Facturare" value="<?php echo $_SESSION["currentUserNume"] ?>"></input>
						<input type="text" name="telefonFacturare" placeholder="Telefon Facturare" value="<?php echo $_SESSION["currentUserTelefon"] ?>"></input>
						<input type="text" name="adresaFacturare" placeholder="Adresa Facturare" value="<?php echo $_SESSION["currentUserAdresa"] ?>"></input>
					</form>
				</div>
			</div>
		</div>
		<script src="js/cos-cumparaturi.js"></script>
	</body>
</html>