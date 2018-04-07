<?php 
	
	class UserAccount{
		public $id;
		public $nume;
		public $email;
		public $parola;
		
		function __construct($nume, $email){
			$this->nume = $nume;
			$this->email = $email;
		}
	}
	
?>