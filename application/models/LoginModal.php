<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginModal extends CI_Model{
	function __construct() {
	    $this->table = 'user_old';
	}
      
function getRows($email, $role = ''){
    $this->db->select('u.*','r.short_name');
    $this->db->from('user_old u');
    $this->db->where('u.email',$email);
    $this->db->where('u.status','1');
    $query = $this->db->get();
    $result = $query->row_array();
    return $result;
}

function getLoggedUser($email, $role = '', $id){
    $this->db->select('u.*');
    $this->db->from('user_old u');
    $this->db->where('u.email',$email);
    $this->db->where('u.id',$id);
    $this->db->where('u.status','1');
    $query = $this->db->get();
    $result = $query->row_array();
    return $result;
}

function get_roles(){
    $this->db->select('*');
    $this->db->from('roles');
    $this->db->where('status','1');
    $this->db->where('id != 5');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
}

    public function insert($table,$data=array()){  
      
        $insert   = $this->db->insert($table,$data);
    
        if($insert){
            return $this->db->insert_id();
           
        }else{
            return false;
        }
    }


    public function update($table,$where, $data){  
        $this->db->update($table, $data, $where);
        return true;
    }

    
}