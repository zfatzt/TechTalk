<?php
class KontaktController {
	public function kontakt() {
		$view = new View ( 'kontakt' );
		$view->title = 'Kontakt';
		$view->heading = 'Kontakt';
		$view->tablogin = true;
		if (isset ( $_SESSION ['benutzername'] )) {
			$view->username = $_SESSION ['benutzername'];
		}
		$view->active = 'kontakt';
		$view->display ();
	}
}
?> 