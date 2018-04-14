<div id="authenticationContainer" class="row h-100 m-0 flex-block middle-center authentication-container">
	<div id="loginContainer" class="login-container">
		<form id="loginForm" class="row h-100 m-0">
			<div class="row m-0 header">
				<div class="row m-0 h-100 flex-block middle-center close-button-container">
					<button type="button" class="flex-block middle-center" onclick="makeAuthenticationVisible('-100%')">
						<img src="images/cancel.svg" style="width: 100%; height: 100%"></img>
					</button>
				</div>
			</div>
			<div class="row m-0 body">
				<input type="text" id="loginEmail" placeholder="* Email" name="email"></input>
				<input type="password" id="loginParola" placeholder="* Parola" name="parola"></input>
			</div>
			<div class="row m-0 footer">
				<div class="row flex-block middle-center m-0 h-50">
					<input type="button" onclick="doLogin()" value="Intra in cont"></input>
				</div>
				<div class="flex-block middle-center footer-text">
					<span>Nu aveți cont? <a style="cursor: pointer" onclick="authenticationVisible('none', 'block', 'none')">Înregistrați-vă</a></span>
				</div>
				<div class="flex-block middle-center footer-text">
					<span><a style="cursor: pointer" onclick="authenticationVisible('none', 'none', 'block')">A-ți uitat parola?</a></span>
				</div>
			</div>
		</form>
	</div>

	
	<div id="registrationContainer" class="registration-container">
		<form id="registrationForm" class="row h-100 m-0">
			<div class="row m-0 header">
				<div class="row m-0 h-100 flex-block middle-center close-button-container">
					<button type="button" class="flex-block middle-center" onclick="makeAuthenticationVisible('-100%')">
						<img src="images/cancel.svg" style="width: 100%; height: 100%"></img>
					</button>
				</div>
			</div>
			<div class="row m-0 body">
				<table cellspacing="0" cellpadding="0" class="row m-0 h-100 registration-table">
					<tbody class="row m-0 h-100">
						<tr class="row m-0 h-20 flex-block middle-center">
							<td>
								<input type="text" name="nume" id="registrationNume" placeholder="* Nume" />
							</td>
						</tr>
						<tr class="row m-0 h-20 flex-block middle-center">
							<td>
								<input type="text" name="email" id="registrationEmail" placeholder="* Email" />
							</td>
						</tr>
						<tr class="row m-0 h-20 flex-block middle-center">
							<td>
								<input type="password" name="parola" id="registrationParola" placeholder="* Parola" />
							</td>
						</tr>
						<tr class="row m-0 h-20 flex-block middle-center">
							<td>
								<input type="password" name="confirmParola" id="registrationConfirmParola" placeholder="* Confirma-ți Parola" />
							</td>
						</tr>
						<tr class="row m-0 h-20 flex-block middle-center">
							<td>
								<input type="text" name="telefon" id="registrationTelefon" placeholder="* Telefon" />
							</td>
						</tr>
						<tr class="row m-0 h-20 flex-block middle-center">
							<td>
								<input type="text" name="adresa" id="registrationAdresa" placeholder="* Adresa" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row m-0 footer">
				<div class="row flex-block middle-center m-0 h-50">
					<input type="button" value="Înregistrați-vă" onclick="doRegistration()"></input>
				</div>
				<div class="flex-block middle-center footer-text">
					<span>Aveți deja cont? <a style="cursor: pointer" onclick="authenticationVisible('block', 'none', 'none')">Intră în cont</a></span>
				</div>
				<div class="flex-block middle-center footer-text">
					<span><a style="cursor: pointer" onclick="authenticationVisible('none', 'none', 'block')"	>A-ți uitat parola?</a></span>
				</div>
			</div>
		</form>
	</div>	
	
	<div id="parolaUitataContainer" class="parola-uitata-container">
			<form id="parolaUitataForm" class="row h-100 m-0">
			<div class="row m-0 header">
				<div class="row m-0 h-100 flex-block middle-center close-button-container">
					<button type="button" class="flex-block middle-center" onclick="makeAuthenticationVisible('-100%')"">
						<img src="images/cancel.svg" style="width: 100%; height: 100%"></img>
					</button>
				</div>
			</div>
			<div id="parolaUitataTextContainer" class="row m-0 body flex-block middle-center" style="font-family: 'Poor Story'">
				<input type="text" name="email" placeholder="* Email"></input>
			</div>
			<div id="parolaUitataFooter" class="row m-0 footer">
				<div class="row flex-block middle-center m-0 h-100">
					<input type="button" value="Trimi-te" onclick="parolaUitata()"></input>
				</div>
			</div>
		</form>
	</div>
</div>