<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tutor_modal extends CI_Model{
	function __construct() {
	    $this->table = 'posts';
	}
	
	
	public function get_page_details($slug , $type){
        $this->db->select(array('p.*', 'pc.name as category_name'));
        $this->db->from($this->table.' p');
        $this->db->where('url_slug', trim($slug));
        $this->db->join('post_categories pc', 'pc.id = p.category_id', 'left');
        $this->db->where('p.type', trim($type));
        $this->db->where('p.status', '1');
        $query = $this->db->get();
        return $query->row();
        
   }

   public function postList($limit,$start,$type, $id = '', $search_string = ''){
        $this->db->limit($limit,$start);
        $this->db->select(array('p.*','u.first_name','u.last_name', 'pc.name as category_name'));
        $this->db->from($this->table.' p');
        $this->db->join('user u', 'u.id = p.created_by', 'left');
        $this->db->join('post_categories pc', 'pc.id = p.category_id', 'left');
        $this->db->where('p.type', trim($type));
        if(trim($id) != ''){
            $this->db->where('p.id', trim($id));
        }
        
        if(trim($search_string) != ''){
            $this->db->group_start();
            $this->db->like('p.title',$search_string);
            $this->db->or_like('p.url_slug',$search_string);
            $this->db->or_like('p.description',$search_string);
            $this->db->group_end();
        }
        $query = $this->db->get();
        if(trim($id) == ''){
            return $query->result_array();
        }else{
            return $query->row();
        }
        
   }

   public function postListCount($type, $id = '', $search_string = '') {
        $this->db->from($this->table);
        $this->db->where('type', trim($type));
        if(trim($id) != ''){
            $this->db->where('id', trim($id));
        }
        
        if(trim($search_string) != ''){
            $this->db->group_start();
            $this->db->like('title',$search_string);
            $this->db->or_like('url_slug',$search_string);
            $this->db->or_like('description',$search_string);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
         
   }
    public function insert_data($table,$data=array()){   
        
        $insert   = $this->db->insert($table,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    public function update_user($where, $data){  
        $this->db->update('tutorregister', $data, $where);
        return true;
    }

    public function update_users($where, $data){  
        $this->db->update('user', $data, $where);
        return true;
    }
    public function check_tutor_is_exist($email,$password,$type) 
    {
        $this->db->from('user');
        $this->db->where('email', trim($email));
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        #return $this->db->last_query();
        if($type == 1)
        {
            return $query->num_rows();
        }else{
            return $query->result_array();
        }
   }
    public function check_tutor_detail($tutor_id) 
    {
        $this->db->from('userdetails');
        $this->db->where('user_id', trim($tutor_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function check_tutor_registration_detail($tutor_id) 
    {
        $this->db->from('tutorregister');
        $this->db->where('tutor_id', trim($tutor_id));
        $query = $this->db->get();
        #return $this->db->last_query();
        return $query->result_array();
    }
    public function get_user_detail($tutor_id) 
    {
        $this->db->from('user');
        $this->db->where('id', trim($tutor_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function check_tutor_balance($tutor_id) 
    {
        $this->db->from('tutorbalance');
        $this->db->where('tutor_id', trim($tutor_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function check_tutor_account($tutor_id) 
    {
        $this->db->from('tutoraccount');
        $this->db->where('tutor_id', trim($tutor_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_order_detail($subject,$assigned,$status) 
    {
        $this->db->from('orders');
        $this->db->where('subject', trim($subject));
        $this->db->where('assigned', trim($assigned));
        $this->db->where('status', trim($status));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_tutor_account($where, $data){  
        $this->db->update('tutoraccount', $data, $where);
        return true;
    }
    
    public function get_questions($subject,$tag,$limit) 
    {
        $this->db->from('allquestions');
        $this->db->where('subject', trim($subject));
        $this->db->where('tag', trim($tag));
        $this->db->order_by('rand()');
        $this->db->limit($limit);
        $query = $this->db->get();
        #return $this->db->last_query();
        return $query->result_array();
    }
    public function get_questions_detail_by_id($question_id) 
    {
        $this->db->from('allquestions');
        $this->db->where('id', trim($question_id));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function TutorSolvedAssignment($tutor_id) 
    {
        $this->db->from('orders');
        $this->db->where('tutor_id', trim($tutor_id));
        $this->db->where('status', 'Assignment Completed');
        $this->db->where('status', 'Review Your Assignment');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function TutorLabs($tutor_id) 
    {
        $this->db->from('tutoraccount');
        $this->db->where('tutor_id', trim($tutor_id));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function TutorEarned($tutor_id) 
    {
        $this->db->from('tutoraccount');
        $this->db->where('tutor_id', trim($tutor_id));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function TutorPaymentHistory($tutor_id) 
    {
        $this->db->from('tutoraccount');
        $this->db->where('tutor_id', trim($tutor_id));
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function TutorWorkingAssignment($tutor_id) 
    {
        $this->db->from('orders');
        $this->db->where('tutor_id', trim($tutor_id));
        $this->db->where('status != "Assignment Completed"');
        $this->db->where('status != "Review Your Assignment"');
        $this->db->where('status != "Order Rejected"');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function TutorAvailabelOrder($tutor_id) 
    {   $this->db->select(array('orders.*', 'ao.interested'));
        $this->db->from('orders');
        $this->db->join('available_orders ao', 'ao.task_id = orders.id AND ao.tutor_id ="'.$tutor_id.'"', 'left');
        $this->db->where('FIND_IN_SET ('.$tutor_id.', float_ids)');
        $this->db->where('orders.tutor_id','0');
        $query = $this->db->get();
        #return $this->db->last_query();
        return $query->result_array();
    }
}