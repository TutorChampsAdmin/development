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
</head>

<body>

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