<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('User');
        date_default_timezone_set('Asia/Calcutta');
       
        
    }

	public function login(){

		if($this->input->post('login_email') == '' || $this->input->post('login_password') == '' || $this->input->post('login') == ''){
        	die('You Are a Bot');
        }
		$email  	= $this->input->post('login_email');
        $password   = $this->input->post('login_password');
		$userDetail =  $this->User->get_user_by_email_pass(trim($email),trim($password), MAIN_SITE_ID);
		if(trim(@$userDetail[0]['id']) == ''){
			die('0');
		}else if(trim(@$userDetail[0]['email_verified']) == '0'){
			die('not_verified');
		}else{
			if(trim(@$userDetail[0]['email_verified']) == '1' && trim(@$userDetail[0]['id']) != ''){
				$userSession = [
					    'clientId' => $userDetail[0]['id'],
					    'clientName'  => $userDetail[0]['username'],
					    'clientEmail'     => $userDetail[0]['email_id'],
					    'b_user_id'     => $userDetail[0]['id'],
					    'userProfile' => $userDetail[0]['avatar'],
					    'lientLoggedIn' => true,
						];

				$this->session->set_userdata($userSession);
				die('login_successfull');
			}else{
				die('0');
			}
		}
	}


	public function registration(){

		 if($this->input->post('login_email') == '' || $this->input->post('login_password') == '' || $this->input->post('register') == ''){
        	die('You Are a Bot');
        }

        $verifyString = $this->generateRandomString(20);

		$data = array(  
                            'role_type'  	=> '3', 
                            'user_type'  	=> '3', 
                            'username'   	=> $this->input->post('login_name'), 
                            'name'   		=> $this->input->post('login_name'), 
                            'email_id'   	=> $this->input->post('login_email'), 
                            'password'   	=> md5($this->input->post('login_password')), 
                            'password_text' => $this->input->post('login_password'), 
                            'website_access'=> MAIN_SITE_ID,
                            'status'        => '1', 
                            'verfiy_string' => $verifyString,
                            'added_date'    => date('Y-m-d H:i:s'), 
                            'modified_date' => date('Y-m-d H:i:s'), 
                            'avatar'        => '', 
                );
                

                $email_exists = $this->User->email_exists(trim($this->input->post('login_email')), MAIN_SITE_ID); 
                if(!$email_exists){
                        $insert= $this->User->insert($data);
                        if($insert){
                        	$to = $this->input->post('login_email');
				        	$subject = 'Account Verification Link ';
				        	$message = '<html><body><p>Hello '.$this->input->post('login_name').',<br><br> Please click <a href="'.base_url().'users/verify-email?ar_code='.$verifyString.'&ar_email='.$this->input->post('login_email').'">here</a> to verify your account.</p></body></html>';
				        	$this->send_mail_to_client($to,$subject,$message);
                        	die('register_successfull');
                    }
                    else{
                        die('Error');
                    }
                }
                else{
                    die('Account with same Email Id is already exist. Please try again.');
                } 
		
	}



	public function forgot_password(){

		$email_exists = $this->User->email_exists(trim($this->input->post('login_email')), MAIN_SITE_ID); 
        if($email_exists){
        	$verifyString = $this->generateRandomString(15);
        	$where = array('email_id' => trim($this->input->post('login_email')) , 'website_access' => MAIN_SITE_ID);
        	$data  = array('forgot_password_string' => $verifyString);
        	$this->User->update($where, $data);
        	$to = $this->input->post('login_email');
        	$subject = 'Password Reset Link';
        	$message = '<html><body><p>Hello ,<br><br> Please click <a href="'.base_url().'users/reset-password?ar_code='.$verifyString.'&ar_email='.$this->input->post('login_email').'">here</a> to reset your password.</p></body></html>';
        	$this->send_mail_to_client($to,$subject,$message);
            die('user_found'); 
        }else{
        	die('No account found with this email. Please try with another email');
        }
	}



	public function reset_password(){
        
        if($this->input->get('update_password')){
        	$emailId = trim($this->input->get('ar_email'));
	        $code    = trim($this->input->get('ar_code'));
			$userDetail = $this->User->get_user_by_email_code($emailId, $code, 'reset_pass', MAIN_SITE_ID);
	    	if(trim(@$userDetail[0]['id']) == ''){
	    		$data['verify'] = '0';	
	    	}else{
	    		$newPassword = trim($this->input->get('new_password'));
	    		$this->User->update(array('id' => $userDetail[0]['id'], 'website_access' => MAIN_SITE_ID), array('password' => md($newPassword), 'password_text' => $newPassword));
	    	}
        }else{
        	$data = array();
			$data['home'] = 1;
			$data['meta_title']      = 'Reset Password - Australian Reviewers';
			$data['mainbodyContent'] = $this->load->view('contents/reset_password',$data,TRUE);
			$this->load->view('main_view',$data);
        }
        
	}   



	public function logout(){
		$this->session->sess_destroy();
		redirect('./');
		
	}


	public function verify_email(){

		$data = array();
		if(trim($this->input->get('ar_code')) == '' || trim($this->input->get('ar_email')) == ''){
        	die('You Are a Bot');
        }else{

        	$code = $this->input->get('ar_code');
        	$emailId = $this->input->get('ar_email');
        	$userDetail = $this->User->get_user_by_email_code($emailId, $code, '' ,MAIN_SITE_ID);
        	if(trim(@$userDetail[0]['id']) == ''){
        		$data['verify'] = '0';	
        	}else{
        		$this->User->update(array('id' => $userDetail[0]['id'], 'website_access' => MAIN_SITE_ID), array('email_verified' => '1'));
        		$data['verify'] = '1';
        	}

        	$data['meta_title']      = 'Eamil Verification - Australian Reviewers';
			$data['mainbodyContent'] = $this->load->view('contents/email_verification',$data,TRUE);
			$this->load->view('main_view',$data);
        }
	}


	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}


	public function send_mail_to_client($to,$subject,$message){
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <info@australian-reviewers.com>' . "\r\n";
		mail($to,$subject,$message,$headers);
	}
}
 