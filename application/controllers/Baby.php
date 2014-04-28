<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Baby extends CI_Controller {
	public function index()
	{
		$this->load->view('baby/index');
	}

}

