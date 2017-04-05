<?php
require_once '../repository/UserRepository.php';
require_once '../repository/LoginResult.php';
class UeberpruefungController {
	public function anmelden() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			
			$email = htmlspecialchars ( $_POST ["anmeldeEmail"] );
			$passwort = htmlspecialchars ( $_POST ['anmeldePasswort'] );
			
			$_SESSION ['passwort'] = $passwort;
			
			$userRepository = new UserRepository ();
			$loginResult = $userRepository->existiertNutzer ( $email, $passwort );
			if ($loginResult->getBuntzerExistiert () != null && $loginResult->getBenutzername () != null) {
				
				$_SESSION ['benutzername'] = $loginResult->getBenutzername ();
				$_SESSION ['id'] = $loginResult->getId ();
				$_SESSION ['email'] = $loginResult->getEmail ();
				$_SESSION ['eingabe'] = "";
				header ( "Location: /" );
			} else {
				
				$view = new View ( 'default_index' );
				$view->title = 'Anmeldung Fehlgeschlagen';
				$view->heading = '';
				$view->tablogin = true;
				$view->active = 'home';
				$view->display ();
				
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
			
			if ($passwort === $passwortWiederholen && $computercheck == "human" && strlen($benutzername) >= 3 && strlen($passwort) > 5){
				$userRepository = new UserRepository ();
				$userRepository->benutzerErstellen ( $benutzername, $email, $passwort );
				header ( "Location: /" );
				exit ();
			} else {
				$view = new View ( 'default_index' );
				$view->title = 'Anmeldung fehlgeschlagen';
				$view->heading = '';
				$view->tablogin = false;
				$view->active = 'home';
				$view->display ();
				
				echo "<script>document.getElementById('serverWarnung').innerHTML = 'Bitte beachten Sie die genannten Vorschriften.';
					document.getElementById('login').click();
					</script>";
			}
		}
	}
}
?>