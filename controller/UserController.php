<?php
require_once '../repository/UserRepository.php';
require_once '../repository/LoginResult.php';
class UserController {
	public function meinProfil() {
		$view = new View ( 'meinProfil' );
		$view->title = 'Mein Profil';
		$view->heading = 'Mein Profil';
		$view->tablogin = true;
		if (isset ( $_SESSION ['benutzername'] )) {
			$view->username = $_SESSION ['benutzername'];
		}
		$view->active = 'meinProfil';
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
		
		if (isset ( $_POST ["accountBearbeitenPasswort"] ) && ! $_POST ["accountBearbeitenPasswort"] == "") {
			$neuesPasswort = $_POST ["accountBearbeitenPasswort"];
		} else {
			$neuesPasswort = $_SESSION ["passwort"];
		}
		
		if (isset ( $_POST ["accountBearbeitenPasswortWiederholen"] ) && ! $_POST ["accountBearbeitenPasswort"] == "") {
			$neuesPasswortWiederholen = $_POST ["accountBearbeitenPasswortWiederholen"];
		} else {
			$neuesPasswortWiederholen = $_SESSION ["passwort"];
		}
		$laengePasswort = strlen ( $neuesPasswort );
		$laengeBenutzername = strlen ( $neuerBenutzername );
		
		if (filter_var ( $neueEmail, FILTER_VALIDATE_EMAIL )) {
			if (isset ( $neuesPasswort ) && $laengePasswort > 3 && $laengeBenutzername >= 3) {
				if ($neuesPasswort === $neuesPasswortWiederholen) {
					$neuesPasswort = sha1 ( $neuesPasswort );
					$_SESSION ["passwort"] = $neuesPasswort;
					$_SESSION ["email"] = $neueEmail;
					$_SESSION ["benutzername"] = $neuerBenutzername;
					
					$UserRepositroy = new UserRepository ();
					$UserRepositroy->benutzerBearbeiten ( $_SESSION ["id"], $_SESSION ["benutzername"], $_SESSION ["passwort"], $_SESSION ["email"] );
					
					header ( "Location: /" );
				}
			} else {
				
				$view = new View ( 'meinProfil' );
				$view->title = 'bearbeitung Fehlgeschlagen';
				$view->heading = '';
				$view->tablogin = true;
				$view->active = 'meinProfil';
				$view->display ();
				
				echo "<script>document.getElementById('bearbeiteWarnung').innerHTML = 'Bitte beachten Sie die genannten Vorschriften.';
					</script>";
			}
		} else {
			
			$view = new View ( 'meinProfil' );
			$view->title = 'bearbeitung Fehlgeschlagen';
			$view->heading = '';
			$view->tablogin = true;
			$view->active = 'meinProfil';
			$view->display ();
			
			echo "<script>document.getElementById('bearbeiteWarnung').innerHTML = 'Bitte beachten Sie die genannten Vorschriften.';
					</script>";
		}
	}
	public function profilLoeschen() {
		$userRepository = new UserRepository ();
		$userRepository->deleteById ( $_SESSION ['id'] );
		header ( 'Location: /' );
	}
}