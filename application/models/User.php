<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
	function __construct() {
	    $this->table = 'user';
	}
	

   public function userList($limit,$start, $search_string = '',$type = ''){
        $this->db->limit($limit,$start);
        $this->db->select(array('u.id','u.first_name','u.email','ud.user_type','ud.phone', 'u.date_joined'));
        $this->db->from($this->table.' u');
        $this->db->join('userdetails ud', 'ud.user_id = u.id', 'left');
        if(trim($type) == ''){
             $this->db->where('ud.user_type', 'Student');
        }else{
             $this->db->where('ud.user_type', 'Tutor');
        }
        if(trim($search_string) != ''){
            $this->db->group_start();
            $this->db->like('u.first_name',$search_string);
            $this->db->or_like('u.email',$search_string);
            $this->db->or_like('ud.phone',$search_string);
            $this->db->or_like('u.id',str_replace('S','',$search_string));
            $this->db->or_like('u.id',str_replace('T','',$search_string));
             $this->db->or_like('u.id',str_replace('s','',$search_string));
            $this->db->or_like('u.id',str_replace('t','',$search_string));
            $this->db->group_end();
        }
        $this->db->order_by('u.id','desc');
        $query = $this->db->get();
        return $query->result_array();
       
   }

   public function userListCount($search_string = '',$type = '') {
        $this->db->select('count(u.id) AS total_records');
        $this->db->from($this->table.' u');
        $this->db->join('userdetails ud', 'ud.user_id = u.id', 'left');
         if(trim($type) == ''){
             $this->db->where('ud.user_type', 'Student');
        }else{
             $this->db->where('ud.user_type', 'Tutor');
        }
        if(trim($search_string) != ''){
            $this->db->group_start();
            $this->db->like('u.first_name',$search_string);
            $this->db->or_like('u.email',$search_string);
            $this->db->or_like('u.id',str_replace('S','',$search_string));
            $this->db->or_like('u.id',str_replace('T','',$search_string));
            $this->db->or_like('u.id',str_replace('s','',$search_string));
            $this->db->or_like('u.id',str_replace('t','',$search_string));
            $this->db->group_end();
        }
        $query = $this->db->get();
        $ta = $query->row();
        return $ta->total_records;
         
   }
  
  
  
    public function userListTutor($limit,$start, $search_string = ''){
        $this->db->limit($limit,$start);
        $this->db->select(array('tr.*','u.email', 'u.date_joined'));
        $this->db->from('tutorregister tr');
        $this->db->join('user u', 'u.id = tr.tutor_id', 'left');
       
        if(trim($search_string) != ''){
            $this->db->group_start();
            $this->db->like('tr.phone',$search_string);
            $this->db->or_like('tr.name',$search_string);
            $this->db->or_like('tr.tutor_id',str_replace('T','',$search_string));
            $this->db->or_like('tr.tutor_id',str_replace('t','',$search_string));
            $this->db->group_end();
        }
        $this->db->order_by('tr.id','desc');
        $query = $this->db->get();
        #return $this->db->last_query();
        return $query->result_array();
       
   }

   public function userListCountTutor($search_string = '') {
        $this->db->select('count(id) AS total_records');
        $this->db->from('tutorregister');
       
        if(trim($search_string) != ''){
            $this->db->group_start();
            $this->db->like('phone',$search_string);
            $this->db->or_like('name',$search_string);
            $this->db->or_like('tutor_id',str_replace('T','',$search_string));
            $this->db->or_like('tutor_id',str_replace('t','',$search_string));
            $this->db->group_end();
        }
        $query = $this->db->get();
        $ta = $query->row();
        return $ta->total_records;
         
   }


     public function update_user($where,$data){
          $this->db->update('user', $data, $where);
        return true;
   }


   public function orderList($limit,$start, $search_string = '',$type = ''){
        $this->db->limit($limit,$start);
        $this->db->select(array('o.*','u.first_name','u.email','t.first_name as assinged_to'));
        $this->db->from('orders o');
        $this->db->join('user u', 'u.id = o.user_id', 'left');
        $this->db->join('user t', 't.id = o.tutor_id', 'left');
        $this->db->where('o.user_id !="0"');
        if(trim($search_string) != ''){
            $this->db->like('o.order_id',$search_string);
        }
        $this->db->order_by('o.id','desc');
        $query = $this->db->get();
        return $query->result_array();
       
   }

   public function orderListCount($search_string = '',$type = '') {
        $this->db->select('count(o.id) AS total_records');
        $this->db->from('orders o');
        $this->db->join('user u', 'u.id = o.user_id', 'left');
        $this->db->where('o.user_id !="0"');
        if(trim($search_string) != ''){
            $this->db->like('o.order_id',$search_string);
        }
        $query = $this->db->get();
        $ta = $query->row();
        return $ta->total_records;
         
   }

   public function get_tutors($limit,$start, $subject_id){
        $this->db->limit($limit,$start);
        $this->db->select(array('t.name','t.tutor_id','t.unique_id','t.subject'));
        $this->db->from('tutorregister t');
        if(trim($subject_id) != ''){
           $this->db->where('t.subject', $subject_id);
        }
        $this->db->order_by('t.name','asc');
        $query = $this->db->get();
        return $query->result_array();
       
   }

   public function get_confirm_tutors($orderId){
       
        $this->db->select(array('ao.*','u.first_name','u.email'));
        $this->db->from('available_orders ao');
        $this->db->join('user u', 'u.id = ao.tutor_id', 'left');
        $this->db->where('ao.task_id', $orderId);
        $this->db->order_by('ao.id','desc');
        $query = $this->db->get();
        return $query->result_array();
       
   }
   
 
   
   public function update_order($where,$data){
          $this->db->update('orders', $data, $where);
           #return $this->db->last_query();
         return true;
   }


    public function delete_data_by_id($id,$table)
    {   
        $this->db->where('id', $id);
        $this->db->delete($table);
        return true;
    }
    
    
     public function insertData($table, $data=array()){  
        $insert   = $this->db->insert($table,$data);
        #return $this->db->last_query();
        if($insert){
            return $this->db->insert_id();
           
        }else{
            return false;
        }
    }
    
    
    
     public function getOrderComments($lead_id, $count = ''){
  
        $current_role = $this->session->userdata('logged_in_role');
        $current_uid  = $this->session->userdata('logged_in_id');
        $whereExpert = '';
        if(trim($current_role) == '9'){
            $whereExpert = ' AND (o.added_by = "'.$current_uid.'" OR o.to_writer = "1") '; 
        }
        
         if(trim($current_role) == '8'){
            $whereExpert = ' AND (o.added_by = "'.$current_uid.'" OR o.to_customer = "1") '; 
        }
        $query = $this->db->query('SELECT o.*,u.username,
            oa.file_path AS attachment_url,oa.file_name AS actual_file_name

                                 -- GROUP_CONCAT( oa.file_path ORDER BY oa.added_on) AS attachment_url,
                                 -- GROUP_CONCAT( oa.file_name ORDER BY oa.added_on) AS actual_file_name
                               FROM order_comments o
                               LEFT JOIN user u on u.id = o.added_by
                               LEFT JOIN order_attachments oa ON o.cmt_id = oa.comment_id
                               WHERE o.order_id = "'.$lead_id.'" '.$whereExpert.' GROUP BY o.cmt_id');
        #return $this->db->last_query();
        if(trim($count) == ''){
            return $query->result_array();
        }else{
            return $query->num_rows();
        }

   }
   
   
      function getTutorById($id){
         $this->db->select(array('first_name','email'));
         $this->db->from('user');
         $this->db->where('id',$id);
         $query = $this->db->get();
         $result = $query->row_array();
         return $result;
     }

}



   