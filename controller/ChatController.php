<?php
require '../repository/UserRepository.php';
require '../repository/ChatRepository.php';
require '../woerterConfig.php';
class ChatController {
	public function chatErstellen() {
		$name = $_GET ["name"];
		$chat_id = $_GET ["chat_id"];
		
		$_SESSION ["currentChatId"] = $chat_id;
		$_SESSION ["currentChatName"] = $name;
		
		$chat_id = intval ( $chat_id );
		$view = new View ( 'chat' );
		$view->title = $name . ' Chat';
		$view->heading = $name . ' Chat';
		$view->tablogin = true;
		if (isset ( $_SESSION ["benutzername"] )) {
			$view->username = $_SESSION ["benutzername"];
		}
		$view->active = 'chat';
		$view->name = $name;
		$view->chat_id = $chat_id;
		$userRepo = new UserRepository ();
		$alleUser = $userRepo->nutzerAuslesen ();
		$view->alleUser = $alleUser;
		$chatRepo = new ChatRepository ();
		$alleNachrichten = $chatRepo->textAuslesen ( $chat_id );
		$view->alleNachrichten = $alleNachrichten;
		$view->kunde_id = $_SESSION ["id"];
		$view->display ();
	}
	public function chatAktuallisieren() {
		if (! isset ( $_SESSION ["currentChatId"] )) {
			$_SESSION ["currentChatId"] = 1;
		}
		
		$view = new View ( 'chatBox' );
		$chatRepo = new ChatRepository ();
		$view->alleNachrichten = $chatRepo->textAuslesen ( intval ( $_SESSION ["currentChatId"] ) );
		;
		$view->showOnlyFile ();
	}
	public function chatSenden() {
		$chatRepo = new ChatRepository ();
		$damaligeZeit = $chatRepo->zeitAuslesen ( $_SESSION ["id"] );
		$timestampOld = strtotime ( $damaligeZeit );
		$zeit = new DateTime ();
		$timestamp = $zeit->getTimestamp ();
		$diff = $timestamp - $timestampOld;
		if ($diff > 3) {
			
			if (isset ( $_POST ["nachrichtText"] ) && ! empty ( $_POST ["nachrichtText"] )) {
				$config = new woerterConfig ();
				if (in_array ( $_POST ["nachrichtText"], $config->fluchwortArray () ) != false) {
					echo '<script>alert("Bitte keine Schimpfwörter!")</script>';
				} else {
					$view = new View ( 'chat' );
					$nachricht = $_POST ["nachrichtText"];
					$chatRepo = new ChatRepository ();
					$chat_id = $_GET ["chat_id"];
					$chat_id = intval ( $chat_id );
					$kunde_id = $_SESSION ["id"];
					$kunde_id = intval ( $kunde_id );
					$text_id = $chatRepo->textSpeichern ( $nachricht );
					$text_id = intval ( $text_id );
					$view->active = 'chat';
					$view->chat = $chatRepo->textZuordnen ( $text_id, $chat_id, $kunde_id );
					$name = $_GET ["name"];
				}
				$this->chatErstellen ();
			} else {
				$this->chatErstellen ();
			}
		} else {
			echo '<script>alert("Bitte diese Seite nicht spamen!")</script>';
			$this->chatErstellen ();
		}
	}
}
?>