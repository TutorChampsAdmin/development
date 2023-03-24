<style>
    .blog-detail li {
        list-style: disc;
        margin-left: 18px;
    }
</style>
<?php 

if($page['subject_service'] != '0'){
	if($page['subject_service'] == '1'){
		$this->load->view('includes/service_banner_section');
	}else{
		$this->load->view('includes/subject_banner_section');
	}
	
}

echo $page['description'];?>                            
           