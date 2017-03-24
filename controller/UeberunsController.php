<?php
class UeberunsController {
	public function ueberuns() {
		$view = new View ( 'ueberuns' );
		$view->title = 'Über uns';
		$view->heading = 'Über uns';
		$view->tablogin = true;
		if (isset($_SESSION['benutzername'])){
			$view->username = $_SESSION['benutzername'];
		}
		$view->display ();
	}
}

?>
