<?php
require_once 'ConnectionHandler.php';

class Repository {
	/**
	 * Damit die generischen Querys wisse, um welche Tabelle es sich handelt,
	 * gibt es diese Variabel.
	 * Diese muss in den konkreten Implementationen mit
	 * dem Tabellennamen überschrieben werden. (Siehe beispiel oben).
	 */
	protected $kunde = null;
	

	
	
	public function deleteById($id) {
		$query = " Delete from chat_text_user where kunde_id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		
		$statement->bind_param ( 'i', $id );
		
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		Repository::deleteById2($id);
	}
	
	public function deleteById2($id) {
		$query = "DELETE FROM kunde WHERE id=?";
	
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
	
		$statement->bind_param ( 'i', $id );
	
		if (! $statement->execute ()) {
			throw new Exception ( $statement->error );
		}
		
	}

}
