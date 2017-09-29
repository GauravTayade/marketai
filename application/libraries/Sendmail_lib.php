<?php
//namespace PHPMailer\PHPMailer;
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail_lib {
    
    public function sendmail($from=null,$to=null,$subject=null,$message=null)
    {
        $CI = & get_instance();
        $CI->load->helper('custom_helper');
        $CI->load->library('PHPMailer');
        
        if(getSetting('mailer') == 'phpmailer'){
            $mailer = new PHPMailer(true);
            $mailer->isSMTP();
            $mailer->SMTPAuth   = true;
            $mailer->SMTPDebug  = 1;
            $mailer->SMTPSecure = 'ssl';
            $mailer->Host       = 'smtp.gmail.com';
            $mailer->Username   = getSetting('smtp_user');
            $mailer->Password   = getSetting('smtp_pass');
            $mailer->Port       = getSetting('smtp_port');
            $mailer->isHTML(true);
            $mailer->From       = $mailer->Username;
            $mailer->FromName   = 'Market AI Admin Team';
            $mailer->addReplyTo($mailer->Username,'Admin Team');
            $mailer->AddAddress($to);
            $mailer->Subject    = $subject;
            $mailer->Body       = $message;
            if(!$mailer->send()){
                print_r($mailer->ErrorInfo);
            }
        }else{
            
            $config = array(
                'protocol'  => getSetting('smtp_protocol'),
                'smtp_host' => getSetting('smtp_host'),
                'smtp_port' => getSetting('smtp_port'),
                'smtp_user' => getSetting('smtp_user'),
                'smtp_pass' => getSetting('smtp_pass'),
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
}