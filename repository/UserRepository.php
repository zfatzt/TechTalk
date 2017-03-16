<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $kunde = 'user';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function benutzerErstellen($benutzerName, $email, $passwort)
    {
        $passwort = sha1($passwort);

        $sql = "INSERT INTO $this->kunde (benutzerName, email, passwort) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($sql);
        $statement->bind_param('ssss', $benutzerName, $email, $passwort);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
    
    public function anmelden($email, $passwort){
    	
    	$sql = "SELECT techtalk.kunde.email, techtalk.kunde.passwort, techtalk.kunde.benutzerName FROM techtalk.kunde where email=? and passwort=?";
    	
    	$statement = ConnectionHandler::getConnection()->prepare($sql);
    	
    	$statement->bind_param('ss', $email, $passwort);
    	
    	$statement->execute();
    	$result = $statement->get_result();
    	
    	
    	if (mysqli_num_rows($result) >0) {
    		echo "Sie sind nun eingeloggt";
    	}else{
    		echo "Email oder Passwort ist falsch oder existiert noch nicht. Bitte registrieren Sie sich.";
    	}
    	if (!$statement->execute()){
    		throw new Exception($statement->error);
    		
    	}
    }
}
?>
