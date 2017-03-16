<?php
class ChatController {
	public function bitcoin() {
		$view = new View ( 'chat_bitcoin' );
		$view->title = 'Bitcoin Chat';
		$view->heading = 'Bitcoin Chat';
		$view->display ();
	}
	
	public function drone(){
		$view = new View ( 'chat_drone' );
		$view->title = 'Drone Chat';
		$view->heading = 'Drone Chat';
		$view->display ();
	}

}


?>