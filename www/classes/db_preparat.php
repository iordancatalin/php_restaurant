<?php
	
	require('common-util.php');
	require('preparat.php');
	require('pagination.php');
	
	class PreparatDAO{
	
		private $mysqli;
		private $selectQuery = "SELECT ID_PREPARAT, DENUMIRE, CATEGORIE, PRET, IMAGINE_PATH FROM Preparat WHERE CATEGORIE = ? LIMIT ? OFFSET ? ;";
		private $countQuery = "SELECT COUNT(*) as Numar FROM Preparat WHERE CATEGORIE = ? ;";
		
		function __construct(){
			$this->openConnection();
		}
		
		function __destruct(){
			if($this->mysqli != null){
				$this->closeConnection($this->mysqli);
			}
		}
		
		private function openConnection(){
			$this->mysqli = CommonUtil::openConnection();
		}
		
		public function getPage($categorie, $elementsPerPage, $page){
			$offset = ($page - 1) * $elementsPerPage;
			
			$paginate = new Page();
			
			$paginate->currentPage = $page;
			$paginate->elementsPerPage = $elementsPerPage;
			$paginate->totalElements = $this->countPreparate($categorie);
			$paginate->content = $this->getPreparate($categorie, $offset, $elementsPerPage);
			$paginate->totalPages = intval(ceil($paginate->totalElements / $paginate->elementsPerPage));
			
			return $paginate;
		}
		
		private function getPreparate($categorie, $offset, $limit){
			$preparate = array();
						
			if($statement = $this->mysqli->prepare($this->selectQuery)){	
			
				$statement->bind_param('sii', $categorie, $limit, $offset);
					
				$statement->execute();
					
				$statement->bind_result($id, $denumire, $categorie, $pret, $imaginePath);
							
				while($statement->fetch()){					
					$preparat = new Preparat($id, $denumire, $imaginePath, $categorie, $pret);
					array_push($preparate, $preparat);
				}
					
				$statement->close();
			}
			return $preparate;
		}
		
		private function countPreparate($categorie){
			
			if($statement = $this->mysqli->prepare($this->countQuery)){
				
				$statement->bind_param("s", $categorie);
				
				$statement->execute();
				
				$statement->bind_result($numar);
				
				if($statement->fetch()){
						
					return $numar;					
				}
				
				$statement->close();
			}
						
			return 0;
		}
		
		private function closeConnection(){
			CommonUtil::closeConnection($this->mysqli);
		}
		
		public function toString(){
			return $this->id." ".$this->denumire." ".$this->categorie." ".$this->pret." ".$this->imaginePath;
		}
	}
?>