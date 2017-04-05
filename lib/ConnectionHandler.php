<?php
class ConnectionHandler {
	private static $connection = null;
	public static function getConnection() {
		
		// Konfigurationsdatei auslesen
		$config = require '../config.php';
		$host = $config ['database'] ['host'];
		$username = $config ['database'] ['username'];
		$password = $config ['database'] ['password'];
		$database = $config ['database'] ['database'];
		
		// Verbindung initialisieren
		self::$connection = new MySQLi ( $host, $username, $password, $database );
		if (self::$connection->connect_error) {
			header ( "location: /error" );
		}
		
		self::$connection->set_charset ( 'utf8' );
		
		// Verbindung zurückgeben
		return self::$connection;
	}
}
