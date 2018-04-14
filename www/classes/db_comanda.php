<?php
	require('comanda.php');
	
	class ComandaDAO{
		
		private $connection;
		private $insertQuery = "INSERT INTO comanda (data_comanda, user_account, nume_facturare, telefon_facturare, adresa_facturare) VALUES (? , ? , ? , ? , ?);";
		private $selectQuery = "SELECT id_comanda FROM comanda WHERE data_comanda = ? AND user_account = ? ;";
		private $selectByUserQuery = "SELECT id_comanda, data_comanda, user_account, nume_facturare, telefon_facturare, adresa_facturare FROM comanda WHERE user_account = ? ;";
		
		function __construct(){
			$this->connection = CommonUtil::openConnection();
		}
		
		function __destruct(){
			CommonUtil::closeConnection($this->connection);
		}
		
		public function persist($comanda){
			
			if($statement = $this->connection->prepare($this->insertQuery)){	
				$dataComanda = $comanda->dataComanda;
				$userComanda = $comanda->userComanda;
				$numeFacturare = $comanda->numeFacturare;
				$telefonFacturare = $comanda->telefonFacturare;
				$adresaFacturare = $comanda->adresaFacturare;
				
				$statement->bind_param('sssss', $dataComanda, $userComanda, $numeFacturare, $telefonFacturare, $adresaFacturare);
					
				$statement->execute();
					
				$statement->close();
			}
			
			return $this->findByDateAndUser($comanda->dataComanda, $comanda->userComanda);
			
		}
		
		public function findByDateAndUser($data, $userAccountId){
			
			if($statement = $this->connection->prepare($this->selectQuery)){	
				
				$statement->bind_param('ss', $data, $userAccountId);
					
				$statement->execute();
					
				$statement->bind_result($idComanda);
				
				if($statement->fetch()){
					return $idComanda;
				}
				
				$statement->close();
			}

			return null;
		}
		
		public function getAllComenziByUSer($id){
			
			$comenzi = array();
			
			if($statement = $this->connection->prepare($this->selectByUserQuery)){	
				
				$statement->bind_param('i', $id);
					
				$statement->execute();
					
				$statement->bind_result($idComanda, $dataComanda, $userAccount, $numeFacturare, $telefonFacturare, $adresaFacturare);
				
				while($statement->fetch()){
					$comanda = new Comanda($dataComanda, $userAccount, $numeFacturare, $telefonFacturare, $adresaFacturare);
					$comanda->id = $idComanda;
					
					array_push($comenzi, $comanda);
				}
				
				$statement->close();
			}

			return $comenzi;
			
		}
		
	}

?>