function authenticationVisible(login, registration, parolaUitata){
	document.getElementById("loginContainer").style.display = login;
	document.getElementById("registrationContainer").style.display = registration;
	document.getElementById("parolaUitataContainer").style.display = parolaUitata;
}

function doRegistration(){
	const registratinURL = '/restaurant/classes/registration-ajax.php';
	let nume = document.getElementById("registrationNume");
	let email = document.getElementById("registrationEmail");
	let parola = document.getElementById("registrationParola");
	let confirmParola = document.getElementById("registrationConfirmParola");
	let telefon = document.getElementById("registrationTelefon");
	let adresa = document.getElementById("registrationAdresa");
	let isValid = true;
	
	if(isNullOrEmpty(nume.value)){
		nume.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}else{
		nume.style.borderColor = "transparent";	
	}
	
	if(isNullOrEmpty(email.value)){
		email.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}else{
		email.style.borderColor = "transparent";
	}
	
	if(isNullOrEmpty(parola.value)){
		parola.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}
	
	if(isNullOrEmpty(confirmParola.value)){
		confirmParola.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}
	
	if(!isNullOrEmpty(parola.value) && parola.value !== confirmParola.value){
		parola.style.borderColor = "rgba(237, 61, 61, 0.5)";
		confirmParola.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}else if(!isNullOrEmpty(parola.value)){
		parola.style.borderColor = "transparent";
		confirmParola.style.borderColor = "transparent";		
	}
	
	if(isNullOrEmpty(telefon.value)){
		telefon.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}else{
		telefon.style.borderColor = "transparent";		
	}
	
	if(isNullOrEmpty(adresa.value)){
		adresa.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}else{
		adresa.style.borderColor = "transparent";
	}
	
	if(isValid){
		
		let data = new FormData(document.getElementById("registrationForm"));
			
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				let response = JSON.parse(this.responseText);

				if(response == true){
					document.getElementById("authenticationContainer").style.top = "-100%";
					authenticationVisible('block', 'none', 'none');
				}else{
					email.style.borderColor = "rgba(237, 61, 61, 0.5)";
				}
		   }
		}
		
		xhttp.open("POST", registratinURL, true);
		xhttp.send(data);
	}
}

function isNullOrEmpty(value){
	return value == null || value == undefined || value.length == 0;
}

function doLogin(){
	const registratinURL = '/restaurant/classes/login-ajax.php';
	let parola = document.getElementById("loginParola");
	let email = document.getElementById("loginEmail");
	let isValid = true;
	
	if(isNullOrEmpty(email.value)){
		email.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}else{
		email.style.borderColor = "transparent";
	}
	
	if(isNullOrEmpty(parola.value)){
		parola.style.borderColor = "rgba(237, 61, 61, 0.5)";
		isValid = false;
	}else{
		parola.style.borderColor = "transparent";		
	}
	
	if(isValid){
		
		let data = new FormData(document.getElementById("loginForm"));
			
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				let response = JSON.parse(this.responseText);
				
				console.log(response);
				
				if(response != 0){
					createHeaderAuth(response.nume);
					document.getElementById("authenticationContainer").style.top = "-100%";
				}else{
					document.getElementById("loginEmail").style.borderColor = "rgba(237, 61, 61, 0.5)";
					document.getElementById("loginParola").style.borderColor = "rgba(237, 61, 61, 0.5)";
				}
		   }
		}
		
		xhttp.open("POST", registratinURL, true);
		xhttp.send(data);
	}
}

function deconectare(){
	const url = '/restaurant/classes/log-out.php';
	
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function (){
			if (this.readyState == 4 && this.status == 200) {
				location.reload();
		   }	
		}
	xhttp.open("GET", url, true);
	xhttp.send();
}

function createHeaderAuth(nume){
	let container = document.getElementById("authHeaderContainer");
	container.style.display = "block";
	
	document.getElementById("headerDefault").style.display = "none";
	
	let a = document.createElement("a");
	a.className = "headerLoginUser";
	a.textContent = nume;
	container.appendChild(a);
	
	let icon = document.createElement("i");	
	icon.className = "glyphicon glyphicon-chevron-down headerLoginUserIcon";
	container.appendChild(icon);
	
	let div = document.createElement("div");
	div.className = "header-auth-container";
	container.appendChild(div);
	
	let list = document.createElement("ul");
	list.className = "user-auth-list h-100";
	div.appendChild(list);
	
	let li1 = document.createElement("li");
	let a1 = document.createElement("a");
	a1.textContent = "Schimba parola";
	a1.style.cursor = "pointer";
	a1.addEventListener("click", function(){toggleSchimbaParolaPanel()});
	li1.appendChild(a1);
	
	let li2 = document.createElement("li");
	let a2 = document.createElement("a");
	a2.href = "comenzile-mele.php";
	a2.textContent = "Comenzile mele";
	li2.appendChild(a2);

	let li3 = document.createElement("li");
	let a3 = document.createElement("a");
	a3.style.cursor = "pointer;"
	a3.textContent = "Deconecteaza-te"
	a3.addEventListener("click", function(){deconectare();});
	li3.appendChild(a3);
	
	list.appendChild(li1);
	list.appendChild(li2);
	list.appendChild(li3);
}

function parolaUitata(){
	
	const url = '/restaurant/classes/recuperare-parola.php';
	
	let data = new FormData(document.getElementById("parolaUitataForm"));
	let xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
		}	
	}
	
	xhttp.open("POST", url, true);
	xhttp.send(data);
}