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
	}
	
?>