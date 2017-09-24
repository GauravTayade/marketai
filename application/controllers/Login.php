<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Login extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		is_login();
		$this->load->view('templates/login/login');

	}

	public function verify()
	{

		$this->load->library('encryption');
		$this->load->model('Login_model','login');

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
			$login_check = $this->login->getUser($this->input->post('username'));
			
			if(!empty($login_check))
			{
				if($login_check->active == "1"){

					if($this->input->post('password') == $this->encryption->decrypt($login_check->password))
					{
						//set cookies
						if($this->input->post('remember'))
						{
							
							$marketai_username = array(
								'name'	=> 'marketai_username', 
								'value' => $this->input->post('username'),
								'expire'=> 84600*365,
								'secure'=> false
								);
							$marketai_password = array(
								'name'	=> 'marketai_password',
								'value' => $this->input->post('password'),
								'expire'=> 84600*365,
								'secure'=> false
								);
							$this->input->set_cookie($marketai_username);
							$this->input->set_cookie($marketai_password);

						}
						$user_data = array(
							'username' 	=> $login_check->name,
							'email' 	=> $login_check->email,
							'is_login'  => 1
							);
						$this->session->set_userdata($user_data);
						$return = array('response' => 1, 'redirect' => site_url('dashboard'));
					}else{
						$return = array('response' => 0, 'warning' => "Please check you account credentials");
					}

				}else{
					$return = array('response' => 0 , 'warning' => "Your account in not activated yet, Please Click on sent activation link");
				}
			}else{
				$return = array('response' => 0, 'warning' => "Please register with us to access our site");
			}

		}

		echo json_encode($return);

	}

	public function forgot()
	{
		$this->load->view('templates/login/forgot');
	}

	public function forgotSend()
	{
		
		$this->load->model('Login_model','login');
		$is_user_exists = $this->login->sendForgotPassword($this->input->post('user_email'));
		
		if(!empty($is_user_exists)){

			$this->load->library('sendmail_lib');
			$subject = "Reset Password";
			$message = 'test forgot password message';
			$this->sendmail_lib->sendmail(null,$is_user_exists->email,$subject,$message);

			$return = array('response' => 1, 'success' => 'We have sent you mail with password reset instruction');
		}else{
			$return = array('response' => 0, 'warning' => 'This user does not exists');
		}

		echo  json_encode($return);

	}

	public function withFacebook()
	{

		$this->load->library('encryption');
		$this->load->model('Registration_model','registration');
		$this->load->model('Login_model','login');
		$this->load->library('sendmail_lib');

		$login_check = $this->registration->checkUserEmail($this->input->post('email'));

		if(!empty($login_check)){
	
			$user_info = $this->login->getUser($this->input->post('email'));

			$user_data = array(
				'username' 	=> $user_info->name,
				'email' 	=> $user_info->email,
				'is_login'  => 1
			);

			$this->session->set_userdata($user_data);
			die();
			$return = array('response' => 1, 'redirect' => site_url('dashboard'));

		}else{

			$data = array(
				'name' 		=> post('name'),
				'email'		=> post('email'),
				'password'	=> $this->encryption->encrypt(generate_random_string()),
				'active'	=> 1
			);

			$registration_check = $this->registration->register($data);
				
			if(!empty($registration_check))
			{
				$subject = "Welcome to marketAI";
				$password = $this->encryption->decrypt($data['password']);
				$message = "Your username and password are as follows: <br/> username:".$data['email'] ."<br/>password:".$password." <br/> Thank You, <br/>Admin Team";

				$this->sendmail_lib->sendmail(
					getSetting('user'),
					$data['email'],
					$subject,
					$message
				);

				$return = array('response' => 1, 'success' => "Your account has been created", 'redirect' => site_url('dashboard'));
			}else{
				$return = array('response' => 0, 'warning' => 'Something went wrong');
			}
		}

		echo json_encode($return);

	}

	public function logout(){

		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('is_login');

		redirect('/');

	}
}