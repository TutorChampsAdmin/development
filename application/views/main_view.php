<?php 
# head view
$this->load->view('includes/head_section');

# header view
$this->load->view('includes/header');

#loading main content
echo $mainbodyContent;

# footer view
if(@$eligibility != '1'){
	$this->load->view('includes/footer');	
}


?>