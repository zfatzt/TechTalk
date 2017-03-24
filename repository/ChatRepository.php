<?php
require_once '../lib/Repository.php';
class ChatRepository extends Repository {
	public function textAuslesen() {
		$sql = "SELECT techtalk.text.text FROM techtalk.text";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
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
			return "0 results";
		}
	}
	public function textSpeichern($text) {
	
		$sql = "INSERT INTO techtalk.text (text) VALUES (?)";
	
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
	
		$statement->bind_param ( 's', $text);
	
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	
		return $statement->insert_id;
	}
}
?>