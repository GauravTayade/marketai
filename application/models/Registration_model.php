<?php

/**
* 
*/
class Registration_model extends CI_Model
{
	
	function __construct()
	{
			
		parent::__construct();

	}

	public function checkUserEmail($email){

		$this->db->where('email',$email);
		$this->db->get('users');
		return $this->db->affected_rows();
	}

	public function register($data){
		
		$this->db->insert('users',$data);
		return $this->db->affected_rows();
	}

	public function activateAccountCheck($email,$token)
	{
		$this->db->select('email,activation_token');
		$this->db->where('email',$email);
		return $this->db->get('users')->row();

	}

	public function activateAccount($email,$token)
	{
		$this->db->where('email',$email);
		$this->db->where('activation_token',$token);
		$this->db->update('users',array('active' => 1));
		return $this->db->affected_rows();

	}
}