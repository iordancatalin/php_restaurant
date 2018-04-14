<?php 
		
	class Preparat {
		
		public $id;
		public $denumire;
		public $categorie;
		public $pret;
		public $imaginePath;
		
		function __construct($id,$denumire, $imaginePath, $categorie, $pret){
			$this->id = $id;
			$this->denumire = $denumire;
			$this->imaginePath = $imaginePath;
			$this->categorie = $categorie;
			$this->pret = $pret;
		}
		
	}
	
?>