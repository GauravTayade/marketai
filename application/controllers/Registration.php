<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Registration extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('registration_model','registration');
	}

	public function register()
	{
		$this->load->library('encryption');
		$this->load->model('registration_model','registration');

		if($this->input->server('REQUEST_METHOD') == 'POST'){
				$check_user_exists = $this->registration->checkUserEmail($this->input->post('email'));
				if(!empty($check_user_exists)){
					$return  =array('response' => 0, 'warning' => "Email already exists");
				}else{
			
				$user_data = array(
					'name'		=>$this->input->post('username'),
					'email' 	=>$this->input->post('email'),
					'password' 	=>$this->encryption->encrypt($this->input->post('password')),
					'activation_token' => random_string('alnum', 36)
				);
			
				$result = $this->registration->register($user_data);

				$this->load->library('sendmail_lib');
				$from = null;
				$to = $user_data['email'];
				$subject = "Your account activation link";
				$link = site_url('registration/verifyemail/').$user_data['email'].'/'.$user_data['activation_token'];
  				$message = "Dear User,\nPlease click on below URL or paste into your browser to verify your Email Address\n\n <a target='_blank' href='".$link."'>verify email</a>\n"."\n\nThanks\nAdmin Team" ;
				$this->sendmail_lib->sendmail($from,$to,$subject,$message);
				
				if($result > 0){
					$return = array('response' => 1 , 'success'=> 'Record Successfully Inserted. Please check your inbox for account activation');
				}else{
					$return = array('response' => 0, 'warning' => 'oops! Something went wrong.');
				}
			}
		}

		echo  json_encode($return);

	}

	public function verifyemail($email,$token){

		$check_user_exists = $this->registration->activateAccountCheck($email,$token);

		if(!empty($check_user_exists)){
			$is_activated = $this->registration->activateAccount($email,$token);
			
			if(!empty($is_activated) && $is_activated >0){
				$this->load->view('templates/registration/success');
			}else{
				$this->load->view('templates/registration/error');
			}
		}

	}

	public function index()
	{	

		$this->load->view('templates/registration/registration');

	}
}