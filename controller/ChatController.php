<?php
require '../repository/UserRepository.php';
require '../repository/ChatRepository.php';
class ChatController {
	public function chatErstellen() {
		$name = $_GET ["name"];
		$chat_id = $_GET ["chat_id"];
		$chat_id = intval($chat_id);
		$view = new View ( 'chat' );
		$view->title = $name . ' Chat';
		$view->heading = $name . ' Chat';
		$view->tablogin = true;
		if (isset($_SESSION["benutzername"])){
			$view->username = $_SESSION["benutzername"];
		}
		$view->name = $name;
		$view->chat_id = $chat_id;
		$userRepo = new UserRepository ();
		$alleUser = $userRepo->nutzerAuslesen ();
		$view->alleUser = $alleUser;
		$chatRepo = new ChatRepository ();
		$alleNachrichten = $chatRepo->textAuslesen ( $chat_id );
		$view->alleNachrichten = $alleNachrichten;
		$view->display ();
	}
	public function chatSenden() {
		if (isset ( $_POST ["nachrichtText"] ) && ! empty ( $_POST ["nachrichtText"] )) {
			$view = new View ( 'chat' );
			$nachricht = $_POST ["nachrichtText"];
			$chatRepo = new ChatRepository ();
			$chat_id = $_GET ["chat_id"];
			$chat_id = intval($chat_id);
			$text_id = $chatRepo->textSpeichern ( $nachricht );
			$text_id = intval($text_id);
			$view->chat = $chatRepo->textZuordnen ( $text_id, $chat_id );
			$name = $_GET ["name"];
			$this->chatErstellen ();
		} else {
			$this->chatErstellen ();
		}
	}
}
?>