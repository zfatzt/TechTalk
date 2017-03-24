<?php
class LoginResult {
	private $benutzerExistiert;
	private $benutzerKannEinloggen;
	private $benutzername;
	
	
	public function setBenutzername($benutzername) {
		$this->benutzername = $benutzername;
	}
	
	public function getBenutzername() {
		return $this->benutzername;
	}
	
	public function setBenutzerExistiert($benutzerExistiert){
		$this->benutzerExistiert = $benutzerExistiert;
	}
	
	
	public function getBuntzerExistiert() {
		return $this->benutzerExistiert;
	}
	
	public function setBenutzerKannEinloggen($benutzerKannEinloggen){
		$this->benutzerKannEinloggen = $benutzerKannEinloggen;
	}
	
	
	public function getBuntzerKannEinloggen() {
		return $this->benutzerKannEinloggen;
	}
	
	
	
	
}

?>