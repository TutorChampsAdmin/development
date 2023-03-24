<style>
    
.banner_section:after{content: "";
    position: absolute;
    left: calc(50% - 165px);
    bottom: 0;
    width: 330px;
    height: 432px;
    background: url(<?php echo base_url().$page['banner_image'];?>); background-size: cover;}
.home .banner_section{
display:<?php if($page['url_slug']=='features'){ echo "none";}?>;}
</style>


<div class="banner_section">
	<div class="container">
		<div class="row" style="align-items: center;"> 
			<div class="col-12 col-md-12 col-lg-6 pb-4">
				<div data-aos="fade-right" data-aos-duration="1200">
					<?php echo $page['banner_title']; ?>
					<?php echo $page['banner_text']; ?>
					<a class="cstm_btn r_btn bg_y getStarted" href="#">Get Started »</a>

					<p class="trust_head">Trusted by <span style="font-weight: bold; color: #08b07b;">1.5M+</span> happy customers</p>
					<div class="trust_con">
						
						 <div class="trust_box">
							<div><img src="<?php echo base_url(); ?>assets/front/image/Sitejabber.png"> </div>
							<div>
								<span>4.9 <span class="rating_stars"><i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fas fa-star-half-alt"></i></span> </span>
								<p>Sitejabber</p>
							</div>
						</div>

						<div class="trust_box" style="margin: 0;">
							<div><img src="<?php echo base_url(); ?>assets/front/image/Trustpilot.png"> </div>
							<div>
								<span>4.9 <span class="rating_stars"><i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fa fa-star"> </i> <i class="fas fa-star-half-alt"></i></span> </span>
								<p>Trustpilot</p>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-6">
				<div id="bannerForm" class="banner_form " data-aos="fade-left" data-aos-duration="1200">  
					<h3>Submit Your Problem Here!</h3>
					<div class="banner_form_con">
					    <?php $this->load->view('includes/order_form') ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
