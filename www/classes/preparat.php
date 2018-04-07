<?php 
	
	require('category-enum.php');
	
	class Preparat {
		
		public $id;
		public $denumire;
		public $timpDePreparare;
		public $categorie;
		public $pret;
		
		function __construct($denumire, $timpDePreparare, $categorie, $pret){
			$this->denumire = $denumire;
			$this->timpDePreparare = $timpDePreparare;
			$this->categorie = $categorie;
			$this->pret = $pret;
		}
		
	}
	
?>