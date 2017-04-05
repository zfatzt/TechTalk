<?php
class Dispatcher {
	public static function dispatch() {
		try {
			if (! isset ( $_SESSION )) {
				session_start ();
			}
			
			// Die URI wird aus dem $_SERVER Array ausgelesen und in ihre
			// Einzelteile zerlegt.
			// /user/index/foo --> ['user', 'index', 'foo']
			$uri = $_SERVER ['REQUEST_URI'];
			$uri = strtok ( $uri, '?' ); // Erstes ? und alles danach abschneiden
			$uri = trim ( $uri, '/' ); // Alle / am anfang und am Ende der URI abschneiden
			$uriFragments = explode ( '/', $uri ); // In einzelteile zerlegen
			                                    
			// Den Namen des gewünschten Controllers ermitteln
			try {
			$controllerName = 'DefaultController';
			if (! empty ( $uriFragments [0] )) {
				$controllerName = $uriFragments [0];
				$controllerName = ucfirst ( $controllerName ); // Erstes Zeichen grossschreiben
				$controllerName .= 'Controller'; // "Controller" anhängen
			}
			}catch (error $e){
				header("Location: /error");
			}
			
			// Den Namen der auszuführenden Methode ermitteln
			$method = 'index';
			if (! empty ( $uriFragments [1] )) {
				$method = $uriFragments [1];
			}
			
			// Den gewünschten Controller laden
			// Achtung! Hier stützt PHP ab, sollte der Controller nicht existieren
			$filename = "../controller/$controllerName.php";
			
			if (file_exists($filename)){
			require_once $filename;
			}
			// Eine neue Instanz des Controllers wird erstellt und die gewünschte
			// Methode darauf aufgerufen.
			$controller = new $controllerName ();
			$controller->$method ();
		}catch (Error $e){
			header("Location: /error");
		}
	}
}
