<?php
require_once 'ConnectionHandler.php';
class Repository {
	protected $kunde = null;
	public function deleteById($id) {
		$query = " Delete from chat_text_user where kunde_id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		
		$statement->bind_param ( 'i', $id );
		
		if (! $statement->execute ()) {
			throw new Exception ( "Unsere Server sind zurzeit Offline. Wir bitten Sie um entschuldigung" );
		}
		Repository::deleteById2 ( $id );
	}
	public function deleteById2($id) {
		$query = "DELETE FROM kunde WHERE id=?";
		
		$statement = ConnectionHandler::getConnection ()->prepare ( $query );
		
		$statement->bind_param ( 'i', $id );
		
		if (! $statement->execute ()) {
			throw new Exception ( "Unsere Server sind zurzeit Offline. Wir bitten Sie um entschuldigung" );
		}
	}
}
