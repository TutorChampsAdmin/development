<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('User');
        date_default_timezone_set('Asia/Calcutta');
        if(!$this->session->userdata('clientId')){
        	redirect('/');
        }
        
    }


	public function index(){
		redirect('my-account/my-profile');
	}


	public function my_profile(){
		if($this->session->userdata('clientId')){
			$userInfo   = $this->User->getUserDetails($this->session->userdata('clientId'),$this->session->userdata('clientEmail'));
			$userID   = @$userInfo[0]['id'];
			if($userID > 0){
				$data['userInfo'] = $userInfo ;
				$data['meta_title']      = 'My Account - Profile';
				$data['mainbodyContent'] = $this->load->view('contents/my_profile',$data,TRUE);
				$this->load->view('main_view',$data);
			}
		}else{

		}
		
	}


	public function update_profile(){
		if($this->session->userdata('clientId')){
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$where = array('id' => trim($this->session->userdata('clientId')) , 'website_access' => MAIN_SITE_ID);
        	$data  = array( 
        					'name' => strip_tags($name) ,
        					'contact_no' => strip_tags($phone) ,
        				);
        	$this->User->update($where, $data);
        	redirect('my-account/my-profile?update=1');
		}
	}

	public function change_password(){
		if($this->session->userdata('clientId')){
			$newPassword = $this->input->post('newPassword');
			$where = array('id' => trim($this->session->userdata('clientId')) , 'website_access' => MAIN_SITE_ID);
        	$data  = array( 
        					'password' => strip_tags(md5($newPassword)) ,
        					'password_text' => strip_tags($newPassword) ,
        				);
        	$this->User->update($where, $data);
        	redirect('my-account/my-profile?change=success');
		}
	}

	public function update_profile_pic(){
		if(isset($_FILES['profilePic']) && $_FILES['profilePic']['name'] != ''){
            $image_name_arr            = explode('.', $_FILES['profilePic']['name']);
            $image_name                = str_replace(' ', '_', $image_name_arr['0']);
            $profile                   = $image_name.'_'.time().'.'.$image_name_arr['1'];
            $config['upload_path']     = UPLOAD_DIR;
            $config['file_name']       = $profile;
            $config['allowed_types']   = '*';      
            $this->upload->initialize($config);
            $this->upload->do_upload('profilePic');
            $where = array('id' => trim($this->session->userdata('clientId')) , 'website_access' => MAIN_SITE_ID);
	    	$data  = array( 
	    					'avatar'  => $profile,
	    				);
	    	$this->User->update($where, $data);
	    	redirect('my-account/my-profile');
        }
         

        
	}

}
 