<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$this->load->view('main/index');
	}

	public function execute_sql(){
		//exit(file_get_contents("./system/sql/sql.txt"));
		$fp = fopen("./system/sql/sql.txt","r");
		$this->load->database();
		while(feof($fp)){
			$this->db->simple_query(fgets($fp));
		}
		fclose($fp);
	}
}

