function showDetaliiFacturare(){
	document.getElementById("detaliiFacturareContainer").style.display = "flex";
}

function hiddeDetaliiFacturare(){
	document.getElementById("detaliiFacturareContainer").style.display = "none";
}

function trimiteComanda(){
	const url = '/restaurant/classes/trimite-comanda.php';
	
	let data = new FormData(document.getElementById("formFacturare"));
	
	let xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			let response = JSON.parse(this.responseText);
			
			if(response == true){
				alert("Comanda a fost trimisa");
			}
			
		}
	}
	
	xhttp.open("POST", url, true);
	xhttp.send(data);
}

function modificaCantitate(id, element){
	const url = `/restaurant/classes/update-cantitate-preparat.php`;
	
	let data = new FormData();
	data.append("id", id);
	data.append("cantitate", element.value);
	
	let xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
				location.reload();
			}			
		}		

	
	xhttp.open("POST", url, true);
	xhttp.send(data);
}	