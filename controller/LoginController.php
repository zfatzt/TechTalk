<?php
class LoginController {
	public function anmelden() {
		$view = new View ( 'login_anmelden' );
		$view->title = 'Login';
		$view->heading = 'Login';
		$view->display ();
	}
}


?>