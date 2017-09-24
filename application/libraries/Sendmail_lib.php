<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail_lib {

	public function sendmail($from=null,$to=null,$subject=null,$message=null)
	{

        $CI = & get_instance();
        $CI->load->helper('custom_helper');

		$config = array(
            'protocol'  => getSetting('smtp_protocol'),
            'smtp_host' => getSetting('smtp_host'),
            'smtp_port' => getSetting('smtp_port'),
            'smtp_user' => getSetting('smtp_user'),
            'smtp_pass' => getSetting('smtp_pass'),

     		/*'protocol'   => 'smtp',
     		'smtp_host'  => 'ssl://smtp.googlemail.com',
     		'smtp_port'  => 465,
     		'smtp_user'  => 'demolast645@gmail.com', 
     		'smtp_pass'  => 'demo1admin',*/ 
     		'mailtype'   => 'html',
     		'charset'    => 'iso-8859-1',
  		);
        
  		$CI->load->library('email', $config);
      
  		$CI->email->set_newline("\r\n");
  		if(isset($from)){
  			$CI->emial->from($from);
  		}else{
  			$CI->email->from(getSetting('smtp_user'), "Admin Team");
  		}

  		if(isset($to)){
  			$CI->email->to($to);
  		}else{
  			$CI->email->to($user_data['email']);  
  		}

  		if(isset($subject)){
  			$CI->email->subject($subject);
  		}else{
  			$CI->email->subject("Email Verification");
  		}

  		if(isset($message)){
  			$CI->email->message($message);
  		}else{
  			$link = site_url('registration/verifyemail/').$user_data['email'].'/'.$user_data['activation_token'];
  			$message = "Dear User,\nPlease click on below URL or paste into your browser to verify your Email Address\n\n <a target='_blank' href='".$link."'>verify email</a>\n"."\n\nThanks\nAdmin Team" ;
  			$CI->email->message($message);
  		}
  		
  		$CI->email->send();	

	}
        
}