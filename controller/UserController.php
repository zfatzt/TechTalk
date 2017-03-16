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
	public function create() {
		$view = new View ( 'benutzer_erstellen' );
		$view->title = 'Benutzer erstellen';
		$view->heading = 'Benutzer erstellen';
		$view->display ();
	}
	public function anmelden() {
		$view = new View ( 'benutzer_anmelden' );
		$view->title = 'Startseite';
		$view->heading = 'Startseite';
		$view->display ();
	}

	public function benutzerErstellen() {
		if ($_SERVER ["REQUEST_METHOD"] == "POST") {
			if ($_POST ['send']) {
				$benutzername = $_POST ['benutzername'];
				if (empty ( $benutzername )) {
					$benutzerNameErr = "Bitte geben Sie einen Benutzernamen ein!";
				}
				
				$passwort = $_POST ['password'];
				if (empty ( $passwort )) {
					$passwortErr = "Bitte geben Sie ein Passwort ein!";
				}
				
				if (empty ( $_POST ["email"] )) {
					$emailErr = "Bitte geben Sie eine E-Mail Adresse ein!";
				} else {
					$email = $_POST ["email"];
					// check if e-mail address is well-formed
					if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
						$emailErr = "Bitte geben Sie eine gueltige E-Mail Adresse ein!";
					}
				}
				
				$userRepository = new UserRepository ();
				$userRepository->benutzerErstellen ( $benutzername, $email, $passwort );
			}
			
			header ( "Location: /" );
			exit ();
		}
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
	public function delete() {
		$userRepository = new UserRepository ();
		$userRepository->deleteById ( $_GET ['id'] );
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
}
