<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_dashboard extends CI_Model{
	function __construct() {
	    
	}
	
	
	public function get_user_details($uid){
        $this->db->select(array('*'));
        $this->db->from('userdetails');
        $this->db->where('user_id', $uid);
        $query = $this->db->get();
        return $query->row();
   }

   public function get_orders($uid = ''){
        $this->db->select(array('*'));
        $this->db->from('orders');
        $this->db->where('user_id', $uid);
        $query = $this->db->get();
        return $query->result_array();
   }
   public function get_order($uid = '',$order_id=''){
        $this->db->select(array('*'));
        $this->db->from('orders');
        $this->db->where('user_id', $uid);
        $this->db->where('order_id',$order_id);
        $query = $this->db->get();
        return $query->result_array();
   }

   public function get_lab_orders($uid = ''){
        $this->db->select(array('*'));
        $this->db->from('laborders');
        $this->db->where('user_id', $uid);
        $query = $this->db->get();
        return $query->result_array();
        
     }



    public function update_user($where, $data){  
        $this->db->update('user', $data, $where);
        return true;
    }


     public function update__data($table,$where, $data){  
        $this->db->update($table, $data, $where);
        return true;
    }


     public function update_user_detail($where, $data){  
        $this->db->update('userdetails', $data, $where);
        return true;
    }


    function getRows($email, $password = ''){
         $this->db->select('*');
         $this->db->from('user');
         $this->db->where('email',$email);
         if(trim($password) !=''){
               $this->db->where('password',$password);
         }
         $query = $this->db->get();
         //return $this->db->last_query();
         $result = $query->row_array();
         return $result;
     }

      function getRows2($email, $token){
         $this->db->select('*');
         $this->db->from('user');
         $this->db->where('email',$email);
         $this->db->where('token',$token);
         $query = $this->db->get();
         //return $this->db->last_query();
         $result = $query->row_array();
         return $result;
     }


     public function email_exists($email){
        $this->db->where('email',$email);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function insert_users($table,$data=array()){   
        
        $insert   = $this->db->insert($table,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }


     public function insert($table, $data=array()){  
        $insert   = $this->db->insert($table,$data);
        if($insert){
            return $this->db->insert_id();
           
        }else{
            return false;
        }
    }


}