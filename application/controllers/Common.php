<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
	public function index()
	{
		$this->load->view('common/index');
	}

	public function showcaptchaimage($param){
		$this->load->library("captcha");
		$this->captcha->showimage();
		exit();
	}

	public function getpwdstrength($pwd){
		echo json_encode(
			array(
				'percent'=>intval(100*(strlen($pwd)/12))
			)
		);
	}
}

