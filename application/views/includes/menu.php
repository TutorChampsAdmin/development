<nav id='cssmenu' class="cssmenu">
				<div class="logo" data-aos="fade-right" data-aos-duration="8000"><a href="<?php echo base_url();?>">
						<img src="<?php echo base_url();?>assets/main/imagesgit/logo.png" alt="TutorChamps" title="TutorChamps"> </a></div>
				<div id="head-mobile"></div>
				<div class="button" data-aos="zoom-in-left" data-aos-duration="1200"></div>
				<ul data-aos="zoom-in-left" data-aos-duration="1200">
					<li><a href='<?php echo base_url();?>'>Home</a></li>
					<li><a href='#'>Study</a>
						 <ul>
            <li><a href='#'>Study 1</a></li>
            <li><a href='#'>Study 2</a></li>
            <li><a href='#'>Study 3</a></li>
         </ul>
					</li>
					<li><a href='#'>Story</a></li>
					<li><a href='<?php echo base_url();?>reviews/'>Reviews</a></li>
					<?php if($this->session->userdata('isClientLoggedIn') ){ ?>
					<li>
					    <div class="btn_con"><a class="logIn" href="<?php echo base_url();?>dashboard/">Dashboard</a> <a href="<?php echo base_url();?>dashboard/logout/" class="sign_up active">Logout</a></div>
					</li>
					<?php }else{?>
					<li>
						<div class="btn_con"><a class="logIn" href="<?php echo base_url();?>login/">Log In</a> <a href="<?php echo base_url();?>sign-up/" class="sign_up active">Sign Up</a></div>
					</li>
					<?php }?>
				</ul>
			</nav>