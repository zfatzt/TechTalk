<?php
require_once '../repository/UserRepository.php';
require_once '../repository/LoginResult.php';
class UeberpruefungController {
	public function anmelden() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			
			if (empty ( $_POST ["anmeldeEmail"] )) {
				$emailErr = "Bitte geben Sie eine E-Mail Adresse ein!";
			} else {
				$email = htmlspecialchars ( $_POST ["anmeldeEmail"] );
				if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
					$emailErr = "Bitte geben Sie eine gueltige E-Mail Adresse ein!";
				}
			}
			
			$passwort = htmlspecialchars ( $_POST ['anmeldePasswort'] );
			if (empty ( $passwort )) {
				$passwortErr = "Bitte geben Sie ein Passwort ein!";
			}
			
			$userRepository = new UserRepository ();
			$loginResult = $userRepository->existiertNutzer ( $email, $passwort );
			if ($loginResult->getBuntzerExistiert () && $loginResult->getBuntzerKannEinloggen ()) {
				$_SESSION ["benutzername"] = $loginResult->getBenutzername ();
				echo"<script>alert('Login erfolgreich'); </script>";
				header ( "Location: /" );
				exit ();
			} else {
				header ( "Location: /" );
			}
		}
	}
	public function registrieren() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			
			$email = htmlspecialchars ( $_POST ["email"] );
			
			$benutzername = htmlspecialchars ( $_POST ['benutzername'] );
			if (empty ( $benutzername )) {
				$benutzerNameErr = "Bitte geben Sie einen Benutzernamen ein!";
			}
			
			$passwort = htmlspecialchars ( $_POST ['password'] );
			if (empty ( $passwort )) {
				$passwortErr = "Bitte geben Sie ein Passwort ein!";
			}
			
			$passwortWiederholen = htmlspecialchars ( $_POST ['reenterpassword'] );
			if (empty ( $passwortWiederholen )) {
				$passwortErr = "Bitte geben Sie ein Passwort ein!";
			}
			
			$computercheck = $_POST ['humancheck'];
		}
		
		if ($passwort === $passwortWiederholen && $computercheck == "human") {
			$userRepository = new UserRepository ();
			$userRepository->benutzerErstellen ( $benutzername, $email, $passwort );
			header("Location: /");
			
		} else {
			$view = new View('default_index');
			$view->title = 'Anmeldung fehlgeschlagen';
			$view->heading = '';
			$view->tablogin = false;
			$view->display();

			
			echo "<script>document.getElementById('serverWarnung').innerHTML = 'Bitte beachten Sie die genannten Vorschriften.';
					document.getElementById('login').click();
					
					alert('Registration Fehlgeschlagen, Bitte Registrieren Sie sich erneut');
					</script>";
		
				
		}
	}
}
?>