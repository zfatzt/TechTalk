<?php
require_once '../repository/UserRepository.php';
require_once '../repository/LoginResult.php';
class UeberpruefungController {
	public function anmelden() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			
			if (empty ( $_POST ["anmeldeEmail"] )) {
				$emailErr = "Bitte geben Sie eine E-Mail Adresse ein!";
			} else {
				$email = ($_POST ["anmeldeEmail"]);
				// check if e-mail address is well-formed
				if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
					$emailErr = "Bitte geben Sie eine gueltige E-Mail Adresse ein!";
				}
			}
			
			$passwort = $_POST ['anmeldePasswort'];
			if (empty ( $passwort )) {
				$passwortErr = "Bitte geben Sie ein Passwort ein!";
			}
			
			$userRepository = new UserRepository ();
			$loginResult = $userRepository->existiertNutzer( $email, $passwort );
			if ($loginResult->getBuntzerExistiert () && $loginResult->getBuntzerKannEinloggen()) {
				$_SESSION ["benutzername"] = $loginResult->getBenutzername ();
				header ( "Location: /" );
				exit ();
			} else {
				$_SESSION ["benutzername"] = 'Falsch';
			}
		}
	}
	public function registrieren() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			
			if (empty ( $_POST ["email"] )) {
				$emailErr = "Bitte geben Sie eine E-Mail Adresse ein!";
			} else {
				$email = $_POST ["email"];
				// check if e-mail address is well-formed
				if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
					$emailErr = "Bitte geben Sie eine gueltige E-Mail Adresse ein!";
				}
				
				$benutzername = $_POST ['benutzername'];
				if (empty ( $benutzername )) {
					$benutzerNameErr = "Bitte geben Sie einen Benutzernamen ein!";
				}
				
				$passwort = $_POST ['password'];
				if (empty ( $passwort )) {
					$passwortErr = "Bitte geben Sie ein Passwort ein!";
				}
			}
			
			$userRepository = new UserRepository ();
			$userRepository->benutzerErstellen($benutzername, $email, $passwort );
			
			
			
			
		}
		
		// header ( "Location: /" );
		// exit ();
	}
	
	// // Anfrage an die URI /user weiterleiten (HTTP 302)
	// header ( 'Location: /user' );
}
?>