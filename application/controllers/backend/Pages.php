<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	
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
	
		   $postList   = $this->Posts->postList($rowperpage,$rowno,'page',$id, $search_string);
		   $total_posts  = $this->Posts->postListCount('page',$id, $search_string);
		   $data  = ['total_posts' => $total_posts ,'rowperpage' => $rowperpage,'postList' => $postList];
		   die(json_encode($data));
        }else{
			$data = [];
        	$data['mainbodyContent'] = $this->load->view('backend/pages',$data,TRUE);
			$this->load->view('backend/master_view',$data);
        }

	}
    
    
 
	public function add(){   
	 
		$data 		= array();
		if($this->input->post('page_name') && $this->input->post('description'))
		{
		$this->form_validation->set_rules('page_name', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
       
     	$data   = array(
					'title'				=> $this->input->post('page_name'),
					'description'		=> $this->input->post('description'),
					'index_follow'      => $this->input->post('index_follow'),
					'meta_title'		=> $this->input->post('meta_title'),
					'meta_description'	=> $this->input->post('meta_description'),
					'meta_keywords'		=> $this->input->post('meta_keywords'),
					'url_slug'			=> $this->input->post('url_slug'),
					'banner_title'		=> $this->input->post('banner_title'),
					'banner_text'		=> $this->input->post('banner_text'),
					'type'		 		=> 'page',
					'status'		 	=> $this->input->post('status'),
					'subject_service'	=> $this->input->post('subject_service'),
					'created_date'		=> date('Y-m-d H:i:s'),
					'created_by'	 	=> $this->session->userdata('b_user_id'),
					'modified_date'		=> date('Y-m-d H:i:s'),
					'modified_by'	    => $this->session->userdata('b_user_id'),
			);

     	if(isset($_FILES['banner_image']) && $_FILES['banner_image']['name'] != ''){
            $image_name_arr            = explode('.', $_FILES['banner_image']['name']);
            $image_name                = str_replace(' ', '_', $image_name_arr['0']);
            $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
            $config['upload_path']     = UPLOAD_DIR;
            $config['file_name']       = $newFileName;
            $config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
            $this->upload->initialize($config);
            if($this->upload->do_upload('banner_image')){
            	$data['banner_image']  = 'media/'.$newFileName;
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
                					"message"  => "Page addedd successfully!"
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
		if($this->input->post('page_name') && $this->input->post('description')){ 

	     	$data   = array(
					   'title'					=>$this->input->post('page_name'),
					   'description'		    =>$this->input->post('description'),
					   'index_follow'           =>$this->input->post('index_follow'),
					   'meta_title'				=>$this->input->post('meta_title'),
					   'meta_description'		=>$this->input->post('meta_description'),
					   'meta_keywords'		    =>$this->input->post('meta_keywords'),
					   'url_slug'			    => $this->input->post('url_slug'),
					   'banner_title'			=> $this->input->post('banner_title'),
					   'banner_text'			=> $this->input->post('banner_text'),
					   'status'		 			=>$this->input->post('status'),
					   'subject_service'	    => $this->input->post('subject_service'),
					   'modified_by'	 		=>$this->session->userdata('user_id'),
					   'modified_date'	 		=>date('Y-m-d H:i:s'),
					 
			);

			if(isset($_FILES['banner_image']) && $_FILES['banner_image']['name'] != ''){
            $image_name_arr            = explode('.', $_FILES['banner_image']['name']);
            $image_name                = str_replace(' ', '_', $image_name_arr['0']);
            $newFileName               = $image_name.'_'.time().'.'.$image_name_arr['1'];
            $config['upload_path']     = UPLOAD_DIR;
            $config['file_name']       = $newFileName;
            $config['allowed_types']   = 'gif|jpg|png|jpeg|bmp';      
            $this->upload->initialize($config);
            if($this->upload->do_upload('banner_image')){
            	$data['banner_image']  = 'media/'.$newFileName;
            }else{
            	#print_r($this->upload->display_errors());
            }

        }

			
			$where   = array('id'=>$this->input->post('page_id'), 'type' => 'page');
			$update= $this->Posts->update($where, $data); 
			if($update != ''){ 
			$this->generate_sitemaps();
			$jsonResponseData = [
									"status"   => "success",
                					"color"    => "green",
                					"message"  => "Page update successfully!"
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
