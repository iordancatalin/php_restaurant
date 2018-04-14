<?php 
	
	require('common-util.php');
	
	class UserAccountDAO{
		
		private $connection;
		private $insertString = "INSERT INTO user_account (nume, parola, email, telefon, adresa) VALUES (? ,? ,? ,? ,?);";
		private $checkEmailString = "SELECT * FROM user_account WHERE email = ? ;";
		private $findUserAccountString = "SELECT id_account, parola, nume, email, telefon, adresa FROM user_account WHERE email = ? ;";
		private $updateParolaString = "UPDATE user_account SET parola = ? WHERE email = ? ;";
	
		function __construct(){
			$this->connection = CommonUtil::openConnection();
		}
		
		function __destruct(){
			CommonUtil::closeConnection($this->connection);
		}
		
		function updateParola($email, $parola){
			if($statement = $this->connection->prepare($this->updateParolaString)){	
				$parolaHash = CommonUtil::hashBCrypt($parola);
				
				$statement->bind_param('ss', $parolaHash, $email);
					
				$statement->execute();
					
				$statement->close();
			}			
		}
		
		function persist($userAccount){	
			if($statement = $this->connection->prepare($this->insertString)){	
				$nume = $userAccount->nume;
				$parola = CommonUtil::hashBCrypt($userAccount->parola);
				$email = $userAccount->email;
				$telefon = $userAccount->telefon;
				$adresa = $userAccount->adresa;
				
				$statement->bind_param('sssss', $nume, $parola, $email, $telefon, $adresa);
					
				$statement->execute();
					
				$statement->close();
			}
		}

		function isEmailValid($email){
			
			$row_num = -1;

			if($statement = $this->connection->prepare($this->checkEmailString)){	

				$statement->bind_param('s', $email);
				$statement->execute();
				$statement->store_result();
				$row_num = $statement->num_rows;
				$statement->close();
			}
			
			return $row_num == 0;
		}
		
		function findUserAccount($email, $parola){
			$userAccount = null;
			
			if($statement = $this->connection->prepare($this->findUserAccountString)){
				
				$statement->bind_param('s', $email);
					
				$statement->execute();
					
				$statement->bind_result($id, $parolaHash, $nume, $email, $telefon, $adresa);
								
				while($statement->fetch()){
				
					if(password_verify($parola, $parolaHash) == 1){
						
						$userAccount = new UserAccount($nume, $email, "", $telefon, $adresa);
						$userAccount->id = $id;

						return $userAccount;
					}
				}
					
				$statement->close();

			}
			
			return $userAccount;
		}
		
	}
	
?>