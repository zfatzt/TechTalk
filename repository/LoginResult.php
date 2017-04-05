<?php
class LoginResult {
	private $benutzerExistiert;
	private $benutzerKannEinloggen;
	private $benutzername;
	private $email;
	private $passwort;
	private $id;
	public function setBenutzername($benutzername) {
		$this->benutzername = $benutzername;
	}
	public function setPasswort($passwort) {
		$this->passwort = $passwort;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getBenutzername() {
		return $this->benutzername;
	}
	public function getPasswort() {
		return $this->passwort;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getId() {
		return $this->id;
	}
	public function setBenutzerExistiert($benutzerExistiert) {
		$this->benutzerExistiert = $benutzerExistiert;
	}
	public function getBuntzerExistiert() {
		return $this->benutzerExistiert;
	}
	public function setBenutzerKannEinloggen($benutzerKannEinloggen) {
		$this->benutzerKannEinloggen = $benutzerKannEinloggen;
	}
	public function getBuntzerKannEinloggen() {
		return $this->benutzerKannEinloggen;
	}
}
?>
