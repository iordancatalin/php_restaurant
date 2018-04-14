const elementsPerPage = 4;
const CATEGORI = ["Bauturi", "Aperitive", "Felul Principal", "Desert"];
let indexCategorie = 0;

function xhttpPreparate(page, categorie, xhttpFunction){
	const scriptURL= `/restaurant/classes/meniu-pagination-ajax.php?categorie=${categorie}&elementsPerPage=${elementsPerPage}&page=${page}`;
	
	let xhttp = new XMLHttpRequest(); 
	
	xhttp.onreadystatechange = xhttpFunction;	
	xhttp.open("GET", scriptURL, true);
	xhttp.send();
	
}

function meniuPagination(page){
	
	let xhttpFunction = function(){
		if (this.readyState == 4 && this.status == 200) {
			let response = JSON.parse(this.responseText);
			
			createItems(response.content);
			markPageAsActive(response.currentPage);
			
	   }
	}
	
	xhttpPreparate(page, CATEGORI[indexCategorie], xhttpFunction);
	
}

function nextCategorie(){
	if(indexCategorie < CATEGORI.length - 1){
	
	indexCategorie ++;
	
	const categorie = CATEGORI[indexCategorie];
	
	let xhttpFunction = function(){
		if (this.readyState == 4 && this.status == 200) {
				
				let response = JSON.parse(this.responseText);
				document.getElementById("categorieText").textContent = categorie;
				createItems(response.content);
				markPageAsActive(response.currentPage);
				createPagination(response.totalPages, response.currentPage);
			
			}
		}
		xhttpPreparate(1, categorie, xhttpFunction);
	}
}

function prevCategorie(){
	if(indexCategorie > 0){
	
	indexCategorie --;
	
	const categorie = CATEGORI[indexCategorie];
	
	let xhttpFunction = function(){
		if (this.readyState == 4 && this.status == 200) {
				let response = JSON.parse(this.responseText);
				document.getElementById("categorieText").textContent = categorie;
				createItems(response.content);
				markPageAsActive(response.currentPage);
				createPagination(response.totalPages, response.currentPage);
			
			}
		}
		xhttpPreparate(1, categorie, xhttpFunction);
	}
	
}

function createItems(content){

	const imageContainerClassName = "item-container";	

	let imagesContainer = document.getElementById("itemsContainer");
	
	removeItems("itemsContainer");
	
	for(let index in content){
		let imageContainer = document.createElement("div");
		imageContainer.className = imageContainerClassName;

		imageContainer.appendChild(createItemImageDiv(content[index].imaginePath));
		imageContainer.appendChild(createItemDenumireDiv(content[index].denumire));
		imageContainer.appendChild(createItemPretDiv(content[index].pret));
		imageContainer.appendChild(createAdaugaInCosDiv(content[index].id));
		
		imagesContainer.appendChild(imageContainer);
	}
	
}

function markPageAsActive(activePage){
	let links = document.querySelectorAll(".pagination-list li a");
	
	for(let i = 0; i < links.length; i++){
		
		if(activePage == (i + 1)){
			links[i].className = "active";
		}else{
			links[i].className = "";
		}
	}
}

function removeItems(id){
	
	let imagesContainer = document.getElementById(id);
	
	while (imagesContainer.firstChild) 
	{
		imagesContainer.removeChild(imagesContainer.firstChild);
	}
	
}

function createItemImageDiv(imagePath){
	
	const imageContainerClassName = "row m-0 flex-block middle-center image-container";
	const imagePanelClassName = "image-panel";
	
	let imageContainer = document.createElement("div");
	imageContainer.className = imageContainerClassName;
	
	let imagePanel = document.createElement("div");
	imagePanel.className = imagePanelClassName;
	
	imageContainer.appendChild(imagePanel);
	
	let img = document.createElement("img");
	img.src = imagePath;
	
	imagePanel.appendChild(img);
	
	return imageContainer;
}

function createItemDenumireDiv(denumire){
		
	const denumireContainerClassName = "row m-0 flex-block middle-center name-container";
	
	let denumireContainer = document.createElement("div");
	denumireContainer.className = denumireContainerClassName;
	
	let denumireSpan = document.createElement("span");
	denumireSpan.textContent = denumire;
	
	denumireContainer.appendChild(denumireSpan);
	
	return denumireContainer;
}

function createPagination(totalPages, currentPage){
	
	removeItems("meniuPagination");
	
	let list = document.getElementById("meniuPagination");
	
	for(let i = 1; i <= totalPages; i++){
		let li = document.createElement("li");
		li.style.marginLeft = "4px";
		list.appendChild(li);
		
		let a = document.createElement("a");
		a.textContent = i;
		
		if(i == currentPage){
				a.className = "active";
		}
		a.addEventListener("click", function(){meniuPagination(i)});
		li.appendChild(a);
	}
	
}

function createItemPretDiv(pret){

	const pretContainerClassName = "row m-0 flex-block middle-center pret-container";
	const pretSpanClassName = "pret-span";
	const moneda = "lei";
	
	let pretContainer = document.createElement("div");
	pretContainer.className = pretContainerClassName;
	
	let pretSpan = document.createElement("span");
	pretSpan.className = pretSpanClassName;
	pretSpan.textContent = pret;
	
	let monedaSpan = document.createElement("span")
	monedaSpan.textContent = moneda;
	
	pretContainer.appendChild(pretSpan);
	pretContainer.appendChild(monedaSpan);
	
	return pretContainer;
}

function createAdaugaInCosDiv(id){
	
	const adaugaInCosClassName = "row m-0 flex-block middle-center add-cart-container";
	
	let adaugaInCosDiv = document.createElement("div");
	adaugaInCosDiv.className = adaugaInCosClassName;
	
	let adaugaInCosButton = document.createElement("button");
	adaugaInCosButton.type = "button";
	adaugaInCosButton.textContent = "Adauga in cos";
	adaugaInCosButton.addEventListener("click", function(){adaugaProdusInCos(id)});
	
	adaugaInCosDiv.appendChild(adaugaInCosButton);
	
	return adaugaInCosDiv;
}

function adaugaProdusInCos(idProdus){
	const url = '/restaurant/classes/adauga-produs-in-cos.php';
	let data = new FormData();
	
	data.append("id", idProdus);
	
	let xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			
			if(this.responseText > 99){
				document.getElementById("numarProduseInCos").textContent = "99+";
			}else{
				document.getElementById("numarProduseInCos").textContent = this.responseText;				
			}
		}
	}
	
	xhttp.open("POST", url, true);
	xhttp.send(data);
}