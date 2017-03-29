<?php
require_once '../lib/Repository.php';
class ChatRepository extends Repository {
	public function textAuslesen($id) {
		$userRepo = new UserRepository ();
		$userRepo->nutzerAuslesen ();
		
		$sql = "SELECT text, kunde_id FROM techtalk.text join chat_text_user on chat_text_user.text_id=text.id where chat_text_user.chat_id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		$statement->bind_param ( 'i', $id );
		
		$statement->execute ();
		
		$result = $statement->get_result ();
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$textString = "";
		if ($result->num_rows > 0) {
			// output data of each row
			while ( $row = $result->fetch_assoc () ) {
				$textString = $textString . "<strong>".$userRepo->kundennameAuslesen($row["kunde_id"]). ":</strong> " . $row ["text"] . "<br>";
			}
			return $textString;
		} else {
			return "-keine Nachrichten-";
		}
	}
	public function textSpeichern($text) {
		$sql = "INSERT INTO techtalk.text (text) VALUES (?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		$statement->bind_param ( 's', $text );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		
		return $statement->insert_id;
	}
	public function textZuordnen($text_id, $chat_id, $kunde_id) {
		$sql = "INSERT INTO techtalk.chat_text_user (chat_id, text_id, kunde_id) VALUES (?, ?, ?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		$statement->bind_param ( 'iii', $chat_id, $text_id, $kunde_id );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	}
}
?>