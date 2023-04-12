<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("geoip2.phar");
use GeoIp2\Database\Reader;
// CI_Controller
class Dashboard extends  MY_Controller {
     
     
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_dashboard');
        date_default_timezone_set('Asia/Calcutta');
        if($this->session->userdata('isClientLoggedIn') && $this->session->userdata('client_user_id') != ''){
              $this->user_id = $this->session->userdata('client_user_id');
        }else{
             redirect(base_url('login/'));
        }
    }


    public function index() {
       
        $orders = $this->User_dashboard->get_orders($this->user_id);
        $LabOrders = $this->User_dashboard->get_lab_orders($this->user_id);
        $user_detail = $this->User_dashboard->get_user_details($this->user_id);
      
        $data = [
                    'orders'  => $orders,
                    'LabOrders'  => $LabOrders,
                    'user_detail'  => $user_detail
                ];
        $this->load->view('users/home',$data);
    }

    public function tracking($order_id){
       
        if($this->input->post('order_id'))
        {
            $where = ['order_id'=>$this->input->post('order_id')];
           $data = [
                'status'=>"Checking Tutor Availability",
                'description'=>$this->input->post('description'),
                'deadline'=>($this->input->post('deadline'))?date('Y-m-d H:i:s', strtotime($this->input->post('deadline'))):null
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
            if(isset($_FILES['refFiles']) && $_FILES['refFiles']['name'] != ''){
                
                $image_name_arr            = explode('.', $_FILES['refFiles']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('files')){
                    $data['ref_files'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }
            $this->load->helper('url');
            $data['title'] = 'My Website';
            $this->output->set_header('title: ' . $data['title']);
            $this->db->update('orders', $data, $where);
        } 

        $ord = $this->User_dashboard->get_order($this->user_id,$order_id);
        
        $data = [
                'order'=>$ord
            ];
        $this->load->view('users/tracking',$data);
    }
    public function home(){
        $this->load->view('users/home');
    }
    public function history(){
        $orders = $this->User_dashboard->get_orders($this->user_id);
        $LabOrders = $this->User_dashboard->get_lab_orders($this->user_id);
        $user_detail = $this->User_dashboard->get_user_details($this->user_id);
      
        $data = [
                    'orders'  => $orders,
                    'LabOrders'  => $LabOrders,
                    'user_detail'  => $user_detail
                ];
        $this->load->view('users/history',$data);
    }
    public function refer(){
        $this->load->view('users/refer');
    }


    public function reward(){
        $this->load->view('users/reward');
    }
    
    public function faq(){
        $this->load->view('users/faq');
    }
    public function profile(){

        if($this->input->post('update_p') && trim($this->input->post('nae')) != ''){
            $update_arr_user = [
                                'first_name'    => $this->input->post('nae'),
                            ];

            $this->User_dashboard->update_user(array('user_id' => $this->user_id), $update_arr_user);
         
            $update_arr = [
                            'name'          => $this->input->post('nae'),
                            'phone'         => $this->input->post('if-phone'),
                            'study_level'   => $this->input->post('College'),
                       ];
            if(isset($_FILES['profile']) && $_FILES['profile']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['profile']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('profile')){
                    $update_arr['profile'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }              
           
            $this->User_dashboard->update_user_detail(array('user_id' => $this->user_id), $update_arr);

            die('Details Updated Successfully');
        }else{
            $this->load->view("users/profile");
        }
        
    }


     public function reset_password(){
        
        if($this->input->post('password')){
            $user_id = $this->session->userdata('client_user_id');
            $update  = $this->User_dashboard->update_user(array('id'=> $user_id), array('password' => md5($this->input->post('password'))));

            if($update){
                die('Password changes successfully');
            }else{
                die('Try again.');
            }
        }
    }

   
    public function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }

    public function order(){
        $ip = $this->get_User_Ip_Address();
		if($ip!=='::1'){
			$reader = new Reader('GeoLite2-City.mmdb');
			$record = $reader->city($ip);
			$country = $record->country->name;
		}
		else {
			$country='';
		}
        if( trim($this->input->post('order_from_dashboard')) != '' && trim($this->input->post('order_from_dashboard')) != '' ){
            $data = [
                    'status'    => 'Awaiting Confirmation',
                    'description'      => $this->input->post('desc'),
                    // 'deadline'  => $this->input->post('deadline'),
                    // 'subject'   => $this->input->post('subject'),
                    'assigned'  => 'False',
                    'submission_date' => date('Y-m-d'),
                    'country'   => $country,
                    'user_id' => $this->user_id
                    ];
             if(isset($_FILES['assignment']) && $_FILES['assignment']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['assignment']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('assignment')){
                    $data['assignment'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }  

            if(isset($_FILES['reference_material']) && $_FILES['reference_material']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['reference_material']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('reference_material')){
                    $data['reference_material'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }  
                    
            $insert_id = $this->User_dashboard->insert('orders',$data);
            
            if($insert_id){
                $commentsData = [
                    'message'       =>  "Welcome To TutorChamps. Let Us know How We Can Help You In This Assignment",     
                    'first_comment' => '1',   
                    'order_id'      => $insert_id,    
                    'user_role'     => '8',     
                    'added_on'      => date('Y-m-d H:i:s'),     
                    'added_by'      => '1',     
                    'to_users'      => $this->session->userdata('logged_in_id').',1',
                    'to_user_role'  => '1,8',
                    'to_writer'     => '0',
                    'to_customer'   => '1',
               ];
               
               $this->User_dashboard->insert('order_comments',$commentsData);
                $this->User_dashboard->update__data('orders',array('id' =>$insert_id,'user_id' => $this->user_id), array('order_id' => 'TC-HW-'.$insert_id));
                $data = ['order_id'=>'TC-HW-'.$insert_id];
                die(json_encode($data));
                // die('success');
            }else{
                die('Someting went wrong. Please try again.');
            }
        }else{
            die('You are spaming.');
        }
    }


    public function live_session_orders(){


        if( trim($this->input->post('order_from_dashboard')) != '' && trim($this->input->post('order_from_dashboard')) != '' ){
            $data = [
                    'status'    => 'Awaiting Confirmation',
                    'description'      => $this->input->post('desc'),
                    'deadline'  => $this->input->post('deadline'),
                    'subject'   => $this->input->post('subject'),
                    'assigned'  => 'False',
                    'duration'  => $this->input->post('Duration'),
                    'submission_date' => date('Y-m-d'),
                    'country'   => '',
                    'user_id' => $this->user_id
                    ];
             if(isset($_FILES['assignment']) && $_FILES['assignment']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['assignment']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('assignment')){
                    $data['assignment'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }  

            if(isset($_FILES['reference_material']) && $_FILES['reference_material']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['reference_material']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('reference_material')){
                    $data['reference_material'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }  
                    
            $insert_id = $this->User_dashboard->insert('orders',$data);
            
            if($insert_id){
                $this->User_dashboard->update__data('orders',array('id' =>$insert_id,'user_id' => $this->user_id), array('order_id' => 'TC-HW-'.$insert_id));
                die('success');
            }else{
                die('Someting went wrong. Please try again.');
            }
        }else{
            die('You are spaming.');
        }
    
    }

    public function lab_orders(){
         if( trim($this->input->post('order_from_dashboard')) != '' && trim($this->input->post('order_from_dashboard')) != '' ){
            $data = [
                    'status'    => 'Awaiting Confirmation',
                    'deadline'  => $this->input->post('deadline'),
                    'subject'   => $this->input->post('subject'),
                    'assigned'  => 'False',
                    'submission_date' => date('Y-m-d'),
                    'country'   => '',
                    'user_id' => $this->user_id
                    ];
             if(isset($_FILES['report_guidline']) && $_FILES['report_guidline']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['report_guidline']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('report_guidline')){
                    $data['report_guidline'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }  

            if(isset($_FILES['lab_manual']) && $_FILES['lab_manual']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['lab_manual']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('lab_manual')){
                    $data['lab_manual'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }  

            if(isset($_FILES['reference_material']) && $_FILES['reference_material']['name'] != ''){
                $image_name_arr            = explode('.', $_FILES['reference_material']['name']);
                $image_name                = str_replace(' ', '_', $image_name_arr['0']);
                $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
                $config['upload_path']     = UPLOAD_DIR;
                $config['file_name']       = $newFileName;
                #$config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                $config['allowed_types']   = '*';      
                $this->upload->initialize($config);
                if($this->upload->do_upload('reference_material')){
                    $data['reference_material'] = UPLOAD_DIR.$newFileName;
                }else{
                    #print_r($this->upload->display_errors());
                }
                
            }  
                    
            $insert_id = $this->User_dashboard->insert('laborders',$data);
            
            if($insert_id){
                $this->User_dashboard->update__data('laborders',array('id' =>$insert_id,'user_id' => $this->user_id), array('order_id' => 'TC-HW-'.$insert_id));
                die('success');
            }else{
                die('Someting went wrong. Please try again.');
            }
        }else{
            die('You are spaming.');
        }
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

    public function upsertNotification($id,$payload,$insert=true){
         $notificatio=[
            'ref_type'=>'order',
            'ref_no'=>$payload->order_id,
            'user_id'=>$payload->user_id,
            'message'=>$payload->message,
            'message'=>$payload->message,
            'is_ seen'=>'1',            
         ];

         if($id)
            $this->db->update__data('orders',array('id' => $id),$notificatio); 
         else 
            $this->db->insert('notifications',$notificatio);

        true;
    }

}

