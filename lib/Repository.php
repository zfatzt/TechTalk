<?php
require_once 'ConnectionHandler.php';

class Repository {

	protected $kunde = null;
	
	public function readById($id) {
		// Query erstellen
		$query = "SELECT * FROM {$this->kunde} WHERE id=?";
		
		// Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
		// und die Parameter "binden"
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'i', $id );
		
		// Das Statement absetzen
		$statement->execute ();
		
		// Resultat der Abfrage holen
		$result = $statement->get_result ();
		if (! $result) {
			throw new Exception ( $statement->error );
		}
		
		// Ersten Datensatz aus dem Reultat holen
		$row = $result->fetch_object ();
		
		// Datenbankressourcen wieder freigeben
		$result->close ();
		
		// Den gefundenen Datensatz zurückgeben
		return $row;
	}
	
	public function deleteById($id) {
		$query = "DELETE FROM {$this->kunde} WHERE id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		$statement->bind_param ( 'i', $id );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
	}
}
