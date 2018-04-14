<?php
	require('./classes/user.php');
?>

<div class="header">
	<div class="col-1 h-100 header-log">
	
	</div>
	<div class="col-6 h-100">
		<ul class="header-list h-100">
			<li class="item flex-inline middle-center float-left h-100">
				<a class="row flex-block h-70 middle-center" href="#acasa">Acasa</a>
				<div class="header-arrow-decoration"/>
			</li>
			<li class="item flex-inline middle-center float-left h-100">
				<a class="row flex-block h-70 middle-center" href="#meniu">Meniu</a>
				<div class="header-arrow-decoration"/>
			</li>
			<li class="item flex-inline middle-center float-left h-100">
				<a class="row flex-block h-70 middle-center" href="#galerie">Galerie</a>
				<div class="header-arrow-decoration"/>
			</li>
			<li class="item flex-inline middle-center float-left h-100">
				<a class="row flex-block h-70 middle-center" href="#rezervare">Rezervari</a>
				<div class="header-arrow-decoration"/>
			</li>
			<li class="item flex-inline middle-center float-left h-100">
				<a class="row flex-block h-70 middle-center" href="#contact">Contact</a>
				<div class="header-arrow-decoration"/>
			</li>
		</ul>
	</div>
	<div class="col-3 h-100">
		<ul class="header-list-authentication h-100">
			<li class="item col-6 h-100">
				<?php if(!isset($_SESSION["currentUserId"])){ ?>
				<a id="headerDefault" onclick="makeAuthenticationVisible('0')" style="cursor: pointer">Intră in cont</a>
				<div id="authHeaderContainer" style="display: none;">
					<?php } else{ ?>
						<a class="headerLoginUser">
						<?php 
							echo $_SESSION["currentUserNume"];
						?>
						</a>
						<i class="glyphicon glyphicon-chevron-down headerLoginUserIcon"></i>
						<div class="header-auth-container">
							<ul class="user-auth-list h-100">
								<li><a style="cursor: pointer" onclick="toggleSchimbaParolaPanel()">Schimba parola</a></li>
								<li><a href="comenzile-mele.php">Comenzile mele</a></li>
								<li><a style="cursor: pointer" onclick="deconectare()">Deconecteaza-te</a></li>
							</ul>
						</div>
					<?php } if(!isset($_SESSION["currentUserId"])){ ?>
				</div>
					<?php } ?>
			</li>
			
			<li class="item col-4 h-100">
				<a style="cursor: pointer" onclick = "veziCosultMeu()">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</a>
				<div class="items-number-container">
					<span id="numarProduseInCos"><?php $numar = CommonUtil::countPreparate();
						if($numar > 99){
							echo "99+";
						}else{
							echo $numar;
						}
					?></span>
				</div>
			</li>
		</ul>
	</div>
	
	<div id="schimbaParolaContainer" class="shimba-parola-container">
		<div class="schimba-parola-panel">
			<form id="schimbaParolaForm" class="row h-100 m-0">
				<div class="header">
					<button type="button" class="flex-block middle-center" onclick="toggleSchimbaParolaPanel()">
						<img src="images/cancel.svg" style="width: 100%; height: 100%"></img>
					</button>
				</div>
				<div class="body">
					<input type="password" placeholder="Noua parola" name="parolaNoua"></input>
				</div>
				<div class="footer flex-block middle-center">
					<button type="button" onclick="schimbaParola()">Schimba Parola</button>
				</div>
			</form>
		</div>
	</div>
</div>