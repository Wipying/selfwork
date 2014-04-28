<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		$this->load->view('user/index');
	}

	public function register()
	{
		$this->load->view('user/register');
	}

	private function _post($varname)
	{
		if(isset($_POST[$varname]) && $_POST[$varname]) return $_POST[$varname];
		return '';
	}

	public function save(){
		$this->load->library('captcha');
		
			
			$secret_code = $this->_post('secret_code');
			$this->load->model('Product');
			$this->Product->setSecretCode($secret_code);
			
			
			if(!$this->Product->checkSecretCodeIsValid()){
				exit( json_encode(array('status'=>false, 'message'=>'Invalid secret code')) );
			}

			if($this->Product->checkSecretCodeIsRegistered()){
				exit( json_encode(array('status'=>false, 'message'=>'Already registered code')) );
			}

			
			exit('here');

		
		
		if($_POST){
			$userid = $password = '';
			if(isset($_POST['user']) && $_POST['user']){
				$userid = $_POST['user'];
				if(isset($_POST['password']) && $_POST['password']){
					$password = $_POST['password'];
					if(isset($_POST['password_confirm']) && $_POST['password_confirm']) 
						$password_confirm = $_POST['password_confirm'];
					if($password!=$password_confirm){
						$result = array('status'=>false, 'message'=>'Doesn not match confirm password');
					}else{
						if(strlen($password)<6){
							$result = array('status'=>false, 'message'=>'You need to enter 6 characters into password at least.');
						}else{
							$this->load->database();
							$query = $this->db->query("SELECT * FROM users where userid='$userid'");
							if($query->num_rows()>0){
								$result = array('status'=>false, 'message'=>'Already registered');
							}else{
								$sql = "insert into users set userid='$userid', password=password('$password')";
								if($this->db->simple_query($sql))
									$result = array('status'=>true, 'message'=>'Registered successfully');
								else
									$result = array('status'=>false, 'message'=>'Error while running db query');
							}
						}
					}
				}else
					$result = array('status'=>false, 'message'=>'No password');
				
			}
			else
				$result = array('status'=>false, 'message'=>'No user name');
			
		}else{
			$result = array('status'=>false);
		}
		echo json_encode($result);
	}
}

