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
		$view->title = 'Anmeldung';
		$view->heading = 'Startseite';
		$view->display ();
	}

	public function delete() {
		$userRepository = new UserRepository ();
		$userRepository->deleteById ( $_GET ['id'] );
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
}
