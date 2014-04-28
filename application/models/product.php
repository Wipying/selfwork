<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Model {

	var $secret_code;

    function __construct()
    {
        parent::__construct();
		
    }

	public function setSecretCode($secret_code){
		if($this->_checkOldSecretCode())
			$secret_code = $this->_convertSecretCode($secret_code);
		$this->secret_code = $secret_code;
	}

	public function checkSecretCodeIsValid(){
		return true;
	}

	public function checkSecretCodeIsRegistered(){
		return false;
	}

	public function checkSecretCodeIsRegistered(){
		return false;
	}

	private function _checkOldSecretCode(){
		true;
	}

	private function _convertSecretCode($secret_code){
		return $secret_code;
	}
}

