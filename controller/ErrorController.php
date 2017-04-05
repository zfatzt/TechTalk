<?php
require_once '../lib/ErrorView.php';
class ErrorController {
	public function index() {
		$view = new ErrorView ( 'MainError' );
		$view->title = 'Error';
		$view->heading = 'Error';
		$view->display ();
	}
	public function connection() {
		$view = new ErrorView ( 'ConnectionError' );
		$view->title = 'Error';
		$view->heading = 'Error';
		$view->display ();
	}
}