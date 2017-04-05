<?php
require_once '../lib/ErrorView.php';
class ErrorController {
	public function index() {
		$view = new ErrorView ( 'MainError' );
		$view->title = 'Error';
		$view->heading = 'Error';
		$view->display ();
	}
}
?>