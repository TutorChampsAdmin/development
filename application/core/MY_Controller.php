<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{ 
    public function __construct()
    { 
      parent::__construct(); 
        $user_id = $this->session->userdata('client_user_id');
        $query = $this->db->get_where('notifications', array('user_id' => $user_id));
        $result = $query->result();
        $data['notifications'] = $result;
        $this->load->view('users/head', $data); 
    }

}