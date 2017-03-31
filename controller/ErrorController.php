<?php
require_once '../lib/ErrorView.php';
class ErrorController {
	public function index() {
		$view = new ErrorView( 'MainError' );
		$view->title = 'Error 404';
		$view->heading = 'Error 404';
		$view->display ();
	}
}