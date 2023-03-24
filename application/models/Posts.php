<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Posts extends CI_Model{
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
        $this->db->join('user_old u', 'u.id = p.created_by', 'left');
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


   public function postCaegoryList($id = '', $search_string = ''){
        $this->db->select(array('*'));
        $this->db->from('post_categories');
        if(trim($id) != ''){
            $this->db->where('id', trim($id));
        }
        
        if(trim($search_string) != ''){
            $this->db->group_start();
            $this->db->like('name',$search_string);
            $this->db->or_like('slug',$search_string);
            $this->db->group_end();
        }
        $this->db->order_by('name','ASC');
        $query = $this->db->get();
        if(trim($id) == ''){
            return $query->result_array();
        }else{
            return $query->row();
        }
   }


   public function insert($data = array()){

        $insert   = $this->db->insert($this->table,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
   }


   public function update($where, $data) {  
        $this->db->update($this->table, $data, $where);
        return true;
    }

    public function insert_category($data = array()){

        $insert   = $this->db->insert('post_categories',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
   }


   public function update_category($where, $data) {  
        $this->db->update('post_categories', $data, $where);
        return true;
    }
      
    public function slug_exists_category($slug, $id = ''){   
        $this->db->from('post_categories');
        $this->db->where('slug',$slug);
        if(trim($id) != ''){
            $this->db->where('id !=',$id);    
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
      
   
    public function slug_exists($slug, $id = '', $type){   
        $this->db->from($this->table);
        $this->db->where('url_slug',$slug);
        if(trim($id) != ''){
            $this->db->where('id !=',$id);    
        }
        $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            echo "Yes";
        }
        else{
            echo  "No";
        }
    }


  
       #=================== Get all posts =====================
     public function all_post_lists($limit, $start, $catId = '') {
        
        $this->db->limit($limit, $start);
        $this->db->select(array('q.*','u.first_name', 'u.last_name', 'pc.name AS cat_name', 'pc.slug AS catUrl'));
        $this->db->from('posts as q');
        $this->db->join('user u','u.id = q.created_by','left');
        $this->db->join('post_categories pc','pc.id = q.category_id','left');
        $this->db->where('q.status', '1');
        $this->db->where('q.type', 'post');
       
        if($catId != '' || $catId != '0'){
          $this->db->where('q.category_id', $catId);
        }
        $this->db->order_by('q.created_date','DESC');
        $query = $this->db->get();
         //return $this->db->last_query();
        return $query->result_array();
    }


    #================ Category post ==================

    public function cat_post_lists( $cat , $limit = 1, $blogIds = '') {
        
        $this->db->limit($limit);
        $this->db->select(array('q.*','u.first_name', 'u.last_name', 'pc.name AS cat_name', 'pc.slug AS catUrl'));
        $this->db->from('posts as q');
        $this->db->join('user u','u.id = q.created_by','left');
        $this->db->join('post_categories pc','pc.id = q.category_id','left');
        $this->db->where('q.status', '1');
        $this->db->where('q.type', 'post');
        $this->db->where('q.category_id', $cat);
       
        if($blogIds != ''){
          $this->db->where('q.id NOT IN('.$blogIds.')');
        }
        $this->db->order_by('q.created_date','DESC');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    #========== Get category meta ============

     public function get_category_meta($cat_id) {
        $this->db->select(array('*'));
        $this->db->from('post_categories');
        $this->db->where('id', $cat_id);
        $query = $this->db->get();
        return json_decode(json_encode($query->row()), True); 
    }
    #================== Get latest post ===================

    public function latest_post_lists($limit = 2, $currentPostId = 'no' , $CategoryId = 'no') {
        
        $this->db->limit($limit);
        $this->db->select(array('q.*','u.first_name', 'u.last_name', 'pc.name AS cat_name', 'pc.slug AS catUrl'));
        $this->db->from('posts as q');
        $this->db->join('user u','u.id = q.created_by','left');
        $this->db->join('post_categories pc','pc.id = q.category_id','left');
        $this->db->where('q.status', '1');
        $this->db->where('q.type', 'post');
       
        if(trim($CategoryId) != 'no'){
          $this->db->where('q.category_id', $CategoryId);
        }
        if(trim($currentPostId) != 'no'){
        $this->db->where('q.id !="'.$currentPostId.'"');
        }
        $this->db->order_by('q.created_date','DESC');
        $query = $this->db->get();
         //return $this->db->last_query();
        return $query->result_array();
    }


     public function blog_page_latest_post_lists($limit = 2) {
        
        $this->db->limit($limit);
        $this->db->select(array('q.*','u.first_name', 'u.last_name', 'pc.name AS cat_name', 'pc.slug AS catUrl'));
        $this->db->from('posts as q');
        $this->db->join('user u','u.id = q.created_by','left');
        $this->db->join('post_categories pc','pc.id = q.category_id','left');
        $this->db->where('q.status', '1');
        $this->db->where('q.type', 'post');
     
        $this->db->order_by('q.created_date','DESC');

        
        $query = $this->db->get();
       
        return $query->result_array();
    }


    public function get_category_id($catSlug) {
        
        $this->db->select(array('id'));
        $this->db->from('post_categories');
        $this->db->where('slug',$catSlug);
      
        $query = $this->db->get();
        $sub = json_decode(json_encode($query->row()), True);
        return @$sub['id'];
        
    }


   #============= Popular post=============
    public function popular_post_lists($limit = 6) {
        
        $this->db->limit($limit);
        $this->db->select(array('q.title', 'q.url_slug', 'q.created_date','q.featured_image','u.first_name', 'u.last_name', 'pc.name AS cat_name'));
        $this->db->from('posts as q');
        $this->db->join('user u','u.id = q.created_by','left');
        $this->db->join('post_categories pc','pc.id = q.category_id','left');
        $this->db->where('q.status', '1');
        $this->db->where('q.type', 'post');
        $this->db->where('q.latest_view_date  >= CURDATE() - INTERVAL 90 DAY');
        $this->db->order_by('q.page_view_count','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    #============= Trending post =============
    public function trending_posts_post_lists($limit = 12) {
        
        $this->db->limit($limit);
        $this->db->select(array('q.title', 'q.url_slug','q.created_date', 'q.featured_image'));
        $this->db->from('posts as q');
        $this->db->where('q.status', '1');
        $this->db->where('q.type', 'post');
      
        $this->db->where('q.latest_view_date  >= CURDATE() - INTERVAL 7 DAY');
        $this->db->order_by('q.page_view_count','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }



     public function post_search($limit, $start,$string) {
         if($string != ''){
          
          $this->db->select(array('q.*','u.first_name','u.last_name', 'pc.name AS cat_name', 'pc.slug AS catUrl'));
          $this->db->from('posts as q');
          $this->db->join('user u','u.id = q.created_by','left');
          $this->db->join('post_categories pc','pc.id = q.category_id','left');
          $this->db->where('q.status', '1');
          $this->db->where('q.type', 'post');
     
          $this->db->limit($limit, $start);
          $this->db->group_start();
          $this->db->like('q.title',$string);
          $this->db->or_like('q.url_slug',$string);
          $this->db->or_like('q.description',$string);
          $this->db->group_end();
          $this->db->order_by('q.created_date','DESC');
          $query = $this->db->get();
          return $query->result_array();
         }else{
          return array();
         }
        
    }


   public function latest_blogs() {
        
        $this->db->limit(4, 0);
        $this->db->select(array('q.url_slug','q.title','q.featured_image','q.description'));
        $this->db->from('posts as q');
        $this->db->where('q.status', '1');
        $this->db->where('q.type', 'post');
      
        $this->db->order_by('q.created_date','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function total_reocords_count($CategoryId) {
      $this->db->select('id AS total_records');
      $this->db->from('posts');
      $this->db->where('status', '1');
      $this->db->where('type', 'post');
      
      if($CategoryId != '' || $CategoryId != '0'){
          $this->db->where('category_id', $CategoryId);
      }
       $query = $this->db->get();
       return $query->num_rows();
    }


    public function total_reocords_count_for_search($string) {

       $this->db->select('id AS total_records');
       $this->db->from('posts');
       $this->db->where('status', '1');
       $this->db->where('type', 'post');
      
       $this->db->group_start();
       $this->db->like('title',$string);
       $this->db->or_like('url_slug',$string);
       $this->db->or_like('description',$string);
       $this->db->group_end();
       $query = $this->db->get();
       //$this->db->last_query();
       return $query->num_rows();
    }
     
     // for fetch data by id

     public function get_one_post($url, $pre = '') {
        $this->db->select(array('q.*', 'u.id AS user_id' , 'u.first_name' , 'u.last_name'  , 'pc.name AS cat_name', 'pc.slug AS catUrl'));
        $this->db->from('posts as q');
        $this->db->join('user u','q.created_by = u.id ','left');
        $this->db->join('post_categories pc','pc.id = q.category_id','left');
        $this->db->where('q.url_slug',strtolower($url));
       
        if(!isset($pre) && $pre ==''){
          $this->db->where('q.status', '1'); 
       }
        $this->db->where('type', 'post');
        $query = $this->db->get();
        return $query->row();
    }

   public function get_category_list($limit = '0') {
        if($limit != '0'){
        $this->db->limit($limit);  
        }
        $this->db->select(array('id','slug', 'name'));
        $this->db->from('post_categories');
        $this->db->where('status','1');
        $this->db->order_by('name');
        $query = $this->db->get();
        return $query->result_array();
    }  
   

    # Post Next Link
    public function post_next_link($currentPostId){
        $query = $this->db->query("SELECT title, url_slug FROM posts WHERE type = 'post' AND id = (SELECT MIN(id) FROM posts WHERE id > $currentPostId AND type = 'post')");
        return json_decode(json_encode($query->row()), True);
    }
   

   # Prevoius Post Link

    public function post_previous_link($currentPostId){
        $query = $this->db->query("SELECT title, url_slug FROM posts WHERE type = 'post' AND id = (SELECT MAX(id) FROM posts WHERE id < $currentPostId AND type = 'post')");
        return json_decode(json_encode($query->row()), True);
    }
  
  public function get_related_post($category, $currentPost){

     $query = $this->db->query("SELECT title, url_slug ,featured_image, created_date  FROM posts WHERE ( category_id IN ($category) ) AND id != $currentPost AND category_id != '0' AND latest_view_date  >= (CURDATE() - INTERVAL 90 DAY) ORDER BY page_view_count LIMIT 3");
     return $query->result_array();
  }

   

   public function count_visit($id){
    $date = date('Y-m-d H:i:s');
    $this->db->query("UPDATE posts SET page_view_count = (page_view_count +1) , latest_view_date = '".$date."' WHERE id = ".$id."");
   }     
}