<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	
	public function index()
	{
		$this->load->view('chart/index');
	}

	public function bar()
	{
		$this->load->view('chart/bar');
	}
	public function doughnut()
	{
		$this->load->view('chart/doughnut');
	}
	public function geographical()
	{
		$this->load->view('chart/geographical');
	}
	public function line()
	{
		$this->load->view('chart/line');
	}
	public function pie()
	{
		$this->load->view('chart/pie');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */