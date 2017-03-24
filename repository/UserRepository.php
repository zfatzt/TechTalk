<?php
require_once '../lib/Repository.php';
class UserRepository extends Repository {
	protected $kunde = 'user';
	public function benutzerErstellen($benutzername, $email, $passwort) {
		$passwort = sha1 ( $passwort );
		
		$sql = "INSERT INTO techtalk.kunde (benutzername, email, passwort) VALUES (?, ?, ?)";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		$statement->bind_param ( 'sss', $benutzername, $email, $passwort );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		
		return $statement->insert_id;
	}
	public function existiertNutzer($email, $passwort) {
		$sql = "SELECT id, email, passwort, benutzername FROM techtalk.kunde where email=? and passwort=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		$passwort = sha1 ( $passwort );
		
		$statement->bind_param ( 'ss', $email, $passwort );
		
		$statement->execute ();
		
		$result = $statement->get_result ();
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		
		$row = $result->fetch_assoc ();
		$benutzername = $row ["benutzername"];
		$id = $row ["id"];
		
		$loginResult = new LoginResult ();
		$loginResult->setBenutzerExistiert ( true );
		$loginResult->setBenutzerKannEinloggen ( true );
		$loginResult->setBenutzername ( $benutzername );
		$loginResult->setId ( $id );
		$loginResult->setPasswort ( $passwort );
		$loginResult->setEmail ( $email );
		return $loginResult;
	}
	public function nutzerAuslesen() {
		$sql = "SELECT techtalk.kunde.benutzername FROM techtalk.kunde";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $sql );
		
		$statement->execute ();
		
		$result = $statement->get_result ();
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		$userString = "";
		if ($result->num_rows > 0) {
			// output data of each row
			while ( $row = $result->fetch_assoc () ) {
				$userString = $userString . $row ["benutzername"] . "<br>";
			}
			return $userString;
		} else {
			return "0 results";
		}
	}
}
?>