<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_posts extends CI_Controller {
	
	function __construct()
	{   
		ini_set('memory_limit', '-1');
		parent::__construct();
		$this->load->model('Posts');
		date_default_timezone_set('Asia/Calcutta');
		if($this->session->userdata('b_user_id') == ''){
        		redirect(BACKEND_FOLDER);
        }

	}
	
	public function index($id = ''){   
        
        if($this->input->get('get_list')){
        	$rowperpage = 15;
			$postData = json_decode($this->input->get('data'));
			$rowno = $postData->rowno;
			if($rowno != 0){
			 	$rowno = ($rowno-1) * $rowperpage;
			}

		   $search_string   = $postData->search_string;
	
		   $postList   = $this->Posts->postList($rowperpage,$rowno,'post',$id, $search_string);
		   $total_posts  = $this->Posts->postListCount('post',$id, $search_string);
		   $data  = ['total_posts' => $total_posts ,'rowperpage' => $rowperpage,'postList' => $postList];
		   die(json_encode($data));
        }else{
        	$data['mainbodyContent'] = $this->load->view('backend/posts',$data,TRUE);
			$this->load->view('backend/master_view',$data);
        }

	}


	public function categories($id = ''){

		if($this->input->get('get_list')){
        	$postData = json_decode($this->input->get('data'));
        	$search_string = $postData->search_string;
        	$postList = $this->Posts->postCaegoryList($id,$search_string);
        	die(json_encode($postList));
        }else{
        	$data['mainbodyContent'] = $this->load->view('backend/posts_categories',$data,TRUE);
			$this->load->view('backend/master_view',$data);
        }
	}



	public function add_categories(){
        $id = $this->input->post('category_id'); 
        $category_name = trim($this->input->post('category_name')); 
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category_name)));

		if((int)$id > 0 && $id != ''){
			$check = $this->Posts->slug_exists_category($slug, $id); 
			if($check == 0){
				$where = array('id'=>$id);
				$data  = array(
					'name'		 		=> $category_name,
					'slug'		 		=> $slug,
					'status'		 	=> $this->input->post('status'),
					'updated_on'		=> date('Y-m-d H:i:s'),
					'updated_by'	    => $this->session->userdata('portal_user_id'),
				);
				$this->Posts->update_category($where, $data); 
				$jsonResponseData = [
									"status"   => "success",
                					"color"    => "green",
                					"message"  => "Category updated successfully!"
								];
			}else{
				$jsonResponseData = [
									"status"   => "success",
                					"color"    => "red",
                					"message"  => "Category already exists. Try anoter Name!"
								];
				
			}
			
			
		}else{
			$check = $this->Posts->slug_exists_category($slug, ''); 
			if($check == 0){
				$data  = array(
						'name'		 		=> $category_name,
						'slug'		 		=> $slug,
						'status'		 	=> $this->input->post('status'),
						'created_by'		=> date('Y-m-d H:i:s'),
						'created_on'	    => $this->session->userdata('portal_user_id'),
				);
				$insert= $this->Posts->insert_category($data);
				$jsonResponseData = [
									"status"   => "success",
                					"color"    => "green",
                					"message"  => "Category addedd successfully!"
								];
			}else{
				$jsonResponseData = [
									"status"   => "success",
                					"color"    => "red",
                					"message"  => "Category already exists. Try anoter Name!s"
								];
			}
			
		}

		die(json_encode($jsonResponseData));

	}


 
	public function add(){

	 
		$data 		= array();
		if($this->input->post('post_name') && $this->input->post('description'))
		{
		$this->form_validation->set_rules('post_name', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
       
     	$data   = array(
					'title'				=> $this->input->post('post_name'),
					'description'		=> $this->input->post('description'),
					'index_follow'      => $this->input->post('index_follow'),
					'meta_title'		=> $this->input->post('meta_title'),
					'meta_description'	=> $this->input->post('meta_description'),
					'meta_keywords'		=> $this->input->post('meta_keywords'),
					'url_slug'			=> $this->input->post('url_slug'),
					'category_id'		=> $this->input->post('category_id'),
					'type'		 		=> 'post',
					'status'		 	=> $this->input->post('status'),
					'created_date'		=> date('Y-m-d H:i:s'),
					'created_by'	 	=> $this->session->userdata('b_user_id'),
					'modified_date'		=> date('Y-m-d H:i:s'),
					'modified_by'	    => $this->session->userdata('b_user_id'),
			);
     	if(isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != ''){
            $image_name_arr            = explode('.', $_FILES['featured_image']['name']);
            $image_name                = str_replace(' ', '_', $image_name_arr['0']);
            $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
            $config['upload_path']     = UPLOAD_DIR;
            $config['file_name']       = $newFileName;
            $config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
            $this->upload->initialize($config);
            if($this->upload->do_upload('featured_image')){
            	$data['featured_image']  = 'media/'.$newFileName;
            }else{
            	#print_r($this->upload->display_errors());
            }

        }


        if(isset($_FILES['list_image']) && $_FILES['list_image']['name'] != ''){
            $image_name_arr            = explode('.', $_FILES['list_image']['name']);
            $image_name                = str_replace(' ', '_', $image_name_arr['0']);
            $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
            $config['upload_path']     = UPLOAD_DIR;
            $config['file_name']       = $newFileName;
            $config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
            $this->upload->initialize($config);
            if($this->upload->do_upload('list_image')){
            	$data['list_image']  = 'media/'.$newFileName;
            }else{
            	#print_r($this->upload->display_errors());
            }

        }

 
		if($this->form_validation->run() == true){  
			
			$insert= $this->Posts->insert($data);

		    if($insert != ''){ 
			$this->generate_sitemaps();
			$jsonResponseData = [
									"status"   => "success",
                					"color"    => "green",
                					"message"  => "Post addedd successfully!"
								];

			}
			else{
				$jsonResponseData = [
									"status"   => "success",
                					"color"    => "red",
                					"message"  => "Something went wrong!"
								];
			 }
	      
		}else{
			$jsonResponseData = [
									"status"   => "success",
                					"color"    => "red",
                					"message"  => "Please fill all required fields!"
								];
		}

		die(json_encode($jsonResponseData));
		 
      }else{
      	$jsonResponseData = [
									"status"   => "success",
                					"color"    => "red",
                					"message"  => "Something went wrong!"
								];
		die(json_encode($jsonResponseData));						
      }
		
	
	}

	
  
	public function edit(){

	    
		$data 		= array();
		if($this->input->post('post_name') && $this->input->post('description')){ 

	     	$data   = array(
					   'title'					=>$this->input->post('post_name'),
					   'category_id'		    => $this->input->post('category_id'),
					   'description'		    =>$this->input->post('description'),
					   'index_follow'           =>$this->input->post('index_follow'),
					   'meta_title'				=>$this->input->post('meta_title'),
					   'meta_description'		=>$this->input->post('meta_description'),
					   'meta_keywords'		    =>$this->input->post('meta_keywords'),
					   'url_slug'			    => $this->input->post('url_slug'),
					   'status'		 			=>$this->input->post('status'),
					   'modified_by'	 		=>$this->session->userdata('user_id'),
					   'modified_date'	 		=>date('Y-m-d H:i:s'),
					 
			);

			if(isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != ''){
            $image_name_arr            = explode('.', $_FILES['featured_image']['name']);
            $image_name                = str_replace(' ', '_', $image_name_arr['0']);
            $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
            $config['upload_path']     = UPLOAD_DIR;
            $config['file_name']       = $newFileName;
            $config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
                
            $this->upload->initialize($config);
            if($this->upload->do_upload('featured_image')){
            	$data['featured_image']  = 'media/'.$newFileName;
            }else{
            	#print_r($this->upload->display_errors());
            }

        }

        if(isset($_FILES['list_image']) && $_FILES['list_image']['name'] != ''){
            $image_name_arr            = explode('.', $_FILES['list_image']['name']);
            $image_name                = str_replace(' ', '_', $image_name_arr['0']);
            $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
            $config['upload_path']     = UPLOAD_DIR;
            $config['file_name']       = $newFileName;
            $config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
            $this->upload->initialize($config);
            if($this->upload->do_upload('list_image')){
            	$data['list_image']  = 'media/'.$newFileName;
            }else{
            	#print_r($this->upload->display_errors());
            }

        }

			
			$where   = array('id'=>$this->input->post('post_id'), 'type' => 'post');
			$update= $this->Posts->update($where, $data); 
			if($update != ''){ 
			    
			  $this->generate_sitemaps();  
			
			$jsonResponseData = [
									"status"   => "success",
                					"color"    => "green",
                					"message"  => "Post update successfully!"
								];

			}
			else{
				$jsonResponseData = [
									"status"   => "success",
                					"color"    => "red",
                					"message"  => "Something went wrong!"
								];
			 }

			die(json_encode($jsonResponseData));
        
		}else{
      	$jsonResponseData = [
									"status"   => "success",
                					"color"    => "red",
                					"message"  => "Something went wrong!"
								];
		die(json_encode($jsonResponseData));						
      }
	
	}



	public function get_slug(){
		$slug = $this->input->post('slug');
		$id   = $this->input->post('id');
	    return $this->Posts->slug_exists(trim($slug), trim($id) ,'page');
	}
    
    
    	public function generate_sitemaps(){
		$this->load->helper('file');
		
		$date = date('m d H');
		$all_genereated_files = "";
		$file_content = '<?xml version="1.0" encoding="UTF-8"?>';
		$file_content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

		$file_content .= "\n<url>
		<loc>https://tutorchamps.com/</loc>
		<changefreq>Daily</changefreq>
		<lastmod>".date_format(date_create('2021-11-21 15:00:00'), 'c')."</lastmod>
		<priority>1.00</priority>
		</url>\n";
		
	
        $this->db->select(array('url_slug','created_date','modified_date'));
        $this->db->from('posts');
        $this->db->where('type', 'page');
        $this->db->where('index_follow', '1');
        $this->db->where('status', '1');
        $query = $this->db->get();
        
		$urls = $query->result_array();
		foreach ($urls as $url) {

			$created_on = explode('-',$url['created_date']);
			$yearMonth  = $created_on[0]."-".$created_on[1]; 
			if(trim($url['modified_date']) == '' || trim($url['modified_date']) == '0000-00-00 00:00:00' || strtoupper(trim($url['modified_date'])) == 'NULL'){
				$date       = date_create($url['created_date']);
			}else{
				$date       = date_create($url['modified_date']);
			}
			
			$file_content .= "<url>
			<loc>".base_url().$url['url_slug']."/</loc>
			<changefreq>Daily</changefreq>
			<lastmod>".date_format($date, 'c')."</lastmod>
			<priority>0.90</priority>
			</url>\n";
		}

	   
	    $this->db->select(array('url_slug','created_date','modified_date'));
        $this->db->from('posts');
        $this->db->where('type', 'post');
        $this->db->where('index_follow', '1');
        $this->db->where('status', '1');
        $query = $this->db->get();
		$urls = $query->result_array();
		$file_content .= "<url>
		<loc>".base_url()."blog/</loc>
		<changefreq>Daily</changefreq>
		<lastmod>".date_format(date_create(date('Y-m-d H:i:s')), 'c')."</lastmod>
		<priority>0.80</priority>
		</url>\n";  
		foreach ($urls as $url) {
			$created_on = explode('-',$url['created_date']);
			$yearMonth  = $created_on[0]."-".$created_on[1]; 
			if(trim($url['modified_date']) == '' || trim($url['modified_date']) == '0000-00-00 00:00:00' || strtoupper(trim($url['modified_date'])) == 'NULL'){
				$date       = date_create($url['created_date']);
			}else{
				$date       = date_create($url['modified_date']);
			}

			$file_content .= "<url>
			<loc>".base_url()."blog/".$url['url_slug']."/</loc>
			<changefreq>Daily</changefreq>
			<lastmod>".date_format($date, 'c')."</lastmod>
			<priority>0.70</priority>
			</url>\n";
		}
		
		$file_content .= "<url>
                <loc>https://tutorchamps.com/sign-up/</loc>
                <lastmod>2021-11-21T15:00:50+00:00</lastmod>
                <priority>0.70</priority>
                </url>";
                
		$file_content .= "<url>
            <loc>https://tutorchamps.com/login/</loc>
            <lastmod>2021-11-21T15:00:50+00:00</lastmod>
            <priority>0.70</priority>
        </url>";
		$file_content .= "<url>
            <loc>https://tutorchamps.com/tutor/register/</loc>
            <lastmod>2021-11-21T15:00:50+00:00</lastmod>
            <priority>0.70</priority>
            </url>";

		$file_content .= "</urlset>";
	
		$index_file = fopen("sitemap.xml", "w") or die("Unable to open file!");
		fwrite($index_file, $file_content);
		fclose($index_file);
	}
	
}
