<?php
require '../repository/UserRepository.php';
require '../repository/ChatRepository.php';
class ChatController {
	public function chatErstellen() {
		$name = $_GET ["name"];
		$chat_id = $_GET["chat_id"];
		
		$view = new View ( 'chat' );
		$view->title = $name . ' Chat';
		$view->heading = $name . ' Chat';
		$view->tablogin = true;
		$view->name = $name;
		$view->chat_id =$chat_id;
		
		$userRepo = new UserRepository ();
		$alleUser = $userRepo->nutzerAuslesen ();
		$view->alleUser = $alleUser;
		
		$chatRepo = new ChatRepository ();
		$alleNachrichten = $chatRepo->textAuslesen ($chat_id);
		$view->alleNachrichten = $alleNachrichten;
		$view->display ();
	}
	public function chatSenden() {
		if (isset ( $_POST ["nachrichtText"] ) && ! empty ( $_POST ["nachrichtText"] )) {
			$view = new View ( 'chat' );
			$nachricht = $_POST ["nachrichtText"];
			$chatRepo = new ChatRepository ();
			$chat_id = $_GET ["chat_id"];
			$view->text_id = $chatRepo->textSpeichern ( $nachricht, $chat_id );
			$name = $_GET ["name"];
			$this->chatErstellen ();
		} else {
			$this->chatErstellen ();
		}
	}
}
?>