<?php 
	
	class UserAccount{
		public $id;
		public $nume;
		public $email;
		public $parola;
		public $adresa;
		public $telefon;
		
		function __construct($nume, $email, $parola, $telefon, $adresa){
			$this->nume = $nume;
			$this->email = $email;
			$this->parola = $parola;
			$this->telefon = $telefon;
			$this->adresa = $adresa;
		}
	}
	
?>