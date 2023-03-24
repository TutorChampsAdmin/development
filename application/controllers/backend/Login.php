<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
     function __construct(){
        parent::__construct();
        $this->load->model('LoginModal');
        date_default_timezone_set('Asia/Calcutta');
        if((int)$this->session->userdata('b_user_id') > 0){
        	redirect(BACKEND_FOLDER.'/pages');
        }
        
    }

	public function index(){
		$data = [];
		$this->load->view('backend/index',$data);
	}
	
	public function verify_login(){
		$email_id = $this->input->post('username');
		$password = $this->input->post('password');
		$userData = $this->LoginModal->getRows($email_id);
   

		if(count($userData) > 0 && (int)$userData['id'] > 0){

			if(trim($userData['password']) == trim(md5($password))){
				$messageResponse = [
											"status"  => "success",
						                "color"   => "green",
						                "message" => "Logged in successfully!"
									];
				
	            $userSession 	= [
								    'b_user_id' 		=> $userData['id'],
								    'logged_in_id'      => $userData['id'],
								    'logged_in_role'    => $userData['role'],
								    'b_role'     		=> $userData['role'],
								    'b_first_name' 	=> $userData['first_name'],
								    'b_last_name' 		=> $userData['last_name'],
								    'b_email' 			=> $userData['email'],
								    'b_phone' 			=> $userData['phone'],
								    'user_short_role' 		=> $userData['short_name'],
								];
				$this->session->set_userdata($userSession);
													
			}else{
				$messageResponse = [
										"status"  => "password",
				                		"color"   => "red",
				                		"message" => "Please enter correct password!"
									];	
			}

		}else{
			$messageResponse 	= [
									"status"  => "email",
					                "color"   => "red",
					                "message" => "Sorry, You are not registered with us!"
								];
		}

		die(json_encode($messageResponse));
	}

}
