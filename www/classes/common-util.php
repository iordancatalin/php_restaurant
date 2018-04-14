<?php
	
	class CommonUtil{
		
		public static $host = "localhost:3306";
		public static $user = "root";
		public static $password = "";
		public static $database = "restaurant";
		
		public static function openConnection(){
			$mysqli = new mysqli(self::$host, self::$user, self::$password, self::$database);
			if ($mysqli->connect_errno) {
				return null;
			}
			
			return $mysqli;
		}
		
		public static function closeConnection($connection){
			return $connection->close();
		}
		
		public static function hashBCrypt($parola){
			return password_hash($parola, PASSWORD_BCRYPT);
		}
		
		public static function verifyBCrypt($parola, $hash){
			return password_verify($parola, $hash);
		}
		
		public static function createVariable(){
			$_SESSION["preparate"] = array();
		}
		
		public static function addPreparat($idPreparat){
			if(!isset($_SESSION["preparate"])){
				CommonUtil::createVariable();
			}
			
			foreach($_SESSION["preparate"] as $preparatWrapper){
				$preparat = $preparatWrapper->preparat;
								
				if($preparat != null && $preparat->id == $idPreparat){
					$preparatWrapper->numar ++;
					
					return;
				}
			}
			
			$preparatDao = new PreparatDAO();		
			$preparat = $preparatDao->findPreparatById($idPreparat);
			
			$prepWrapper = new PreparatWrapper(1, $preparat);
			
			array_push($_SESSION["preparate"], $prepWrapper);
		}
		
		public static function countPreparate(){
			if(!isset($_SESSION["preparate"])){
				return 0;
			}
			
			$suma = 0;
			
			foreach($_SESSION["preparate"] as $preparatWrapper){
				$suma += $preparatWrapper->numar;
			}
			
			return $suma;
		}
		
		public static function calculValoarePreparate(){
			if(!isset($_SESSION["preparate"])){
				return 0;
			}
			
			$suma = 0;
			
			foreach($_SESSION["preparate"] as $preparatWrapper){
				$suma += $preparatWrapper->numar * $preparatWrapper->preparat->pret;
			}
			
			return $suma;
			}			
		}
	
?>