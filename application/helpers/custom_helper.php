<?php

if ( ! function_exists('getSetting')){ 

	function getSetting($settings_key) {
		$CI = &get_instance();
		   $CI->db->select('settings_value');
		   $CI->db->where('settings_key',$settings_key);
		$ret = $CI->db->get('settings')->row_array();
		return $ret['settings_value'];
	}

}

if( ! function_exists('is_login')){
	function is_login(){
		$CI = &get_instance();
		if(!empty($CI->session->userdata('is_login')))
		{
			redirect('dashboard');
		}
	}
}

if( ! function_exists('post')){

	function  post($key)
	{
		$CI = &get_instance();
		return $CI->input->post($key);
	}

}


if( ! function_exists('generate_random_string') ){

	function generate_random_string(){
		return random_string('alnum', 36);
	}

}