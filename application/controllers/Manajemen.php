<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen extends CI_Controller {

	public function index()
	{
		$this->load->view('dashboard1');
	}

	public function sales()
	{
		$this->load->view('manajemen_sales');
	}


}
