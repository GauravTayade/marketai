<?php 

/**
* 
*/
class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getUser($data)
	{

		$this->db->where('email',$data);
		return $this->db->get('users')->row();

	}

	public function sendForgotPassword($data)
	{

		$this->db->where('email',$data);
		return $this->db->get('users')->row();

	}
}