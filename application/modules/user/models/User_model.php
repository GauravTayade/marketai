<?php 

/**
* 
*/
class User_model extends CI_Model
{

	public function getPageList()
	{

		$this->db->from('pages');
		$this->db->where('user_id',$this->session->userdata('user_id'));
		return $this->db->get()->result();
	}

	public function savePage($data)
	{

		foreach ($data['pages'] as $page) {
			$page_array = explode('->', $page);
			$page_data = array(
				'fb_page_id' => $page_array['0'],
				'user_id'	 => $this->session->userdata['user_id'],
				'page_name'  => $page_array['1']
				);
			$this->db->insert('pages',$page_data);
			$page_id  = $this->db->insert_id();
			$this->saveCompititors($page_id,$data['compititors']);
		}

	}

	public function saveCompititors($page_id,$compititors)
	{

		foreach ($compititors as $compititor) {
			$compititor_array = array(
				'page_id'		  => $page_id,
				'compititor_link' => $compititor
				);
			$this->db->insert('compititors',$compititor_array);
		}

	}

	public function getCompititors($page_id)
	{
		$this->db->where('page_id',$page_id);
		return $this->db->get('compititors')->result();
	}

}