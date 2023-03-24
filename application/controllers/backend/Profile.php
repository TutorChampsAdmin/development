<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
     function __construct(){
        parent::__construct();
        $this->load->model('LoginModal');
        date_default_timezone_set('Asia/Calcutta');
       if($this->session->userdata('b_user_id') == ''){
        		redirect(BACKEND_FOLDER);
        }
        
        
    }

	public function index(){
		if($this->input->post('first_name')){
			
		}else{
			$data = [];
			$data['user_detail'] = $this->LoginModal->getLoggedUser($this->session->userdata('portal_email'), $this->session->userdata('portal_role'), $this->session->userdata('portal_user_id'));
			$data['mainbodyContent'] 	= $this->load->view('backend/profile',$data,TRUE);
			$this->load->view('backend/master_view',$data);	
		}
		
	}
	
	public function change_password(){
		$data = [];
		$data['user_detail'] = $this->LoginModal->getLoggedUser($this->session->userdata('portal_email'), $this->session->userdata('portal_role'), $this->session->userdata('portal_user_id'));
		$data['mainbodyContent'] 	= $this->load->view('backend/change_password',$data,TRUE);
		$this->load->view('backend/master_view',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(BACKEND_FOLDER);
		
	}
}
