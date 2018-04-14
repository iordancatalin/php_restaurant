<?php
		
	require('comanda-preparat.php');
	
	class ComandaPreparatDao{
		
		private $connection;
		private $insertQuery = "INSERT INTO comanda_preparat (id_comanda, id_preparat, numar_preparate) VALUES ( ? , ? , ?);";
		
		function __construct(){
			$this->connection = CommonUtil::openConnection();
		}
		
		function __destruct(){
			CommonUtil::closeConnection($this->connection);
		}
		
		public function persist($comandaPreparat){
			
			if($statement = $this->connection->prepare($this->insertQuery)){	
				$idComanda = $comandaPreparat->idComanda;
				$idPreparat = $comandaPreparat->idPreparat;
				$numarPreparate = $comandaPreparat->numarPreparate;
				
				$statement->bind_param('iii', $idComanda, $idPreparat, $numarPreparate);
					
				$statement->execute();
					
				$statement->close();
			}
		}
		
	}
	
?>