
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
		if (isset ( $_SESSION ['benutzername'] )) {
			$view->username = $_SESSION ['benutzername'];
		}
		$view->display ();
	}
	public function meinProfilBearbeitetn() {
	}
	public function delete() {
		$userRepository = new UserRepository ();
		$userRepository->deleteById ( $_GET ['id'] );
		
		// Anfrage an die URI /user weiterleiten (HTTP 302)
		header ( 'Location: /user' );
	}
}