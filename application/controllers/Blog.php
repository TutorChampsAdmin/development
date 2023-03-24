<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
     
     
    function __construct()
    {
        parent::__construct();
        $this->load->model('Posts');
        date_default_timezone_set('Asia/Calcutta');
        #redirect('/');
    }


    public function index() {   
      
        if($this->uri->segment(2) != '' && $this->uri->segment(2) != 'page') {

            $catSlug       = strtolower($this->uri->segment(2)) ;
            $CategoryId    = $this->Posts->get_category_id($catSlug);
            $viewSinglePost = '0';

            if(isset($CategoryId) && $CategoryId != '0') {   

                $total_reocords_count =$this->Posts->total_reocords_count($CategoryId);  # count total records
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                if($page > 1){
                    $page = $page -1;
                }
                $this->load->library('pagination');
                $config['base_url']       = base_url().'blog/'.$catSlug.'/page';
                $config['total_rows']     = $total_reocords_count;
                $config['per_page']       = 15;
                $config['first_url']      = base_url().'blog/'.$catSlug;
                $config['full_tag_open']  = "<ul>";
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open']   = '<li>';
                $config['num_tag_close']  = '</li>';
                $config['cur_tag_open']   = '<li class="active"><a href="#">';
                $config['cur_tag_close']  = '</a></li>';
                $config['prev_link']      = ' <svg class="icon"><use xlink:href="#right"></use>Prev</svg>';
                $config['prev_tag_open']  = '<li class="prev_pagi">';
                $config['prev_tag_close'] = '</li>';
                $config['next_link']      = 'Next  <svg class="icon"><use xlink:href="#right"></use></svg>';
                $config['next_tag_open']  = '<li class="next_pagi">';
                $config['next_tag_close'] = '</li>';
                $config['use_page_numbers'] = TRUE;
                $this->pagination->initialize($config);
                $data['pagination'] = $this->pagination->create_links(); 

                $allPosts = $this->Posts->all_post_lists($config["per_page"], $page*$config["per_page"], $CategoryId);

                $data['no_next_page'] = '0';
                $data['total_blog_records'] = $total_reocords_count;
                $total_pages = $total_reocords_count/$config["per_page"];
                if(($page+1) < $total_pages){
                    $data['no_next_page'] = '1';
                }

                $data['category_page']     = '1';
               
                $catSlug                  = ucwords(str_replace("-"," ",$catSlug));
            
              
                $data['meta_title']            = 'Blogs - Eduversal Global';
                $data['meta_description'] = 'Best '.$catSlug.' assistance by our Ph.D. Experts. Get tips and tricks from '.$catSlug.' experts along with the latest updates and information.';
                $data['meta_keywords']    = "";
                $data['index_follow']     = 1;
                $data['pageTitle']         = 'Category : '.$catSlug;
                $data['blogs']            = $allPosts;
               
                $data['all_post_category']  = $this->Posts->get_category_list();
                $data['page_name']         = 'blog';
              
                $data['mainbodyContent']  = $this->load->view('contents/all_posts',$data,TRUE);
        		$this->load->view('main_view',$data);
            } else {

                #=========== Code for Single Post Detail start ==========
                $this->view(); 
            }
        } else {
                
            $total_reocords_count =$this->Posts->total_reocords_count(0);  # count total records
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            if($page > 1){
                $page = $page -1;
            }
            $this->load->library('pagination');
            $config['base_url']       = base_url().'blog/page';
            $config['total_rows']     = $total_reocords_count;
            $config['per_page']       = 15;
            $config['first_url']      = base_url().'blog';
            $config['full_tag_open']  = "<ul>";
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open']   = '<li>';
            $config['num_tag_close']  = '</li>';
            $config['cur_tag_open']   = '<li class="active"><a href="#">';
            $config['cur_tag_close']  = '</a></li>';
            $config['prev_link']      = ' <svg class="icon"><use xlink:href="#right"></use>Prev</svg>';
            $config['prev_tag_open']  = '<li class="prev_pagi">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link']      = 'Next  <svg class="icon"><use xlink:href="#right"></use></svg>';
            $config['next_tag_open']  = '<li class="next_pagi">';
            $config['next_tag_close'] = '</li>';
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
    
            $data['blogs']   = $this->Posts->all_post_lists($config["per_page"], $page*$config["per_page"] ,0);
    
            $data['search_text']      = trim($search_terms);
           /* $data['latest_posts']     = $this->Posts->latest_post_lists(6);
            $data['trending_posts']   = $this->Posts->trending_posts_post_lists();
            $data['popular_posts']    = $this->Posts->popular_post_lists();*/                
            $data['all_post_category']   = $this->Posts->get_category_list();
            $data['meta_title']       = 'Blogs';
            $data['meta_description'] = '';
            $data['meta_keywords']    = "";
            $data['index_follow']     = "1";
            $data['pageTitle']         = 'Blog';
            $data['page_name']         = 'blog';
            $data['canonicalUrl']     = base_url().'blog/';
            $data['mainbodyContent']  = $this->load->view('contents/all_posts',$data,TRUE);
    		$this->load->view('main_view',$data);
           
        }
    }


    public function view()
    {        
       
        $url                      = strtolower($this->uri->segment('2'));
        $pre                      =  @$_REQUEST['pre'];

        $url                      = $this->Posts->get_one_post($url, $pre);
        $url                      = json_decode(json_encode($url), True);
        $data['page']             = $url;
       

        $data['meta_title']       = trim($url['meta_title']);
        $data['meta_description'] = trim($url['meta_description']);
        $data['meta_keywords']    = trim($url['meta_keywords']);
        if(isset($pre) && $pre !=''){
            $data['index_follow']     = '0';
        }else{
            $data['index_follow']     = trim($url['index_follow']);
        }


        if(empty($url)) {
            redirect('404');
        } else {

            $data['latest_posts']     = $this->Posts->latest_post_lists(5,$url['id'], $url['category_id']);
            $category    = $url['category_id'];
            $currentPost = $url['id'];

            $data['popular_posts']    = $this->Posts->popular_post_lists(5);
          

            # Count no of visits        
            $this->Posts->count_visit($url['id']);
           
            $data['single']         = '1';
            $data['page_name']      = 'blog';
            $data['canonicalUrl']     = base_url().'blog/'.$url['url_slug'].'/';

            $data['mainbodyContent']  = $this->load->view('contents/post_details',$data,TRUE);
		    $this->load->view('main_view',$data);
        }

    }


    public function search(){

      
        if(trim($this->input->get('s')) != ''){
            $search_terms = trim($this->input->get('s'));
            $this->session->set_userdata('search_string', $search_terms);
        } else {
            $search_terms = $this->session->search_string;
        }
        $total_reocords_count =$this->Posts->total_reocords_count_for_search(trim($search_terms));  # count total records


        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        if($page > 1){
            $page = $page -1;
        }
        $this->load->library('pagination');
        $config['base_url']       = base_url().'blog/search/page';
        $config['total_rows']     = $total_reocords_count;
        $config['per_page']       = 15;
        $config['first_url']      = base_url().'blog/search';
        $config['full_tag_open']  = "<ul>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        $config['cur_tag_open']   = '<li class="active"><a href="#">';
        $config['cur_tag_close']  = '</a></li>';
        $config['prev_link']      = ' <svg class="icon"><use xlink:href="#right"></use>Prev</svg>';
        $config['prev_tag_open']  = '<li class="prev_pagi">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link']      = 'Next  <svg class="icon"><use xlink:href="#right"></use></svg>';
        $config['next_tag_open']  = '<li class="next_pagi">';
        $config['next_tag_close'] = '</li>';
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();


        $data['blogs']            = $this->Posts->post_search($config["per_page"], $page*$config["per_page"], trim($search_terms));
        $data['search_text']      = trim($search_terms);
      /*  $data['latest_posts']     = $this->Posts->latest_post_lists($settings_list['recent_blog_count']);
        $data['post_category']    = $this->Posts->get_category_list($settings_list['categry_limit']);
        $data['trending_posts']   = $this->Posts->trending_posts_post_lists();
        $data['popular_posts']    = $this->Posts->popular_post_lists(); */               
        $data['all_post_category']   = $this->Posts->get_category_list();
        $data['meta_title']       = "Blog Search - Eduversal Global";
        $data['meta_description'] = "";
        $data['meta_keywords']    = "";
        $data['index_follow']     = "0";
        $data['pageTitle']        = 'Search Result for : '.$search_terms;
        $data['page_name']        = 'blog';
        $data['breadcrums']       = array('Blog' => 'blog');
        $data['mainbodyContent']  = $this->load->view('contents/all_posts',$data,TRUE);
        $this->load->view('main_view',$data);
        
    }



   
    public function insertReview()
    {   
        $data       = array();
        if(trim($this->input->post('comments')) != '')
        {
            $website   =  ($this->input->post('website')) ? $this->input->post('website') : 0;
            $comments =  ($this->input->post('comments')) ? $this->input->post('comments') : "";
            $email    =  ($this->input->post('email')) ? $this->input->post('email') : "";
            $username =  ($this->input->post('name')) ? $this->input->post('name') : "";


            $data   = array(

                'question_id'   =>$this->input->post('question_id'),
                'website'       =>$website,
                'comments'      =>strip_tags($comments),
                'username'      =>strip_tags($username),
                'email'         =>$email,
                'review_date'   =>date('Y-m-d H:i:s'),
                'status'        => '0'
            );
            $insert = $this->Posts->insert_review($data);  
            if($insert){
                echo "1";
            }else{
                echo "0";
            }
        }
        die;
    }



}

