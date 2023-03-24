<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page404 extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->country_page = '0';
        $this->eligibility  = '0';
        date_default_timezone_set('Asia/Calcutta');
    }

	public function index(){
		$data['meta_title']       = "404 - Page Not Found";
        $data['meta_description'] = "";
        $data['meta_keywords']    = "";
        $data['index_follow']     = "0";
        $data['pageTitle']        = '404';
        $data['page404']          = '1';
        $this->output->set_status_header('404');
        $data['mainbodyContent'] 	= $this->load->view('contents/404',$data,TRUE);
	    $this->load->view('main_view',$data);
	}
	
}
 