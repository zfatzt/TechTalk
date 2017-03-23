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
			if ($loginResult->getBuntzerExistiert () != null && $loginResult->getBenutzername() !=null) {
				
				$view = new View('default_index');
				$view->title = 'Anmeldung fehlgeschlagen';
				$view->heading = '';
				$view->tablogin = true;
				$view->display();
				
			
				$_SESSION ["benutzername"] = $loginResult->getBenutzername ();
				
				echo "<script> alert('Sie sind eingloggt als: " . $loginResult->getBenutzername() . "');</script>";
				
			} else {
				$view = new View('default_index');
				$view->title = 'Login Fehlgeschlagen';
				$view->heading = '';
				$view->tablogin = true;
				$view->display();
				
					
				echo "<script>document.getElementById('loginFehler').innerHTML = 'Login Fehlgeschlagen';
						document.getElementById('login').click();
		
					</script>";
				}
			}
		}
		
	public function registrieren() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			
			$email = htmlspecialchars ( $_POST ["email"] );
			
			$benutzername = htmlspecialchars ( $_POST ['benutzername'] );
			
			$passwort = htmlspecialchars ( $_POST ['password'] );
			
			
			$passwortWiederholen = htmlspecialchars ( $_POST ['reenterpassword'] );
			
			$computercheck = $_POST ['humancheck'];

		
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
}
?>