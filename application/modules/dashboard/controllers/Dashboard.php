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
		$this->load->model('user/user_model','user');
	}

	public function index()
	{
		$data['user_pages'] = $this->user->getPageList();
		$this->load->view('templates/common/dashboard',$data);

	}

}