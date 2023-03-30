<!DOCTYPE html>
<html>

<head> 
	<meta charset="utf-8">
	<title>Dashboard - TutorChamps.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/chat.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap"
		rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/fav.png" type="image/x-icon">
	<style>
	     #loading{
        position: fixed;
        width: 100%;
        height: 100vh;
        background: #fff url('<?php echo base_url();?>assets/front/images/loader.gif') no-repeat center  ;
        z-index: 999;
        display: none;
        opacity: 0.7;
    }
	</style>
</head>

<body>
<div id="loading"></div>
	<header class="header">
		<div class="container">
			<div class="row" style="align-items: center;">
				<div class="col-6">
					<div><img class="logo" src="<?php echo base_url();?>assets/img/logo.png" alt="logo"></div>
				</div>
				<div class="col-6">
					<div class="right_links_con">
						<ul>
							<li>
								<a class="cstmBtn create_new_order" href="#">Create New Order</a>
								<ul class="order_drop_box">
								  <li><a href="#" data-toggle="modal" data-target="#openPopup"><div><img class="deflt_img" src="<?php echo base_url();?>assets/img/icon_6.png"> <img class="hover_img" src="<?php echo base_url();?>assets/img/icon_6_y.png"></div> Homework Assignment Help</a></li>
								  <li><a href="#" data-toggle="modal" data-target="#openPopup"><div><img class="deflt_img" src="<?php echo base_url();?>assets/img/icon_6.png"> <img class="hover_img" src="<?php echo base_url();?>assets/img/icon_6_y.png"></div> Live Session</a></li>
								  <li><a href="#" data-toggle="modal" data-target="#openPopup"><div><img class="deflt_img" src="<?php echo base_url();?>assets/img/LabReports.png"> <img class="hover_img" src="<?php echo base_url();?>assets/img/LabReports_y.png"></div> Lab Work</a></li>
								  <li><a href="#" data-toggle="modal" data-target="#openPopup"><div><img class="deflt_img" src="<?php echo base_url();?>assets/img/writing.png"> <img class="hover_img" src="<?php echo base_url();?>assets/img/writing_y.png"></div> The art of essay Writting</a></li>
								  <li><a href="#" data-toggle="modal" data-target="#openPopup"><div><img class="deflt_img" src="<?php echo base_url();?>assets/img/icon_6.png"> <img class="hover_img" src="<?php echo base_url();?>assets/img/icon_6_y.png"></div> Video Solution</a></li>
								  <li><a href="#" data-toggle="modal" data-target="#openPopup"><div><img class="deflt_img" src="<?php echo base_url();?>assets/img/icon_6.png"> <img class="hover_img" src="<?php echo base_url();?>assets/img/icon_6_y.png"></div> Project Work</a></li>
								  <li><a href="#" data-toggle="modal" data-target="#openPopup"><div><img class="deflt_img" src="<?php echo base_url();?>assets/img/icon_6.png"> <img class="hover_img" src="<?php echo base_url();?>assets/img/icon_6_y.png"></div> Speech Writing</a></li>
								  <li><a href="#" data-toggle="modal" data-target="#openPopup"><div><img class="deflt_img" src="<?php echo base_url();?>assets/img/icon_6.png"> <img class="hover_img" src="<?php echo base_url();?>assets/img/icon_6_y.png"></div> Presentation Writing</a></li>
								</ul>
							</li>
							<li>
								<a class="notiF" href="#"><i class="fa fa-bell" aria-hidden="true"></i> <span class="notiF_count">2</span> </a>
								<ul class="notiF_drop_box">
								  <li><a href="#"><div><img src="<?php echo base_url();?>assets/img/accurate-solutions.png"></div> <div class="noti_txt"><span>Order 178132 updated</span><span>Updated successfully</span> <span class="notif_time">2 day ago</span></div> </a></li>
								  <li><a href="#"><div><img src="<?php echo base_url();?>assets/img/accurate-solutions.png"></div> <div class="noti_txt"><span>Order 178132 updated</span><span>Updated successfully</span> <span class="notif_time">2 day ago</span></div> </a></li>
								  <li><a href="#"><div><img src="<?php echo base_url();?>assets/img/accurate-solutions.png"></div> <div class="noti_txt"><span>Order 178132 updated</span><span>Updated successfully</span> <span class="notif_time">2 day ago</span></div> </a></li>
								</ul>
							</li>
							<li>
								<a class="profile" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
								<ul class="profile_Dropdown">
									<li><a href="<?php echo base_url(); ?>dashboard/profile/">View & Edit Profile</a> </li>
									<li><a href="#">Payment Information</a> </li>
									<li><a href="#">Update Password</a> </li>
									<li><a href="#">Privacy Policy</a> </li>
								</ul>
							</li>
							<li class="mobBtn"><a href="javascript:void(0);" id="mobBtn"><i class="fa fa-bars" id="i" aria-hidden="true"></i></a></li>
						</ul>
						
					</div>
				</div>
			</div>		
		</div>
	</header>
	
	<div class="body_sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="dashboardContainer clientDashboard">
						<div class="sidebar sidebar_menu">

							<ul class="sidebar_menu">
								<li><a id="home"  href="<?php echo base_url();?>dashboard/home"><i class="fa fa-home"></i> Home</a></li>
								<li><a id="live_session" href="<?php echo base_url(); ?>dashboard/history"><i class="fa fa-history" aria-hidden="true"></i> Order History</a></li>
								<li><a id="project_lab" href="<?php echo base_url(); ?>dashboard/reward"><i class="fa fa-bug"></i> Reward Points</a></li>
								<li><a id="refer" href="<?php echo base_url(); ?>dashboard/refer"><i class="fa fa-user"></i> Refer & Earn</a></li>
								<li><a id="faq" href="<?php echo base_url(); ?>dashboard/faq"><i class="fa fa-question-circle"></i> FAQs</a></li>
								<div class="sidebar_bottomLink">
									<li><a id="" href="javascript:void(0)"><i class="fa fa-question-circle"></i> Help</a></li>
									<li><a id="" href="<?php echo base_url('dashboard/logout/');?>"><i class="fa fa-cog"></i> Logout</a></li>
								</div>
							</ul>
						</div>
