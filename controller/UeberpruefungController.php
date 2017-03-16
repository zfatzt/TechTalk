<?php 

require_once '../repository/UserRepository.php';
require_once '../repository/LoginResult.php';

class UeberpruefungController{

	
	public function anmelden() {
		$_SESSION ["dsz"] = 'Falsch';
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			
			$passwort = $_POST ['password'];
			if (empty ( $passwort )) {
				$passwortErr = "Bitte geben Sie ein Passwort ein!";
			}
			
			if (empty ( $_POST ["email"] )) {
				$emailErr = "Bitte geben Sie eine E-Mail Adresse ein!";
			} else {
				$email = test_input ( $_POST ["email"] );
				// check if e-mail address is well-formed
				if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
					$emailErr = "Bitte geben Sie eine gueltige E-Mail Adresse ein!";
				}
			}
			$userRepository = new UserRepository ();
			$loginResult = $userRepository->existiertNutzer ( $email, $passwort );
			if ($loginResult->getBuntzerExistiert ()) {
				$_SESSION ["benutzerName"] = $loginResult->getUserName ();
			} else {
				$_SESSION ["benutzerName"] = 'Falsch';
			}
		}
		header ( "Location: /" );
		exit ();
	}
}
	?>