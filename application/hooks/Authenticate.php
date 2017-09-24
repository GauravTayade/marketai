<?php

class Authenticate
{
    function index() {
        
        $ci =& get_instance();
        
        $route = $ci->router->fetch_class().'/'.$ci->router->fetch_method();  
        
        $is_customer_login = $ci->session->userdata('is_login');
        
        // //if not login 
        if (!$is_customer_login && $route!='registration/index' && $route !='login/index' && $route != 'login/verify' && $route != 'registration/verifyemail' && $route!='registration/register' && $route != 'login/forgot' && $route !='login/forgotSend' && $route != 'login/withFacebook' ) {
             redirect('login');
        }

        //if login
        /*if($is_customer_login)
        {
             redirect('dashboard');
        }*/

        // $restricted = $ci->config->item('restricted');
        // $controller_name = $ci->router->fetch_class();
        
        // if($is_merchant && $route!='login/logout' && in_array($controller_name, $restricted)){
        //     show_404();
        // }
    }
}