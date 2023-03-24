<?php 

# header view
$this->load->view('backend/includes/header');

#loading main content
echo $mainbodyContent;

# footer
$this->load->view('backend/includes/footer');	

?>