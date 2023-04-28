<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	
	function __construct()
	{   
		ini_set('memory_limit', '-1');
		parent::__construct();
		
		$this->load->model('User');
		date_default_timezone_set('Asia/Calcutta');
		$req_url = "https://" . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
		if($this->session->userdata('b_user_id') == '' && trim($this->input->post('post_comment')) == '' && strpos($req_url, '/get_comments') == false){
		      redirect(BACKEND_FOLDER);    
        }

	}
	
	public function index($id = ''){   
        if($this->input->get('get_list')){
        	$rowperpage = 30;
			$postData = json_decode($this->input->get('data'));
			$rowno = $postData->rowno;
			if($rowno != 0){
			 	$rowno = ($rowno-1) * $rowperpage;
			}

		   $search_string   = $postData->search_string;
	
		   $orderList   = $this->User->orderList($rowperpage,$rowno, $search_string,''); 
		   $total_orders  = $this->User->orderListCount($search_string,'');
		   $data  = ['total_orders' => $total_orders ,'rowperpage' => $rowperpage,'orderList' => $orderList];
		   die(json_encode($data));
        }else{
        	$data['mainbodyContent'] = $this->load->view('backend/orders',$data,TRUE);
			$this->load->view('backend/master_view',$data);
        }

	}
    
    public function get_order_counts(){
        $total_order = $this->User->orderListCount('','');
        die($total_order);
    }
	public function order_status_change($id){
		$status = trim($this->input->post('status'));
		$this->User->update_order(array('id' => $id),array('status' => $status));  
		$username = $this->input->post('name');
		$to       = $this->input->post('email');
		$orderID       = $this->input->post('orderID');
		if($username == null || $username == 'null' || $username == ''){
			$username = $to;
		}
		if(trim($status)== 'Assignment Completed'){
			$subjectMail  = 'Assignment Completed';
			$messageMail  = '<h3>Dear '.$username.',</h3>

						<p>Congratulations! <br>Here you go with your completed assignment with order Id '.$orderID.'. <p>We request you to please rate our service if you have a great experience with us. </p><p>https://tutorchamps.com/reviews/</p>
						<p>Best,<br>
						TutorChamps Students Support Team</p>';

		}else if(trim($status)== 'Order Rejected'){

			$subjectMail  = 'Order Rejected';
			$messageMail  = '<h3>Dear '.$username.',</h3>

						<p>We are so sorry to inform you that we will not be able to accept your order due to the unavailability of the Tutors. We will keep you posted if in case there is any update on this. </p>
						<p>Best,<br>
						TutorChamps Students Support Team</p>';

		}else if(trim($status)== 'Order Confirmed'){
			$subjectMail  = 'Order Confirmed';
			$messageMail  = '<h3>Dear '.$username.',</h3>

						<p>We are glad to inform you that your order has been confirmed and we will deliver the order before the timeline. <br>Here is the confirmation number:<br>'.$orderID.'</p>
						<p>Best,<br>
						TutorChamps Students Support Team</p>';

		}else if(trim($status)== 'Assignment In progress'){

			$subjectMail  = 'Confirmed';
			$messageMail  = '<h3>Dear '.$username.',</h3>

						<p>Your payment is received and your assignment with order id '.$orderID.' is in progress now. We will let you know when your assignment will be completed.</p>
						<p>Best,<br>
						TutorChamps Students Support Team</p>';

		}else if(trim($status)== 'Review Your Assignment'){

			$subjectMail  = 'Review Your Assignment';
			$messageMail  = '<h3>Dear '.$username.',</h3>

						<p>Our tutor has completed the assignment with order id '.$orderID.'. You are requested to go through your assignment in detail and let us know if there are any changes you need in the same. <p>Looking forward to hearing from you soon.</p> 
						<p>Best,<br>
						TutorChamps Students Support Team</p>';

		}
		
		$this->send_notification_customers($to,$subjectMail,$messageMail);								
					    	
		die('yes');
	}
	
	
	public function change_order_subject(){
	    $id = trim($this->input->post('id'));
	    $subject = trim($this->input->post('subject'));
		$this->User->update_order(array('id' => $id),array('subject' => $subject));
		
		die('Yes');
	}
	public function change_order_deadline(){
	    $id = trim($this->input->post('id'));
	    $deadline = trim($this->input->post('deadline'));
		$this->User->update_order(array('id' => $id),array('deadline' => date('Y-m-d H:i:s', strtotime($deadline))));
		
		die('Yes');
	}


	public function send_notification_customers($to,$subject,$message){
		
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

 //float
	public function get_tutors_s($subject_id){
		$rowperpage = 20000;
		$postData = json_decode($this->input->get('data'));
		$rowno = @$postData->rowno;
		if($rowno != 0){
		 	$rowno = ($rowno-1) * $rowperpage;
		}

		$tutorList    = $this->User->get_tutors($rowperpage,$rowno,$subject_id);
		$rowperpage   = '';
		$total_tutors = '';
		$data  = ['total_tutors' => $total_tutors ,'rowperpage' => $rowperpage,'tutorList' => $tutorList];
		 die(json_encode($data));
	}
	
	
	public function order_detials($lead_id){
        $order_detail       = $this->User->orderList(1,0,$lead_id);
        $data               = [
                                'order_detail' => $order_detail
                            ];
                            
        die(json_encode($data));
    }

    public function get_comments($lead_id){
        $order_comments     = $this->User->getOrderComments($lead_id);
        $total_comments     = $this->User->getOrderComments($lead_id,'count');
        $data               = [
                                'total_comments' => $total_comments ,
                                'order_comments' => $order_comments
                            ];
                            
        die(json_encode($data));
    }
   
   
   public function post_float_data(){
         $orderMessage = strip_tags(trim($this->input->post('floatcomments')));
            if(trim($orderMessage) != '' && (int)$this->input->post('lmsLeadId') > 0){
                $orderMessage = strip_tags(trim($this->input->post('floatcomments')));
                $lmsLeadId   = strip_tags(trim($this->input->post('lmsLeadId')));
               
                $commentsData = [
                                'message'       => $orderMessage,     
                                'first_comment' => '0',   
                                'order_id'      => $lmsLeadId,    
                                'user_role'     => '1',     
                                'added_on'      => date('Y-m-d H:i:s'),     
                                'added_by'      => $this->session->userdata('logged_in_id'),     
                                'to_users'      => implode(",",$this->input->post('tutorsId')).',1',
                                'to_user_role'  => '1,9',
                                'to_writer'     => '1',
                                'to_customer'   => '0',
                           ];
                $cmtId = $this->User->insertData('order_comments', $commentsData);
                $this->User->update_order(array('id' => $lmsLeadId),array('float_ids' => implode(",",$this->input->post('tutorsId')),'float_expert_amount' => $this->input->post('expert_amount')));
                
            }
   }

    public function post_order_comments(){ 
        $orderMessage = strip_tags(trim($this->input->post('sendcomments')));
        if((int)$this->input->post('lmsLeadId') > 0){
            $lmsLeadId   = strip_tags(trim($this->input->post('lmsLeadId')));
            $to_writer   = ($this->input->post('to_writer')) ? $this->input->post('to_writer') : 0;
            $to_customer = ($this->input->post('to_customer')) ? $this->input->post('to_customer') : 0;
            $toRoles     = '';
            if($to_customer == '1'){
                $toRoles .= ',8';
            }
            if($to_writer == '1'){
                $toRoles .= ',9';
            }
            $logged_in_role = strip_tags(trim($this->input->post('logged_in_role')));
          
            if($logged_in_role == ''){
                $logged_in_role = '1';
            }
            
            $logged_in_id = strip_tags(trim($this->input->post('logged_in_id')));
            
           
            $commentsData = [
                            'message'       => $orderMessage,     
                            'first_comment' => '0',   
                            'order_id'      => $lmsLeadId,    
                            'user_role'     => $logged_in_role,     
                            'added_on'      => date('Y-m-d H:i:s'),     
                            'added_by'      => $logged_in_id,     
                            'to_users'      => $logged_in_id.',1',
                            'to_user_role'  => '1,2,3'.$toRoles,
                            'to_writer'     => $to_writer,
                            'to_customer'   => $to_customer,
                       ];
            $cmtId = $this->User->insertData('order_comments', $commentsData);

            $att_data        = array();
       
            $files           = $_FILES;
            $filesCount      = count($_FILES['comments_att']);
           for ($i = 0; $i < $filesCount; $i++) {
                $this->load->library('upload');

			$image_name_arr            = explode('.',$files['comments_att']['name']);
			$image_name                = str_replace(' ', '_', $image_name_arr['0']);
			$newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];



                $_FILES['comments_att']['name'] = $files['comments_att']['name'];
                $_FILES['comments_att']['type'] = $files['comments_att']['type'];
                $_FILES['comments_att']['tmp_name'] = $files['comments_att']['tmp_name'];
                $_FILES['comments_att']['error'] = $files['comments_att']['error'];
                $_FILES['comments_att']['size'] = $files['comments_att']['size'];
                $config['upload_path'] = UPLOAD_DIR  ;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|avi|csv|dc|dx|pdf|ppt|pptx|txt|xls|xlsx|mp3|mkv|mp4';

                $config['file_name'] = $newFileName;
               
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('comments_att')) {
                    $att_data = array('error' => $this->upload->display_errors());

                } else {
                    $att_data = array('upload_data' => $this->upload->data());

                    $file_path =  'media/'. $config['file_name'];
                    $file_name = $config['file_name'];
                   
                    $attData = [
                            'comment_id'    => $cmtId,     
                            'order_id'      => $lmsLeadId,    
                            'file_name'     => $file_name,    
                            'file_path'     => $file_path,    
                            'added_on'      => date('Y-m-d H:i:s'),     
                            'user_id'       => $logged_in_id,     
                          
                       ];
                $this->User->insertData('order_attachments', $attData);
                }
            }
        }
    }
   
   
   public function get_confirm_tutors_s($orderId){
	
		$tutorList    = $this->User->get_confirm_tutors($orderId);
		$data  = ['tutorList' => $tutorList];
		die(json_encode($data));
	}
	
	
	public function assign_to($orderId,$turorId){
	   
		$this->User->update_order(array('id' => $orderId),array('tutor_id' => $turorId, 'assigned' => 'True' , 'assigned_on' => date('Y-m-d h:i:s'),'float_ids' =>'', 'status' => 'Assignment In progress'));
		$tutorDetail = $this->User->getTutorById($turorId);
		print_r();
		
		$subjectMail  = 'A new order is assigned to you';
		$messageMail  = '<h3>Dear '.$tutorDetail['first_name'].',</h3>

						<p>A new order is assigned to you. Please start the work</p> 
						<p>Best,<br>
						TutorChamps Team</p>';

		$this->send_notification_customers($tutorDetail['email'],$subjectMail,$messageMail);
	}

}
