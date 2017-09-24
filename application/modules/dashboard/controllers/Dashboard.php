<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$this->load->view('templates/common/header');
		$this->load->view('templates/common/dashboard');
		$this->load->view('templates/common/footer');

	}

}