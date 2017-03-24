<?php
require '../repository/UserRepository.php';
require '../repository/ChatRepository.php';

class ChatController {
	public function chatErstellen() {
		$name = $_GET ["name"];
		
		$view = new View ( 'chat' );
		$view->title = $name . ' Chat';
		$view->heading = $name . ' Chat';
		$view->tablogin = true;
		$view->name = $name;
		
		$userRepo = new UserRepository ();
		$alleUser = $userRepo->nutzerAuslesen ();
		$view->alleUser = $alleUser;
		
		$chatRepo = new ChatRepository ();
		$alleNachrichten = $chatRepo->textAuslesen ();
		$view->alleNachrichten = $alleNachrichten;
		$view->display ();
	}
	public function chatSenden() {
		if (isset ( $_POST ["nachrichtText"] ) && ! empty ( $_POST ["nachrichtText"] )) {
			$view = new View ( 'chat' );
			$nachricht = $_POST ["nachrichtText"];
			$chatRepo = new ChatRepository ();
			$view->nachricht = $chatRepo->textSpeichern ( $nachricht );
			$name = $_GET ["name"];
			$this->chatErstellen ();
		} else {
			$this->chatErstellen ();
		}
	}
}
?>