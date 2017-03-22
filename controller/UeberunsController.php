<?php
class UeberunsController {
	public function ueberuns() {
		$view = new View ( 'ueberuns' );
		$view->title = 'Über uns';
		$view->heading = 'Über uns';
		$view->tablogin = true;
		$view->display ();
	}
}

?>
