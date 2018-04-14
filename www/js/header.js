function makeAuthenticationVisible(topValue){
	document.getElementById("authenticationContainer").style.top = topValue;
	setTimeout(function (){authenticationVisible('block', 'none', 'none');}, 500);
}

function veziCosultMeu(){
	const url = '/restaurant/classes/check-credentionals.php';
	const comenziURL = '/restaurant/cos-cumparaturi.php';
	
	let xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			let response = JSON.parse(this.responseText);
			
			console.log(this.responseText);
			
			if(response == true){
				window.location = comenziURL;
			}else{
				makeAuthenticationVisible('0');
			}
			
		}
	}
	
	xhttp.open("GET", url, true);
	xhttp.send();
}

function toggleSchimbaParolaPanel(){
	let schimbaParola = document.getElementById("schimbaParolaContainer");
	
	if(schimbaParola.style.display == "none"){
		schimbaParola.style.display = "flex";
	}else{
		schimbaParola.style.display = "none";
	}
}

function schimbaParola(){
	const url = '/restaurant/classes/schimba-parola.php';
		
	let data = new FormData(document.getElementById("schimbaParolaForm"));
	let xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
				alert("Parola a fost schimbata.");
		}	
	}
	
	
	xhttp.open("POST", url, true);
	xhttp.send(data);	
}