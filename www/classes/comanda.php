<?php
	
	class Comanda{
		
		public $id;
		public $dataComanda;
		public $userComanda;
		public $numeFacturare;
		public $telefonFacturare;
		public $adresaFacturare;
		
		function __construct($dataComanda, $userComanda, $numeFacturare, $telefonFacturare, $adresaFacturare){
			$this->dataComanda = $dataComanda;
			$this->userComanda = $userComanda;
			$this->numeFacturare = $numeFacturare;
			$this->telefonFacturare = $telefonFacturare;
			$this->adresaFacturare = $adresaFacturare;
		}
	}
	
?>