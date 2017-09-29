<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class User extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');
	}


	public function index()
	{
		
	}

	public function getPage()
	{
		$data['pages'] = $this->input->post();
		$this->load->view('templates/common/partialdashpage',$data);

	}

	public function savePageList()
	{
		$pages_data = $this->input->post();
		$this->user->savePage($pages_data);

		$this->load->view('dashboard');

	}

	public function getCompititors()
	{
		$page_id = $this->input->post('fetch_page_id');
		$compititors = $this->user->getCompititors($page_id);
		echo json_encode($compititors);

	}

	public function compititorsPage()
	{
		$data['page_data'] = json_decode($this->input->post('page_data'),true);
		$this->load->view('templates/common/partialdashcompititorpage',$data);
	}

}