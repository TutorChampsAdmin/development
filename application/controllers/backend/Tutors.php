<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutors extends CI_Controller {
	
	function __construct()
	{   
		ini_set('memory_limit', '-1');
		parent::__construct();
		
		$this->load->model('User');
		date_default_timezone_set('Asia/Calcutta');
		if($this->session->userdata('b_user_id') == ''){
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
	
		   $userList   = $this->User->userListTutor($rowperpage,$rowno, $search_string); 
		   $total_users  = $this->User->userListCountTutor($search_string);
		   $data  = ['total_users' => $total_users ,'rowperpage' => $rowperpage,'userList' => $userList];
		   die(json_encode($data));
        }else{
        	$data['mainbodyContent'] = $this->load->view('backend/tutors',$data,TRUE);
			$this->load->view('backend/master_view',$data);
        }

	}
	
	
	public function delete_tutor(){
	    $id = trim($this->input->post('uid'));
        $this->db->where('tutor_id', $id);
        $this->db->delete('tutorregister');
        
        $this->db->where('id', $id);
        $this->db->delete('user'); 
        
        $this->db->where('user_id', $id);
        $this->db->delete('userdetails');
	}
	
	
	public function make_tutor_pass($id){
	    $id = trim($this->input->post('uid'));
        $this->db->update('tutorregister', array('result' => 'Pass'), array('tutor_id' => $id));
        $this->db->update('user', array('is_active' => '1'), array('id' => $id));
	}
}
