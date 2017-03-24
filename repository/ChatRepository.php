<?php
require_once '../lib/Repository.php';
class ChatRepository extends Repository {
	public function textAuslesen($id) {
		$sql = "SELECT text FROM techtalk.text join chat_text_user on chat_text_user.text_id=text.id where chat_text_user.chat_id=? ";
		
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
				$textString = $textString . $row ["text"] . "<br>";
			}
			return $textString;
		} else {
			return "-keine Nachrichten-";
		}
	}
	public function textSpeichern($text, $id) {
		$sql = "INSERT INTO techtalk.text (text) VALUES (?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		$statement->bind_param ( 's', $text );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		
		return $statement->insert_id;
	}
}
?>