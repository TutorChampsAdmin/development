<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Form_action extends CI_Model{
	function __construct() {
	    $this->table = 'enquiry';
	}
      
   
    public function insert($table, $data=array()){  
        $insert   = $this->db->insert($table,$data);
        if($insert){
            return $this->db->insert_id();
           
        }else{
            return false;
        }
    }


    public function update($table ,$where, $data){  
        $this->db->update($table, $data, $where);
        return true;
    }

     public function delete($table,$where = array()){  
        $this->db->delete($table, $where);
        return true;
    }
    

}