<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("geoip2.phar");
use GeoIp2\Database\Reader;
class Home extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Posts');
        $this->load->model('User_dashboard');
        $this->load->model('Stories');
        $this->country_page = '0';
        $this->eligibility  = '0';
        date_default_timezone_set('Asia/Calcutta');



        $req_url = "https://" . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];

        if(strpos($req_url, '/index.php') !== false) {
        $req_url = str_replace('/index.php','',$req_url);
        if(strpos($req_url[strlen(trim($req_url)) - 1], '/') !== false) {
            $req_url = substr($req_url, 0, -1);
	        }
	        redirect($req_url, '', 301);
	        die;
	    }

         if(strpos($req_url[strlen(trim($req_url)) - 1], '/') === false) {
            $req_url = $req_url.'/';
            redirect($req_url,'location',301);
            die;
        }

        if(strpos($req_url[strlen(trim($req_url)) - 1], '/') !== false) {

            $length = strlen($req_url);
            $index = $length - 2;
            if($req_url[$index] == '/') {
                $req_url = preg_replace('{/$}', '', $req_url);
                $req_url = rtrim($req_url, '/\\');
                $req_url = $req_url.'/';
                redirect($req_url,'location',301);
                die;   
            }
        }
        
    }

	public function index(){

		$data = array();
		$data['home'] 				= 1;
		$data['meta_title']      	= 'Homework Help | Online Homework Help 24/7 @TutorChamps';
		$data['meta_description']   = 'Get 24/7 online homework help from the best expert tutors at TutorChamps.com & score A+ grades. 4.6/5 rated by students. We never miss deadlines. Try now!';
		$data['meta_keywords']      = 'online homework help, homework helper, #1 homework help website, homework help service, assignment writing help, assignment help service, online assignment help, 24/7 homework help available, #1 assignment help website.';
		$data['index_follow']     = "1";
		$data['latest_posts']     = $this->Posts->latest_post_lists(3);
		$data['canonicalUrl']     = base_url();
		$data['mainbodyContent'] 	= $this->load->view('contents/home',$data,TRUE);
		$this->load->view('main_view',$data);
	}
	
	
	public function view($urlSlug = ''){
	    
	    $urlSlug        = trim(strtolower($urlSlug));
	    $pageDetails    = $this->Posts->get_page_details($urlSlug, 'page');
        $details        = json_decode(json_encode($pageDetails), True);
        
	    if(empty($details)){
            $data['meta_title']       = "404 - Page Not Found";
            $data['meta_description'] = "";
            $data['meta_keywords']    = "";
            $data['index_follow']     = "0";
            $data['pageTitle']        = '404';
            $data['page404']          = '1';
            $this->output->set_status_header('404');
            $data['mainbodyContent'] 	= $this->load->view('contents/404',$data,TRUE);
		    $this->load->view('main_view',$data);
        }else{
            $data['meta_title']       = $details['meta_title'];
            $data['meta_description'] = $details['meta_description'];
            $data['meta_keywords']    = $details['meta_keywords'];
            $data['index_follow']     = $details['index_follow'];
            $data['pageTitle']        = $details['title'];
            $data['single']           = '1';
            $data['canonicalUrl']     = base_url().$details['url_slug'].'/';
            $data['page']             = $details;
            $data['mainbodyContent']  = $this->load->view('contents/page_details',$data,TRUE);
		    $this->load->view('main_view',$data);
        }
	}




	public function login(){

		if($this->input->post('login')){
			$email_id = $this->input->post('email');
			$password = $this->input->post('password');
			$userData = $this->User_dashboard->getRows($email_id, md5($password));
			#print_r($userData);
			if(count($userData) > 0 && (int)$userData['id'] > 0 && $userData['id'] !=''){
				if($userData['is_active'] == '1'){
					$this->session->set_userdata('isClientLoggedIn',TRUE);
        			$this->session->set_userdata('client_user_id',$userData['id']);
        			$this->session->set_userdata('logged_in_id',$userData['id']);
        			$this->session->set_userdata('logged_in_role','8');

        			$this->User_dashboard->update_user(array('id' => $userData['id']), array('last_login' => date('Y-m-d H:i:s')));
					$data = ['status'=>'success','msg' => 'Login Successfuly'];
				// 	order saving process
				    $insert = $userData['id'];
				 if($insert){
				    	if($this->session->userdata('onlyOrder_id') != ''){
				    		$orderId = $this->session->userdata('onlyOrder_id');
				    		$orderMessage = $this->session->userdata('orderMessage');
				    		$this->User_dashboard->update__data('orders',array('id' =>$orderId), array('order_id' => 'TC-HW-'.$orderId,'user_id' => $insert));
                            $this->session->set_userdata('Order_Code','TC-HW-'.$orderId);
                            
                            if(trim($orderMessage) != ''){
                                 $commentsData = [
                                    'message'       => $orderMessage,     
                                    'first_comment' => '1',   
                                    'order_id'      => $orderId,    
                                    'user_role'     => '8',     
                                    'added_on'      => date('Y-m-d H:i:s'),     
                                    'added_by'      => $insert,     
                                    'to_users'      => $insert.',1',
                                    'to_user_role'  => '1,8',
                                    'to_writer'     => '0',
                                    'to_customer'   => '1',
                               ];
                               
                               $this->User_dashboard->insert('order_comments',$commentsData);
                            }
                             
                            
                            
				    		$subjectMail  = 'Order Created - TC-HW-'.$orderId;
							$messageMail  = '<h3>Dear '.$username.'</h3>

										<p>Thank you for choosing TutorChamps. Your order has been created successfully. Your order summary is as:<br>
 
										Subject: '.$this->input->post('subject').'<br>
										Order Id: TC-HW-'.$orderId.'<br>
										Deadline: '.$this->input->post('deadline').'<br>
										</p>

										<p>Please allow us some time to confirm your order. Our team has already working on this. We will get back to you shortly. </p>
										<p>You can check the status of your assignment by logging into your dashboard by using your email and password.</p>

										<p>To access dashboard login to our website by using the given link below.<br>
										https://tutorchamps.com/login/ <br>

										OR<br>
										Contact Us on WhatsApp directly: https://wa.me/+919711569678</p>

										<p>Best,<br>
										TutorChamps Students Support Team<br>
										Sincerely,<br>
										The Tutorchamps Team</p>';
				    		
				    	}
				    	$this->send_email_customers(trim($this->input->post('email')),$subjectMail,$messageMail);

						$data = ['status'=>'success','msg' => 'Registered Successfuly','order' => 'YES','order_id'=>'TC-HW-'.$orderId];
					}
    				else{
    				    $data = ['status'=>'success','msg' => 'Registered Successfuly','order' => ""];
    				}
				
				}else{
					$data = ['status'=>'error','msg' => 'Your Account has been deactivated'];
				}
			}else{
				$data = ['status'=>'error','msg' => 'Invalid email or password'];
			}
			
            die(json_encode($data));
		}else{
			$data = array();
			$data['meta_title']      	= 'Login To Get Your Assignments Solved Instantly - TutorChamps.com';
			$data['meta_description']   = 'Login to get all your assignments/homework solved instantly from subject expert tutors.';
			$data['meta_keywords']      = '';
			$data['index_follow']       = "1";
			$this->load->view('contents/login',$data);
		}
		
	}


	public function password_reset(){


		if($this->input->post('reset_pass')){
			$email_id = trim($this->input->post('email'));
			$userData = $this->User_dashboard->getRows($email_id);
			
			if(count($userData) > 0 && (int)$userData['id'] > 0 && $userData['id'] !=''){
				if($userData['is_active'] != '0'){
					$userId = $userData['id'];
					$token  = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 45);
					$this->User_dashboard->update__data('user',array('id' =>$userId), array('token' => $token ));
					$subject  = 'Password Reset Requested';
					$message = '<h3>Hello, </h3>
								<p>We received a request to reset the password for your account for this email address. To initiate the password reset process for your account, click the link below.</p>
								<p><a href="'.base_url().'password-reset-confirm?uid='.$email_id.'&token='.$token.'">Reset Password</a>

								<p>This link can only be used once. If you need to reset your password again, please visit '.base_url().' and request another reset.</p>

								<p>If you did not make this request, you can simply ignore this email.</p>

								<p>Sincerely,<br>
								The Tutorchamps Team</p>';

					$this->send_email_customers($email_id,$subject,$message);
								
					$data = ["status"=>"success","message"=>"We've emailed you instructions for setting your password, if an account exists with the email you entered. You should receive them shortly. If you don't receive an email, please make sure you've entered the address you registered with, and check your spam folder."];
				}else{
					$data = ['status'=>'error','message' => 'Your Account has been deactivated'];
				}
			}else{
				$data = ['status'=>'error','message' => 'Invalid email'];
			}
			
           die(json_encode($data));
		}
	}

	public function password_reset_confirm(){
		if(trim($this->input->post('token')) != '' && trim($this->input->post('password')) != '' && trim($this->input->post('change')) != ''){
			$email_id = $this->input->post('uid');
			$token    = $this->input->post('token');
			$userData = $this->User_dashboard->getRows2($email_id, $token);
			
			if(count($userData) > 0 && (int)$userData['id'] > 0 && $userData['id'] !=''){
				$password = md5($this->input->post('password'));
				$this->User_dashboard->update__data('user',array('id' =>$userData['id']), array('token' => '','password' => $password ));
				$data = ["status"=>"success","message"=>"Password changed successfuly."];
			}else{
				$data = ['status'=>'error','message' => 'Link expired'];
			}
			 die(json_encode($data));
			
		}else{
			$data = array();
			$data['meta_title']      	= 'Reset Passwrod - TutorChamps.com';
			$data['meta_description']   = '';
			$data['meta_keywords']      = '';
			$data['index_follow']       = "0";
			$this->load->view('contents/reset_password.php',$data);
			
		}
		
	}


	public function order(){
		$this->session->set_userdata('onlyOrder_id','');
		$this->session->set_userdata('subject','');
		$this->session->set_userdata('deadline','');
		$ip = $this->get_User_Ip_Address();
		if($ip!=='::1'){
			$reader = new Reader('GeoLite2-City.mmdb');
			$record = $reader->city($ip);
			$country = $record->country->name;
		}
		else {
			$country='';
		}
		$data = [
                    'status'    	=> 'Awaiting Confirmation',
                    'description'   => $this->input->post('Details'),
                    // 'deadline'  	=> $this->input->post('deadline'),
                    // 'subject'   	=> $this->input->post('subject'),
                    'assigned'  	=> 'False',
                    'submission_date' => date('Y-m-d'),
                    'country'   => $country,
                    'user_id' => 0,
                    ];
             if(isset($_FILES['files']) && $_FILES['files']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['files']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('files')){
                    $data['assignment'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }  
                    
            $insert_id = $this->User_dashboard->insert('orders',$data);

            $this->session->set_userdata('onlyOrder_id',$insert_id);
            // $this->session->set_userdata('subject',$this->input->post('subject'));
// 			$this->session->set_userdata('deadline',$this->input->post('deadline'));
			$this->session->set_userdata('orderMessage',$this->input->post('Details'));
	}


	public function sign_up(){

		if($this->input->post('sign_up')){

			$this->form_validation->set_rules('phone', 'Phone', 'required');
		    $this->form_validation->set_rules('email', 'Email', 'required');
		    $this->form_validation->set_rules('password', 'Password', 'required');		
			
			if($this->form_validation->run() == true){   
				$username = str_replace('@','_',trim($this->input->post('email')));

				$dataArr   = [
							   'username'	   => $username,
							   'email'	       => $this->input->post('email'),
							   'password'      => md5($this->input->post('password')),
							   'date_joined'   => date('Y-m-d H:i:s'),
							   'is_active'     => '1',
							   'is_superuser'  => '0',
							   'is_staff'      => '0',
							   'role'          => '8',
							];


				$email_exists = $this->User_dashboard->email_exists(trim($this->input->post('email'))); 
			    if(!$email_exists){
		    		$insert= $this->User_dashboard->insert_users('user',$dataArr);
		    		$this->session->set_userdata('isClientLoggedIn',TRUE);
        			$this->session->set_userdata('client_user_id',$insert);
        			$this->session->set_userdata('logged_in_id',$insert);
        			$this->session->set_userdata('logged_in_role','8');
        			$this->User_dashboard->update_user(array('id' => $insert), array('last_login' => date('Y-m-d H:i:s')));
		    		$dataArr = [
		    					'user_id' 	=> $insert,
		    					'phone'   	=> $this->input->post('phone'),
		    					'name'   	=> $username,
		    					'user_type' => 'Student',
		    					'country'  	=> 'India',
		    					'ip'  		=> $this->get_User_Ip_Address(),
		    				];

		    		$uid = $this->User_dashboard->insert_users('userdetails',$dataArr);

				    if($insert){
				    	if($this->session->userdata('onlyOrder_id') != ''){
				    		$orderId = $this->session->userdata('onlyOrder_id');
				    		$orderMessage = $this->session->userdata('orderMessage');
				    		$this->User_dashboard->update__data('orders',array('id' =>$orderId), array('order_id' => 'TC-HW-'.$orderId,'user_id' => $insert));
                            $this->session->set_userdata('Order_Code','TC-HW-'.$orderId);
                            
                            if(trim($orderMessage) != ''){
                                 $commentsData = [
                                    'message'       => "Welcome To TutorChamps. Let Us know How We Can Help You In This Assignment",     
                                    'first_comment' => '1',   
                                    'order_id'      => $orderId,    
                                    'user_role'     => '8',     
                                    'added_on'      => date('Y-m-d H:i:s'),     
                                    'added_by'      => '1',     
                                    'to_users'      => $insert.',1',
                                    'to_user_role'  => '1,8',
                                    'to_writer'     => '0',
                                    'to_customer'   => '1',
                               ];
                               
                               $this->User_dashboard->insert('order_comments',$commentsData);
                            }
                             
                            
                            
				    		$subjectMail  = 'Order Created - TC-HW-'.$orderId;
							$messageMail  = '<h3>Dear '.$username.'</h3>

										<p>Thank you for choosing TutorChamps. Your order has been created successfully. Your order summary is as:<br>
 
										Subject: '.$this->input->post('subject').'<br>
										Order Id: TC-HW-'.$orderId.'<br>
										Deadline: '.$this->input->post('deadline').'<br>
										</p>

										<p>Please allow us some time to confirm your order. Our team has already working on this. We will get back to you shortly. </p>
										<p>You can check the status of your assignment by logging into your dashboard by using your email and password.</p>

										<p>To access dashboard login to our website by using the given link below.<br>
										https://tutorchamps.com/login/ <br>

										OR<br>
										Contact Us on WhatsApp directly: https://wa.me/+919711569678</p>

										<p>Best,<br>
										TutorChamps Students Support Team<br>
										Sincerely,<br>
										The Tutorchamps Team</p>';
				    		
				    	}else{
				    		$subjectMail  = 'Welcome to TutorChamps';
							$messageMail  = '<h3>Dear '.$username.'</h3>

											<p>Thanks for choosing TutorChamps. Your account has been created successfully. Now you can easily create the order as per your requirements to avail of our services. </p>

											<p>Looking forward to helping you in your academic journey.</p>

											<p>Best,<br>
											TutorChamps Students Support Team</p>';
				    	}

				    	$this->send_email_customers(trim($this->input->post('email')),$subjectMail,$messageMail);

						$data = ['status'=>'success','msg' => 'Registered Successfuly','order' => 'YES','order_id'=>'TC-HW-'.$orderId];

					}else{
						$data = ['status'=>'error','msg' => 'Some problems occured, please try again.','order' => ''];
					}
			    }
			    else{
			    	$this->session->set_flashdata('success_msg', 'This email is already registered');
			    	$data = ['status'=>'error','msg' => 'Email already exists. Try with another email','order' => ''];
			    } 
			
			}else{
				$data = ['status'=>'error','msg' => 'Please fill all required fields','order' => ''];
			}

			die(json_encode($data));
			
		}else{
			$data = array();
			$data['meta_title']      	= 'Register To Get Your Assignments/Homework Solved Instantly - TutorChamps.com';
			$data['meta_description']   = 'Register here to get all your assignments/homework solved instantly from subject expert tutors. 4.5/5 rated by students. 30k+ tutors with 100+ PhD Experts.';
			$data['meta_keywords']      = '';
			$data['index_follow']       = "1";
			$this->load->view('contents/sign_up',$data);
		}
		
	}



	public function send_email_customers($to,$subject,$message){
		
		$mailContent = '<!DOCTYPE html>
							<html>
							<head>
								<meta charset="utf-8">
								<meta name="viewport" content="width=device-width, initial-scale=1">
								<title></title>
							</head>
							<body>'.$message.'</body>
							</html>';

        $this->load->library('email');
        $config = array(

            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.hostinger.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@tutorchamps.com',
            'smtp_pass' => 'Tutorchamps#123',
            'mailtype'  => 'html',
            'smtp_crypto' => 'ssl',
            'charset'   => 'utf-8'
        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->to($to);
        $this->email->from('info@tutorchamps.com', 'TutorChamps Student Support');
        $this->email->subject($subject);
        $this->email->message($mailContent);
        $this->email->send();

       /* if ($this->email->send()) {
			echo 'Your Email has successfully been sent.';
		 } else {
			show_error($this->email->print_debugger());
		}					
			*/		
		
		
	}


	public function get_User_Ip_Address(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    } 

}
 