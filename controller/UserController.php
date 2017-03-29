<?php
require_once '../repository/UserRepository.php';
require_once '../repository/LoginResult.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController {
	public function index() {
		$userRepository = new UserRepository ();
		
		$view = new View ( 'index' );
		$view->title = 'Startseite';
		$view->heading = 'Startseite';
		$view->users = $userRepository->readAll ();
		$view->display ();
	}
	public function meinProfil() {
		$view = new View ( 'meinProfil' );
		$view->title = 'Mein Profil';
		$view->heading = 'Mein Profil';
		$view->tablogin = true;
		if (isset ( $_SESSION ['benutzername'] )) {
			$view->username = $_SESSION ['benutzername'];
		}
		$view->display ();
	}
	public function profilBearbeiten() {
		if (isset ( $_POST ["accountBearbeitenEmail"] )) {
			$neueEmail = $_POST ["accountBearbeitenEmail"];
		} else {
			$neueEmail = $_SESSION ["email"];
		}
		
		if (isset ( $_POST ["accountBearbeitenBenutzername"] )) {
			$neuerBenutzername = $_POST ["accountBearbeitenBenutzername"];
		} else {
			$neuerBenutzername = $_SESSION ["benutzername"];
		}
		
		if (isset ( $_POST ["accountBearbeitenPasswort"] )) {
			$neuesPasswort = $_POST ["accountBearbeitenPasswort"];
		} else {
			$neuesPasswort = $_SESSION ["passwort"];
		}
		
		if (isset ( $_POST ["accountBearbeitenPasswortWiederholen"] )) {
			$neuesPasswortWiederholen = $_POST ["accountBearbeitenPasswortWiederholen"];
		}
		
		if (filter_var ( $neueEmail, FILTER_VALIDATE_EMAIL )) {
			if ($neuesPasswort === $neuesPasswortWiederholen) {
				$neuesPasswort = sha1 ( $neuesPasswort );
				$_SESSION ["passwort"] = $neuesPasswort;
				$_SESSION ["email"] = $neueEmail;
				$_SESSION ["benutzername"] = $neuerBenutzername;
				
				$UserRepositroy = new UserRepository ();
				$UserRepositroy->benutzerBearbeiten ( $_SESSION ["id"], $_SESSION ["benutzername"], $_SESSION ["passwort"], $_SESSION ["email"] );
				
				header ( "Location: /" );
			} else {
				
				$view = new View ( 'meinProfil' );
				$view->title = 'bearbeitung Fehlgeschlagen';
				$view->heading = '';
				$view->tablogin = true;
				$view->display ();
				
				echo "<script>document.getElementById('bearbeiteWarnung').innerHTML = 'Bitte beachten Sie die genannten Vorschriften.';
					</script>";
			}
		} else {
			
			$view = new View ( 'meinProfil' );
			$view->title = 'bearbeitung Fehlgeschlagen';
			$view->heading = '';
			$view->tablogin = true;
			$view->display ();
			
			echo "<script>document.getElementById('bearbeiteWarnung').innerHTML = 'Bitte beachten Sie die genannten Vorschriften.';
					</script>";
		}
	}
	public function profilLoeschen() {
		$userRepository = new UserRepository ();
		$userRepository->deleteById ( $_SESSION ['id'] );
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
}