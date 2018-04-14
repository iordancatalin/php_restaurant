<?php

	class ComandaPreparat{
		
		public $id;
		public $idComanda;
		public $idPreparat;
		public $numarPreparate;
		
		function __construct($idComanda, $idPreparat, $numarPreparate){
			$this->idComanda = $idComanda;
			$this->idPreparat = $idPreparat;
			$this->numarPreparate = $numarPreparate;
		}
	}

?>