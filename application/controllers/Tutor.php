<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutor extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('User_dashboard');
        $this->load->model('Tutor_modal');
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

	public function index()
	{
		if($this->input->post('tutor_sign_in'))
		{
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			$total_cnt =  $this->Tutor_modal->check_tutor_is_exist(trim($email),trim($password),1);
			
			if($total_cnt > 0)
			{   
				$tutor_details = $this->Tutor_modal->check_tutor_is_exist(trim($email),trim($password),2);

				$tutor_detail = $tutor_details['0'];
				$tutor_id     = $tutor_detail['id'];
				$tutor_user_detail = $this->Tutor_modal->check_tutor_detail($tutor_id);
				$tutor             = $this->Tutor_modal->check_tutor_registration_detail($tutor_id);
				$tutors            = $tutor['0'];
               
				if($tutor_user_detail['0']['user_type'] == "Tutor")
				{
					if($tutor_detail['is_active'] == 1)
					{
						$userSession = [
						    'clientId'        => $tutor_detail['id'],
						    'first_name'      => $tutor_detail['first_name'],
						    'clientName'      => $tutor_detail['username'],
						    'clientEmail'     => $tutor_detail['email'],
						    'userProfile'     => $tutor_detail['avatar'],
						    'user_type'       => $tutor_user_detail['0']['user_type'],
						    'logged_in_id'    => $tutor_detail['id'],
						    'logged_in_role'  => '9',
						    'lientLoggedIn'   => true,
						];
						$this->session->set_userdata($userSession);

						if($tutors['test_completed'] == "" || $tutors['test_completed'] == '0' || $tutors['test_completed'] == "False" )
						{  
							$this->Tutor_modal->update_user(array('tutor_id' => $tutor_id), array('test_completed' => 'True'));
							redirect('screen-test');
						}else
						{
							redirect("/tutor/dashboard/");
						}
					}
					else
					{
						$this->session->set_flashdata('success_msg', 'Your account has been deactivated. Contact the Tutorchamps Team to reactivate your account.');
						redirect("/tutor");
					}
				}
				else
				{
					$this->session->set_flashdata('success_msg', 'Not Allowed.');
					redirect("/tutor");
				}
			}
			else
			{
				$this->session->set_flashdata('success_msg', 'Invalid email or password.');
				redirect("/tutor");
			}
		}
		else
		{
			$data = array();
			$data['home'] 				= 1;
			$data['meta_title']      	= 'Tutor';
			$data['meta_description']   = '';
			$data['meta_keywords']      = '';	
			$this->load->view('contents/tutor',$data);
		}
	}

	public function register()
	{
		if($this->input->post('tutor_register_up'))
		{
			$this->form_validation->set_rules('name', 'Phone', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
		    $this->form_validation->set_rules('email', 'Email', 'required');
		    $this->form_validation->set_rules('email2', 'Password', 'required');		
		    $this->form_validation->set_rules('level', 'Password', 'required');		
		    $this->form_validation->set_rules('subject', 'Password', 'required');		
			
			if($this->form_validation->run() == true)
			{   
				$name 		= $this->input->post('name');
				$email 		= $this->input->post('email');
				$level 		= $this->input->post('level');
				$subject 	= $this->input->post('subject');
				$phone 		= $this->input->post('phone');
				$s          = $subject;
				$username 	= str_replace('@','_',trim($email));

				$pass_string = $this->generateRandomString(5);
				$password =  'tutors@'.$pass_string;
				$dataArr   = [
				   'username'	   => $username,
				   'first_name'	   => $name,
				   'email'	       => $email,
				   'is_active'	   => '1',
				   'password'	   => md5($password),
				   'date_joined'   => date('Y-m-d H:i:s'),
				   'role'          => '9',
				];
				$email_exists = $this->User_dashboard->email_exists(trim($email)); 
			    if(!$email_exists)
			    {
		    		$user_id = $this->User_dashboard->insert_users('user',$dataArr);

		    		$this->session->set_userdata('isTutorLoggedIn',TRUE);
        			$this->session->set_userdata('client_tutor_id',$insert);

		    		$dataArr1 = [
    					'user_id' 	=> $user_id,
    					'phone'   	=> $phone,
    					'name'   	=> $username,
    					'user_type' => 'Tutor',
    					'country'  	=> 'India',
    					'ip'  		=> '::1'
		    		];
		    		#print_r($dataArr1);die;
		    		$this->User_dashboard->insert_users('userdetails',$dataArr1);

		    		$dataArr = [
    					'tutor_id' 	            => $user_id,
    					'name' 	                => $name,
    					'qualification_level'  	=> $level,
    					'subject'   			=> $subject,
    					'phone' 				=> $phone
		    		];
		    		$tutor_id = $this->Tutor_modal->insert_data('tutorregister',$dataArr);
		    		$unique_id = $tutor_id + 3000;
		    		$subject_part = substr($subject,0,3);
		    		$final_unique_id = $subject_part.'-'.$unique_id;

		    		$this->Tutor_modal->update_user(array('id' => $tutor_id), array('unique_id' => $final_unique_id));

		    		$dataArr = [
    					'tutor_id' => $user_id,
    					'balance'  => 0
		    		];
		    		$this->Tutor_modal->insert_data('tutorbalance',$dataArr);

		    		$dataArr = [
    					'tutor_id' => $user_id
		    		];
		    		$this->Tutor_modal->insert_data('tutoraccount',$dataArr);

		    		$html = '<!DOCTYPE html>
							<html>
							<head>
								<meta charset="utf-8">
								<meta name="viewport" content="width=device-width, initial-scale=1">
								<title></title>
							</head>
							<body>

							<h3>Dear '.$name.'<h3>

							<span>Thanks for registering at TutorChamps.</span> 

							<p>To become a tutor at TutorChamps, you are requested to complete the test by logging into our website using the given credentials.</p>

							<p>Visit this URL of our website and log in to start test:</p>

							<p>https://tutorchamps.com/tutor/</p>

							<p>Login Credentials:</p>

							<p>Username: '.$email.'</p>
							<p>Password: '.$password.'</p>
							<p>Subject: '.$subject.'</p>

							<p>Note: Please login when you are sure that you are ready to appear for the test because once you are logged in you have to appear for the test. If you leave without completing the test or appearing for the test, we will consider you failed.</p>

							<p>Although, we know that we are nobody to judge you but we are very particular about the standards we have set in our organization for being a tutor so take it as a simple onboarding process.</p>

							<p>Our onboarding process is one of the quickest and hassle-free.</p> 

							<p>All the best for your test!</p>


							<p>Sincerely,</p>

							<p>TutorChamps Tutor Support Team</p>
							</body>
							</html>';
						$subject = 'Welcome to TutorChamps || Complete the test';
						$this->send_mail_to_client($email,$subject,$html);
				    if($user_id)
				    {
				    	redirect('thank-you/'.$user_id);
					}else{
						$this->session->set_flashdata('success_msg', 'Some problems occured, please try again.');
						redirect('tutor/register/');
					}
			    }
			    else
			    {
			    	$this->session->set_flashdata('success_msg', 'This email is already registered');
			    	redirect('tutor/register/');
			    } 
			
			}else{
				$this->session->set_flashdata('success_msg', 'Please fill all required fields');
				redirect('tutor/register/');
			}
		}
		else
		{
			$data = array();
			$data['meta_title']      	= 'Register';
			$data['meta_description']   = '';
			$data['meta_keywords']      = '';
			$data['index_follow']       = "0";
			$data['Register']           = "1";
			$this->load->view('contents/tutor_regiter',$data);
		}
	}
	public function thanks()
	{
		$this->load->view('tutors/thank-you');	
	}

	public function quiz()
	{
		$tutor_id   = $this->session->userdata('clientId');
		$user_res   = $this->Tutor_modal->get_user_detail($tutor_id);
		$user_res   = $user_res['0'];
		$tutor_res  = $this->Tutor_modal->check_tutor_registration_detail($tutor_id);
		$tutor      = $tutor_res['0'];
		$email      = $this->session->userdata('clientEmail');
		
		$subject    = $tutor['subject'];

		if($subject=="Botony" || $subject=="Zoology" || $subject=="Nursing" || $subject=="Economics")
		{
	        $t    = 16;
	        $time = 30;
	    }
	    else
	    {
	        $time = 120;
	        $t    = 11;
	    }
	    if($this->input->post('tutor_quiz')==1)
		{
			$score     = 0;
			$attempted = 0;
			$correct   = 0;
			$total     = 0;

			$question_arr = $this->input->post('question_arr');
			foreach ($question_arr as $key => $value) 
			{
				$questionId    = $value;
				$question_res  = $this->Tutor_modal->get_questions_detail_by_id($questionId);
				$question      = $question_res['0'];
				#echo '<pre>';print_r($question);
				$chosedOption = $this->input->post('ques'.$questionId);
				if($chosedOption > 0)
				{
	        		$attempted += 1;
				}
				$total += $question['weightage'];
				if($chosedOption == $question['correct'])
				{
	        		$correct += 1;
	        		$score += $question['weightage'];
				}
			}
			$percent = ($score/$total)*100;
	      	$percent = round($percent,2);
			
	        if($percent < 80)
	        {   
	            $this->Tutor_modal->update_user(array('tutor_id' => $tutor_id), array('grade' => '','test_completed' => 'True','result' => 'Fail'));
	            $this->Tutor_modal->update_users(array('id' => $tutor_id), array('is_active' => '0'));

	            $to  = $user_res['email'];
	            $html = '<!DOCTYPE html>
						<html>
						<head>
							<meta charset="utf-8">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<title></title>
						</head>
						<body>
						<h3>Dear '.$user_res['first_name'].'<h3>

						<p>We would like to thank you for the time and effort you put in to complete the test. Unfortunately, you could not make it this time.You could turn up for our test after 1 month as this is not the end of your journey with TutorChamps. Thanks for applying!</p>

						<p>Sincerely,</p>

						<p>TutorChamps Tutor Support Team</p>
						</body>
						</html>';
					$subject = 'Best of luck for next time';
					$this->send_mail_to_client($email,$subject,$html);

	            $data1 = array();
				$data1['status']      = "Fail";
				$data1['attempted']   = $attempted;
				$data1['correct']     = $correct;
				$data1['Marks']       = $percent;
				return $this->load->view('tutors/status',$data1);
	        }
	        else
	        {
	            $tutor_result = 'Pass';
	            if($percent >= 80 && $percent > 85)
	            {
	                $grade = "B";
	            }
	            if($percent >= 85 && $percent > 90)
	            {
	                $grade = "B+";
	            }
	            if($percent >= 90 && $percent > 95)
	            {
	                $grade = "A";
	            }
	            if($percent >= 95)
	            {
	                $grade = "A+";
	            }
	            $this->Tutor_modal->update_user(array('tutor_id' => $tutor_id), array('grade' => $grade,'test_completed' => 'True','result' => $tutor_result));
	            $this->Tutor_modal->update_users(array('id' => $tutor_id), array('is_active' => '1'));

	            # email for passing the test
	            $to  = $user_res['email'];
	            $html = '<!DOCTYPE html>
						<html>
						<head>
							<meta charset="utf-8">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<title></title>
						</head>
						<body>
						<h3>Dear '.$user_res['first_name'].'<h3>

						<span>Good things happen to those who hustle</span> 

						<p>You have successfully passed our test and joined the elite club of our TutorChamps. Please visit your Dashboard to solve questions or assignments and start earning today.</p>

						<p>Go to your dashboard now!</p>

						<p>Sincerely,</p>

						<p>TutorChamps Tutor Support Team</p>
						</body>
						</html>';
					$subject = 'Congratulations || You have nailed it';
					$this->send_mail_to_client($email,$subject,$html);

	            $data1 = array();
				$data1['status']      = "Pass";
				$data1['attempted']   = $attempted;
				$data1['correct']     = $correct;
				$data1['Marks']       = $percent;
				return $this->load->view('tutors/status',$data1);
	        }
        }
        if($subject=="Zoology" || $subject== "Botony" || $subject=="Nursing" || $subject=="Economics")
        {
	        $l  = $this->Tutor_modal->get_questions($subject,'Medium','15');
        }
        else
        {
	        $m  = $this->Tutor_modal->get_questions($subject,'Medium','6');
	        $h  = $this->Tutor_modal->get_questions($subject,'Hard','4');
	        $l = array_merge($m, $h);
	    }
	    if($subject=="Finance"){
        	$subject = $subject." & "."Account";
	    }
	    $data = array();
		$data['q']      	         = $l;
		$data['subject']             = $subject;
		$data['time']      			 = $time;
		$data['totalQuestion']       = $t - 1;
		$this->load->view('tutors/quiz',$data);	
	}

	public function dashboard()
	{
		$tutor_id = $this->session->userdata('clientId');
		$tutor_user_detail = $this->Tutor_modal->check_tutor_detail($tutor_id);

		if($tutor_user_detail['0']['user_type'] != "Tutor")
		{
			redirect("old-user");
		}
		else
		{
			$tutor_register   = $this->Tutor_modal->check_tutor_registration_detail($tutor_id);
			
			$subject          = $tutor_register['0']['subject'];
			$tutor_balance    = $this->Tutor_modal->check_tutor_balance($tutor_id);
			$orders           = $this->Tutor_modal->get_order_detail($subject,$assigned=False,$status='Order Confirmed');
			if($tutor_register['0']['test_completed']=='False')
			{   
        		redirect("screen-test");
			}
			else
			{
				if(trim($tutor_register['0']['result']) != 'Pass')
				{
	        		redirect("/tutor/");
				}
			}
		}
		if($this->input->post('tutor_register_up'))
		{
	        $pan_number 		= $this->input->post('pan_card');
	        $name_on_pan 		= $this->input->post('pan_name');
	        $name_in_account 	= $this->input->post('name_in_account');
	        $account_number 	= $this->input->post('account_number');
	        $confirm 			= $this->input->post('confirm_bank_account');
        	$ifsc 				= $this->input->post('ifsc');

	        if($account_number == $confirm)
	        {
	        	$dataArr = [
					'pan_number' 	    => $pan_number,
					'account_number' 	=> $account_number,
					'name_in_account'  	=> $name_in_account,
					'name_on_pan'   	=> $name_on_pan,
					'ifsc' 				=> $ifsc
	    		];
			    $this->Tutor_modal->update_tutor_account(array('tutor_id' => $tutor_id),$dataArr);
	            redirect('tutor/dashboard');
	        }
	        else
	        {
	        	$this->session->set_flashdata('success_msg', 'pleaase check the account number');
	        	redirect('tutor/dashboard');
	        }
	    }
	    elseif($tutor_register['0']['phone']== '' || $tutor_register['0']['degree']=='')
	    {
	    	redirect('/tutor_detail/');
	    }
	    else
	    {
	    	$tutor_account   = $this->Tutor_modal->check_tutor_account($tutor_id);
	    	$assignments     = $this->Tutor_modal->TutorSolvedAssignment($tutor_id);
	    	$labs            = $this->Tutor_modal->TutorLabs($tutor_id);
	    	$earned          = $this->Tutor_modal->TutorEarned($tutor_id);
	    	$payment_history = $this->Tutor_modal->TutorPaymentHistory($tutor_id);
	    	$TutorAvailabelOrder = $this->Tutor_modal->TutorAvailabelOrder($tutor_id);
	    	$TutorWorkingAssignment = $this->Tutor_modal->TutorWorkingAssignment($tutor_id);

	    	$data = array();
			$data['user_detail']      	= $tutor_user_detail['0'];
			$data['tutor_register']     = $tutor_register['0'];
			$data['tutor_account']      = $tutor_account['0'];
			$data['assignments']        = $assignments;
			$data['labs']    			= $labs;
			$data['earned']    			= $earned;
			$data['TutorAvailabelOrder']   = $TutorAvailabelOrder;
			$data['TutorWorkingAssignment']   = $TutorWorkingAssignment;
			$data['payment_history']    = $payment_history;
			$data['b']                 = $tutor_balance['0']['balance'];
			$data['meta_title']      	= 'Register';
			$data['meta_description']   = '';
			$data['meta_keywords']      = '';
			$data['index_follow']       = "0";
			$data['Register']           = "1";
			$this->load->view('tutors/tutor-dashboard',$data);
	    }
	}

	public function tutor_profile()
	{
		$tutor_id        = $this->session->userdata('clientId');
		$user_detail     = $this->Tutor_modal->check_tutor_detail($tutor_id);
		$tutor_register  = $this->Tutor_modal->check_tutor_registration_detail($tutor_id);
		if($this->input->post('hyd_profile')==1)
		{
	        $dataArr = [
				'name' 	    => $this->input->post('nae'),
				'phone' 	=> $this->input->post('phone'),
				'college'   => $this->input->post('college')
    		];
	        $this->Tutor_modal->update_user(array('id' => $tutor_id),$dataArr);
	        redirect('tutor-dashboard');
		}
	}

	public function tutor_reset_password()
	{
    	$password 			= trim($this->input->post('password'));
        $confm_password    = trim($this->input->post('confm_password'));
    	if($password == $confm_password)
    	{
    		$tutor_id = $this->session->userdata('clientId');
    		$this->Tutor_modal->update_users(array('id' => $tutor_id),array('password'=>md5($password)));
    	}
	}  

	public function tutor_logout()
	{
		$this->session->sess_destroy();
		redirect('./tutor');
	}
	public function tutor_detail()
	{
		$tutor_id = $this->session->userdata('clientId');

		if($this->input->post('tutor_detail'))
		{
			
			$dataArr = [
				'phone' 	    => $this->input->post('phone'),
				'state' 	    => $this->input->post('state'),
				'city' 	    	=> $this->input->post('city'),
				'pin' 	    	=> $this->input->post('pin'),
				'degree' 	    => $this->input->post('degree'),
				'branch' 	    => $this->input->post('branch'),
				'college' 	    => $this->input->post('college'),
				'college_id' 	=> $this->input->post('college_id'),
				'test_completed'=> 'True'
    		];
		    $this->Tutor_modal->update_user(array('tutor_id' => $tutor_id),$dataArr);
		    #print_r($dataArr);die;
		    redirect('/tutor/dashboard');
		}
		else{
			$this->load->view('tutors/tutor_detail');	
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
		
		$mailContent = $message;

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
        $this->email->from('info@tutorchamps.com', 'TutorChamps Admin');
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
	
	  function getTotalAvailableOrder($orderId,$tutor_id){
        $this->db->select('count(id) AS total_records');
        $this->db->from('available_orders');
        $this->db->where('task_id', $orderId);
        $this->db->where('tutor_id', $tutor_id);
        $query = $this->db->get();
        $ta = $query->row();
        return $ta->total_records;
   }
   
	public function show_interest($id,$val){
	    $tutor_id = $this->session->userdata('clientId');
	    $total = $this->getTotalAvailableOrder($id,$tutor_id);
	    if((int)$total == 0){
	        $this->db->insert('available_orders',array('task_id ' => $id,'tutor_id' =>$tutor_id, 'confirmed_on' => date('Y-m-d H:i:s'), 'interested' => $val));
	        $email  = '';
            $html = '<!DOCTYPE html>
    				<html>
    				<head>
    					<meta charset="utf-8">
    					<meta name="viewport" content="width=device-width, initial-scale=1">
    					<title></title>
    				</head>
    				<body>
    				<h3>Hello<h3>
    				<p>A new tutor showed interest in order.</p>
    				<p>Go to your dashboard now!</p>
    				<p>Sincerely,</p>
    
    				<p>TutorChamps</p>
    				</body>
    				</html>';
    			$subject = 'A new tutor showed interest in order';
    		//	$this->send_mail_to_client($email,$subject,$html);
	    }else{
	        $this->db->update('available_orders', array('confirmed_on' => date('Y-m-d H:i:s'), 'interested' => $val), array('task_id ' => $id,'tutor_id' =>$tutor_id));
	    }
	    
	}
	
/*	public function forgot_password(){
	    if($this->input->post('get_link')){
	        
	    }else{
	        $data = array();
			$data['home'] 				= 1;
			$data['meta_title']      	= 'Forgot Password';
			$data['meta_description']   = '';
			$data['meta_keywords']      = '';	
			$this->load->view('tutor/forgot_pass_tutor',$data);
	    }
	}*/
}
 