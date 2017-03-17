<?php
class LoginResult {
	public $benutzerExistiert = false;
	private $benutzerName;
	
	public function setUserName($benutzerName) {
		$this->benutzerName = $benutzerName;
	}
	
	public function getUserName() {
		return $benutzerName;
	}
	
	public function getBuntzerExistiert() {
		return $this->benutzerExistiert;
	}
	
}

?>