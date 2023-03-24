<!DOCTYPE html>
<html>

<head>
	<!-- <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://unpkg.com/phosphor-icons"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/styles-tutor-new.css"> -->
  <title>Dashboard</title>
  <script src="<?php echo base_url();?>assets/front/js/jquery.js"></script>
  
	<meta charset="utf-8">
	<title>Dashboard</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://unpkg.com/phosphor-icons"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;700&display=swap" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/front/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/front/css/dash.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/front/dashboard/css/dashboard.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/front/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap"
		rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/front/images/fav.png" type="image/x-icon">
	<link href="<?php echo base_url();?>assets/front/css/chat.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<style>
/* Chat section */
/* <div class="chat-head" data-target="html">
		<input type="checkbox" id="check"> <label class="chat-btn" for="check" style="background-color: #f8c333;"> <img
				class="comment" src="{% static 'images/chat.png' %}"><i class="fa fa-close close"></i> </label>
		<div class="chatwindow">

			{% include 'chat_head/chat-window.html' with uuid=user %}


		</div>
		<div class="chat_box">
			<button id="close_chat" type="button" class="close">×</button>
			<h3>ChatBox</h3>
		</div> 
	</div> */
		.avatar-upload {
			position: relative;
			max-width: 100px;
			margin-bottom: 12px;
		}

		.avatar-upload .avatar-edit {
			position: absolute;
			right: -4px;
			bottom: -2px;
			z-index: 1;
		}

		.avatar-upload .avatar-edit input {
			display: none;
		}

		.avatar-upload .avatar-edit input+label {
			width: 34px;
			height: 34px;
			border-radius: 100%;
			background: #ffffff;
			box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 12%);
			cursor: pointer;
			transition: all 0.2s ease-in-out;
		}

		.avatar-upload:hover .avatar-edit input+label {
			opacity: 1;
		}

		.avatar-upload .avatar-edit input+label img {
			padding: 6px;
		}

		.avatar-upload .avatar-preview {
			width: 110px;
			height: 110px;
			position: relative;
			border-radius: 100%;
			border: 4px solid #ffffff;
			box-shadow: 1px 1px 15px #e0e0e0;
		}

		.avatar-upload .avatar-preview>div {
			width: 100%;
			height: 100%;
			border-radius: 100%;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
		}

		.show_password_icon,
		.show_CPassword_icon {
			top: 32px;
		}

		.notifications_table {
			margin-top: 30px
		}

		.noti_icon_box {
			position: absolute;
			top: 5px;
			right: 22px;
			display: flex;
			align-items: center;
			padding: 8px 0 0;
		}

		.noti_icon_box span {
			width: 25px;
			height: 25px;
			margin-left: 15px;
			font-size: 15px;
			background: #fff;
			box-shadow: 0 0 15px #e3e3e3;
			border-radius: 28px;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #47bf7f;
		}

		.DashboardContent {
			padding: 50px 25px 25px 25px;
		}

		.checkbox_outer {
			display: flex;
			align-items: center;
			margin-bottom: 8px;
		}

		.checkbox_outer label {
			padding-left: 10px;
		}

		.selected_subject_con .form_group>div {
			width: 100%;
		}

		.static_t span span {
			display: block;
			font-size: 12px;
			line-height: 20px;
		}

		.static_t span {
			font-size: 14px;
			text-transform: uppercase;
		}

		.selected_subject_con {
			width: 33%;
		}

		.static_t {
			height: 100%;
			display: flex;
			text-align: center;
			align-items: center;
			justify-content: center;
		}

		.sub_subject_con {
			padding: 20px;
			width: 33%;
			position: relative;
		}

		.sub_subj_contnt {
			position: absolute;
			top: 0;
		}

		.main_sub_con {
			width: 33.3%;
		}

		.sub_subj_contnt .active {
			color: #000 !important;
		}

		.Update_subject_content .main_sub_con_inner li a img {
			margin-right: 8px;
		}

		.Update_subject_content .main_sub_con_inner li {
			box-shadow: 0px 0px 6px #ddd;
			display: block;
			margin: 0 5px 25px;
			padding: 8px 16px;
			border-radius: 2px;
			font-size: 14px;
		}

		.main_sub_con_inner>span {
			font-size: 14px;
			color: #47bf7f;
			font-weight: 600;
		}

		.main_sub_con_inner>p {
			font-size: 14px;
			margin-bottom: 35px;
			line-height: 19px;
		}

		.Update_subject_content .main_sub_con_inner li a:hover {
			color: #000;
		}

		.Update_subject_content .main_sub_con_inner li a {
			display: flex;
			align-items: center;
			background: transparent;
			padding: 0;
		}

		.Update_subject_content {
			position: absolute;
		}

		.Update_subject_content.active_ {
			position: initial;
			display: flex;
			width: 100%;
		}

		.change_sub:hover {
			color: #fff;
		}

		.change_sub {
			display: inline-block;
			font-size: 15px;
			line-height: 30px;
			color: #fff;
			padding: 7px 30px;
			font-weight: 700;
			overflow: hidden;
			background-color: #43b97e;
			border-radius: 80px;
		}

		.live_session_content form {
			width: 100%;
		}

		.customCountDown {
			display: flex;
			align-items: center;
			justify-content: center;
			max-width: 25%;
		}

		.commForm .pos_rel {
			width: 49% !important;
			position: relative;
		}

		.px_15 {
			padding: 0 15px;
		}

		.connent_con {
			background: #fff;
			border: 1px solid #e9e9e9;
			padding: 20px 26px 26px;
			border-radius: 15px;
			z-index: 9;
			position: relative;
			top: 10px;
			margin-bottom: 15px;
		}

		.instructions_content {
			height: 0;
			overflow: hidden;
		}

		.project_lab_content .Redeem_box+p {
			margin: 10px 0 45px;
		}

		.thead td {
			width: auto;
			border: 1px solid #fff;
		}

		tr td {
			text-align: center;
		}

		header .profileDrop:after {
			top: 19px;
			right: -5px;
		}

		.pos_rel {
			width: 100% !important;
		}

		.secondStp .pos_rel {
			width: 47% !important;
		}

		.nextStepbtn {
			position: absolute;
			left: 0;
			top: 13px;
			color: #43b97e;
			font-size: 14px;
			text-decoration: underline !important;
		}

		.secondStp {
			display: none;
		}

		.customPopWidth {
			max-width: 600px !important;
			width: 100%;
			top: 15%;
		}

		.wcMsz {
			text-align: center;
			width: 100%;
			font-size: 16px;
			color: #43b97e;
			font-weight: 500;
		}

		.psr {
			position: relative;
		}

		.project_lab_content {
			/* padding-top: 90px; */
		}

		/* .instructions_content{
			padding-top: 70px;
			padding-right: 10px;
		}
		.homeContant{
			padding-top: 171px;
		}
		.profileContent{
			margin-top: 68px;
			margin-right: 44px;
		} */

		.table2 {
			display: none;
		}

		@media screen and (max-width: 380px) {
			.table1 {
				display: none;
			}

			.table2 {
				display: block;
			}
		}

		@media screen and (max-width: 767px) {
			/* .profileContent{
				padding-top: 388px;
				margin-right: 10px;
			} */

			.avatar-upload .avatar-edit input+label {
				opacity: 1 !important;
			}

			.aq_cstm_h2 {
				text-align: center !important;
			}

			/* .project_lab_content{
				padding-top: 51px;
			} */
			.instructions_content {
				/* padding-top: 320px; */
			}

			.commForm .pos_rel {
				width: 100% !important;
			}

			.commForm .form_group {
				display: block;
			}

			.commForm {
				border: #43b97e;
				border-style: solid;
				border-width: 4px;
			}

			.pos_rel.px_15 {
				padding: 0 !important;
			}

			.dTbale {
				/* margin-top: calc(30vh - 170px); */
			}

			.ProjectLabAssignment .form_group {
				display: block !important;
			}

			.ProjectLabAssignment .form_group .pos_rel {
				width: 100% !important;
			}

			td,
			th {
				font-size: 11px;
			}

			.subtable {
				width: 104px;
			}
		}

		.nav.nav-tabs a:hover {
			color: #000;
		}

		.tab-pane.fade.active.show {
			background: transparent !important;
		}

		.nav.nav-tabs a {
			font-size: 15px;
			padding: 10px 20px;
			display: inline-block;
			margin: 0 1px 0 0 !important;
			/* background: #ececec; */
			background: #d4d4d4;
			border-radius: 10px 10px 0 0;
		}

		.main_sub_con_inner .nav.nav-tabs a.active {
			background: transparent !important;
		}

		.main_sub_con_inner a.active {
			color: #47bf7f !important;
		}

		.input.search {
			max-width: 200px;
		}

		.search_box h2 {
			margin: 0 0 11px !important;
			font-weight: 600;
		}

		.Redeem_box {
			max-width: 592px;
			margin: 0 auto;
			box-shadow: 0 3px 10px #ddd;
			border-radius: 30px;
			padding: 10px 10px 10px 20px;
			display: flex;
			align-items: center;
			margin-top: 25px;
		}

		.Redeem_box input {
			max-width: 420px;
			width: 100%;
			height: 43px;
		}

		#confm_password {
			width: 100%;
		}
	</style>

	<!-- Google Tag Manager -->
	<script>(function (w, d, s, l, i) {
			w[l] = w[l] || []; w[l].push({
				'gtm.start':
					new Date().getTime(), event: 'gtm.js'
			}); var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
					'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-NVND638');</script>
	<!-- End Google Tag Manager -->
</head>

<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVND638" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<!-- <div class="mobHeader">
		<div>
			<div><img src="{% static 'images/logo.png' %}" alt="logo"></div>
			<a href="javascript:void(0);" class="mobBtn" id="mobBtn"><i id="i" class="fa fa-bars" aria-hidden="true"></i></a>
		</div>
	</div> -->
	<!-- {% for message in messages %}
	<script>
		alert('{{message}}')
	</script>
	{% endfor %} -->





	<style>
		body {
			margin: 0;
			font-family: Arial, Helvetica, sans-serif;
		}

		.topnav {
			overflow: hidden;
			background-color: #333;
		}

		.topnav a {
			float: left;
			display: block;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 12px;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		.topnav a.active {
			background-color: #04AA6D;
			color: white;
		}

		.topnav .icon {
			display: none;
		}

		@media screen and (max-width: 710px) {
			.topnav a:not(:first-child) {
				display: none;
			}

			.topnav a.icon {
				float: right;
				margin-right: 20px;
				display: block;
			}
		}

		@media screen and (max-width: 710px) {
			.topnav.responsive {
				position: relative;
			}

			.topnav.responsive .icon {
				position: absolute;
				right: 0;
				top: 0;
			}

			.topnav.responsive a {
				float: none;
				display: block;
				text-align: left;
			}
		}
	</style>
	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}

			var y = document.getElementById("mobBtn");

			if (y.className == "fa fa-bars") {
				y.className = "fa flaticon-multiply";
			}
			else {
				y.className = "fa fa-bars";
			}
			console.log(y.className);
		}
	</script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			text-decoration: none;
			font-family: 'Poppins', sans-serif;
		}

		.tutor-wrapper {
			background: white;
			position: fixed;
			width: 100%;
			margin-top: 2px;

		}

		.tutor-wrapper nav {
			position: relative;
			display: flex;
			max-width: calc(100% - 200px);
			margin: 0 auto;
			height: 70px;
			align-items: center;
			justify-content: space-between;
		}

		nav .content {
			display: flex;
			align-items: center;
		}

		nav .content .links {
			margin-left: 127px;
			display: flex;
			border-radius: 5px;
		}

		.content .logo a {
			color: #171c24;
			font-size: 30px;
			font-weight: 600;
		}

		.content .links li {
			list-style: none;
			line-height: 50px;
		}

		.content .links li a,
		.content .links li label {
			color: #171c24;
			font-size: 18px;
			font-weight: 500;
			padding: 9px 17px;
			border-radius: 5px;
			transition: all 0.3s ease;
		}

		.content .links li label {
			display: none;
		}

		.content .links li a:hover,
		.content .links li label:hover {
			background: #d9d9d9;
		}

		.tutor-wrapper .search-icon,
		.tutor-wrapper .menu-icon {
			color: #171c24;
			font-size: 18px;
			cursor: pointer;
			line-height: 60px;
			width: 70px;
			text-align: center;
		}

		.tutor-wrapper .menu-icon {
			display: none;
		}

		.tutor-wrapper #show-search:checked~.search-icon i::before {
			content: "\f00d";
		}

		.tutor-wrapper .search-box {
			position: absolute;
			height: 100%;
			max-width: calc(100% - 50px);
			width: 100%;
			opacity: 0;
			pointer-events: none;
			transition: all 0.3s ease;
		}

		.tutor-wrapper #show-search:checked~.search-box {
			opacity: 1;
			pointer-events: auto;
		}

		.search-box input {
			width: 100%;
			height: 100%;
			border: none;
			outline: none;
			font-size: 17px;
			color: #fff;
			background: #171c24;
			padding: 0 100px 0 15px;
		}

		.search-box input::placeholder {
			color: #f2f2f2;
		}

		.search-box .go-icon {
			position: absolute;
			right: 10px;
			top: 50%;
			transform: translateY(-50%);
			line-height: 60px;
			width: 70px;
			background: #171c24;
			border: none;
			outline: none;
			color: #fff;
			font-size: 20px;
			cursor: pointer;
		}

		.tutor-wrapper input[type="checkbox"] {
			display: none;
		}

		/* Dropdown Menu code start */
		.content .links ul {
			position: absolute;
			background: #d9d9d9;
			top: 80px;
			z-index: -1;
			opacity: 0;
			visibility: hidden;
		}

		.content .links li:hover>ul {
			top: 70px;
			opacity: 1;
			visibility: visible;
			transition: all 0.3s ease;
		}

		.content .links ul li a {
			display: block;
			width: 100%;
			line-height: 30px;
			border-radius: 0px !important;
		}

		.content .links ul ul {
			position: absolute;
			top: 0;
			right: calc(-100% + 8px);
		}

		.content .links ul li {
			position: relative;
		}

		.content .links ul li:hover ul {
			top: 0;
		}

		/* Responsive code start */
		@media screen and (max-width: 1250px) {
			.tutor-wrapper nav {
				max-width: 100%;
				padding: 0 20px;
			}

			nav .content .links {
				margin-left: 30px;
			}

			.content .links li a {
				padding: 8px 13px;
			}

			.tutor-wrapper .search-box {
				max-width: calc(100% - 100px);
			}

			.tutor-wrapper .search-box input {
				padding: 0 100px 0 15px;
			}
		}

		@media screen and (max-width: 1020px) {
			.tutor-wrapper .menu-icon {
				display: block;
			}

			.tutor-wrapper #show-menu:checked~.menu-icon i::before {
				content: "\f00d";
			}

			nav .content .links {
				display: block;
				position: fixed;
				background: #d9d9d9;
				height: 100%;
				width: 70%;
				top: 70px;
				left: -100%;
				margin-left: 0;
				max-width: 350px;
				overflow-y: auto;
				padding-bottom: 100px;
				transition: all 0.3s ease;
				text-align: left;
			}

			nav #show-menu:checked~.content .links {
				left: 0%;
			}

			.content .links li {
				margin: 15px 20px;
			}

			.content .links li a,
			.content .links li label {
				line-height: 40px;
				font-size: 20px;
				display: block;
				padding: 8px 18px;
				cursor: pointer;
			}

			.content .links li a.desktop-link {
				display: none;
			}

			/* dropdown responsive code start */
			.content .links ul,
			.content .links ul ul {
				position: static;
				opacity: 1;
				visibility: visible;
				background: none;
				max-height: 0px;
				overflow: hidden;
			}

			.content .links #show-features:checked~ul,
			.content .links #show-services:checked~ul,
			.content .links #show-items:checked~ul {
				max-height: 100vh;
			}

			.content .links ul li {
				margin: 7px 20px;
			}

			.content .links ul li a {
				font-size: 18px;
				line-height: 30px;
				border-radius: 5px !important;
			}
		}

		@media screen and (max-width: 400px) {
			.tutor-wrapper nav {
				padding: 0 10px;
			}

			.content .logo a {
				font-size: 27px;
			}

			.tutor-wrapper .search-box {
				max-width: calc(100% - 70px);
			}

			.tutor-wrapper .search-box .go-icon {
				width: 30px;
				right: 0;
			}

			.tutor-wrapper .search-box input {
				padding-right: 30px;
			}
		}

		.dummy-text {
			position: absolute;
			top: 30%;
			left: 48.5%;
			width: 100%;
			z-index: -1;
			padding: 8% 7%;
			text-align: center;
			transform: translate(-50%, -20%);
			background: #eef1ef url(https://www.payu.in/static/920cd2454d87d933833ae246b08a221e.webp) repeat left top;
		}

		/* .dummy-text h2{
  font-size: 45px;
  margin: 5px 0;
} */
	</style>



	<script type="text/javascript">
		function showHideRow(row) {
			$("#" + row).toggle();
		}
	</script>

	<style>
		body {
			margin: 0 auto;
			padding: 0px;
			text-align: center;
			width: 100%;
			font-family: "Myriad Pro",
				"Helvetica Neue", Helvetica,
				Arial, Sans-Serif;
		}

		#wrapper {
			margin: 0 auto;
			padding: 0px;
			text-align: center;
			width: 995px;
		}

		#wrapper h1 {
			margin-top: 50px;
			font-size: 45px;
			color: #585858;
		}

		#wrapper h1 p {
			font-size: 20px;
		}

		#table_detail {
			width: 500px;
			text-align: left;
			border-collapse: collapse;
			color: #2E2E2E;
			border: #A4A4A4;
		}

		#table_detail tr:hover {
			background-color: #F2F2F2;
		}

		#table_detail .hidden_row {
			display: none;
		}
	</style>
	<style>
		.wrapper {
			width: 100%;
			height: 100%;
		}

		.navbar1 {
			background: #fff;
			width: 100%;
			height: 60px;
			/* padding: 0 25px; */
			/* display: flex; */
			justify-content: space-between;
			align-items: center;
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
		}

		.navbar1 .navbar_left .logo a {
			font-family: 'Trade Winds';
			font-size: 20px;
		}

		.navbar1 .navbar_right {
			display: flex;
		}

		.navbar1 .navbar_right img {
			width: 35px;
		}

		.navbar1 .navbar_right .icon_wrap {
			cursor: pointer;
		}

		.navbar1 .navbar_right .notifications {
			margin-right: 25px;
		}

		.navbar1 .navbar_right .notifications .icon_wrap {
			font-size: 28px;
		}

		.navbar1 .navbar_right .profile,
		.navbar1 .navbar_right .notifications {
			position: relative;
		}

		.navbar1 .profile .profile_dd,
		.notification_dd {
			position: absolute;
			top: 48px;
			right: -15px;
			user-select: none;
			background: #fff;
			border: 1px solid #c7d8e2;
			width: 350px;
			height: auto;
			display: none;
			border-radius: 3px;
			box-shadow: 10px 10px 35px rgba(0, 0, 0, 0.125),
				-10px -10px 35px rgba(0, 0, 0, 0.125);
			z-index: 10000;
		}

		.navbar1 .profile .profile_dd:before,
		.notification_dd:before {
			content: "";
			position: absolute;
			top: -20px;
			right: 15px;
			border: 10px solid;
			border-color: transparent transparent #fff transparent;
		}

		.notification_dd li {
			border-bottom: 1px solid #f1f2f4;
			padding: 10px 20px;
			display: flex;
			align-items: center;
		}

		.notification_dd li .notify_icon {
			display: flex;
		}

		.notification_dd li .notify_icon .icon {
			display: inline-block;
			background: url('https://i.imgur.com/MVJNkqW.png') no-repeat 0 0;
			width: 40px;
			height: 42px;
		}

		.notification_dd li.baskin_robbins .notify_icon .icon {
			background-position: 0 -43px;
		}

		.notification_dd li.mcd .notify_icon .icon {
			background-position: 0 -86px;
		}

		.notification_dd li.pizzahut .notify_icon .icon {
			background-position: 0 -129px;
		}

		.notification_dd li.kfc .notify_icon .icon {
			background-position: 0 -178px;
		}

		.notification_dd li .notify_data {
			margin: 0 15px;
			width: 70%;
		}

		.notification_dd li .notify_data .title {
			color: #000;
			font-weight: 600;
		}

		.notification_dd li .notify_data .sub_title {
			font-size: 14px;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			margin-top: 5px;
		}

		.notification_dd li .notify_status p {
			font-size: 12px;
			width: 30%;
		}

		.notification_dd li.success .notify_status p {
			color: #47da89;
		}

		.notification_dd li.failed .notify_status p {
			color: #fb0001;
		}

		.notification_dd li.show_all {
			padding: 20px;
			display: flex;
			justify-content: center;
		}

		.notification_dd li.show_all p {
			font-weight: 700;
			color: #3b80f9;
			cursor: pointer;
		}

		.notification_dd li.show_all p:hover {
			text-decoration: underline;
		}

		.navbar1 .navbar_right .profile .icon_wrap {
			display: flex;
			align-items: center;
		}

		.navbar1 .navbar_right .profile .name {
			display: inline-block;
			margin: 0 10px;
		}

		.navbar1 .navbar_right .icon_wrap:hover,
		.navbar1 .navbar_right .profile.active .icon_wrap,
		.navbar1 .navbar_right .notifications.active .icon_wrap {
			color: #3b80f9;
		}

		.navbar1 .profile .profile_dd {
			width: 150px;
		}

		.navbar1 .profile .profile_dd:before {
			rigth: 10px;
		}

		.navbar1 .profile .profile_dd ul li {
			border-bottom: 1px solid #f1f2f4;
		}

		.navbar1 .profile .profile_dd ul li a {
			display: block;
			padding: 15px 35px;
			position: relative;
		}

		.navbar1 .profile .profile_dd ul li a .picon {
			display: inline-block;
			width: 30px;
		}

		.navbar1 .profile .profile_dd ul li a:hover {
			color: #3b80f9;
			background: #f0f5ff;
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
		}

		.navbar1 .profile .profile_dd ul li.profile_li a:hover {
			background: transparent;
			cursor: default;
			color: #7f8db0;
		}

		.navbar1 .profile .profile_dd ul li .btn {
			height: 32px;
			padding: 7px 10px;
			color: #fff;
			border-radius: 3px;
			cursor: pointer;
			text-align: center;
			background: #3b80f9;
			width: 125px;
			margin: 5px auto 15px;
		}

		.navbar1 .profile .profile_dd ul li .btn:hover {
			background: #6593e4;
		}

		.navbar1 .profile.active .profile_dd,
		.navbar1 .notifications.active .notification_dd {
			display: block;
		}

		.popup {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			transition: all 0.2s ease;
			display: none;
		}

		.popup .shadow {
			width: 100%;
			height: 100%;
			background: #000;
			opacity: 0.6;
		}

		.popup .inner_popup {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 100%;
			height: auto;
		}

		.popup .notification_dd {
			display: block;
			position: static;
			margin: 0 auto;
			height: 478px;
			overflow: auto;
			width: 50%;
		}

		.popup .notification_dd:before {
			display: none;
		}

		.popup .notification_dd li.title {
			font-weight: 700;
			color: #3b80f9;
			display: flex;
			justify-content: center;
			position: relative;
		}

		.popup .notification_dd li.title .close {
			position: absolute;
			top: 2px;
			right: 10px;
			font-size: 20px;
			cursor: pointer;
		}

		.popup .notification_dd li.title .close:hover {
			opacity: 0.5;
		}

		@media screen and (max-width: 660px) {
			.popup .notification_dd {
				width: 85%;
			}

			.navbar1 .profile .profile_dd,
			.notification_dd {
				position: absolute;
				top: 48px;
				right: -15px;
				user-select: none;
				background: #fff;
				border: 1px solid #c7d8e2;
				width: 275px;
				height: auto;
				display: none;
				border-radius: 3px;
				box-shadow: 10px 10px 35px rgba(0, 0, 0, 0.125),
					-10px -10px 35px rgba(0, 0, 0, 0.125);
				z-index: 10000;
			}

			.navbar1 .profile .profile_dd {
				width: 150px;
			}

			.navbar1 .navbar_right img {
				width: 30px;
			}

			.navbar1 .navbar_right .notifications {
				margin-right: 4px;
			}

			.navbar1 .navbar_right .notifications .icon_wrap {
				font-size: 22px;
			}
		}

		/*starting_popup */
.start_popup{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	transition: all 0.2s ease;
}
.shadow_2{
	width: 100%;
	height: 100%;
	background: #000;
	opacity: 0.6;
}
.inner_start_popup{
	border-radius: 10px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 50%;
	height: auto;
	background-color: white;
	padding: 9px;
	border: 4px solid #43b97e;
}
	.close_2{
		position: absolute;
	  font-size: 20px;
	  cursor: pointer;
		display: flex;
    right: 9px;
	}
	@media screen and (max-width: 770px){
		.inner_start_popup{
			width: 80%;
		}
	}
	</style>




	<div class="clientDashboard">


		<!-- <div class="sidebar sidebar_menu">
			<ul class="sidebar_menu">
				<li><a class="mob-logo" href="/"><img src="{% static 'images/logo.png' %}" alt="logo"></a></li>
				<li><a id="home" class="active" href="#"><i class="fa fa-home"></i> Home</a></li>
				<li><a id="live_session" href="#"><i class="fa fa-video-camera"></i> My Work</a></li>
				<li><a id="profile" href="#"><i class="fa fa-user"></i> Profile</a></li>
				<li><a id="project_lab" href="#"><i class="fa fa-bug"></i> Payment</a></li>
				<li><a id="instruction" href="#"><i class="fa fa-file"></i> Instructions</a></li>
				<li class="logout"><a id="" href="/tutor-logout/"><i class="fa fa-cog"></i> Logout</a></li>
			</ul>
		</div> -->

		<!-- <div style="overflow: hidden; background-color: white;"> -->
		<div style="background-color: white;">

			<div class="tutor-wrapper sidebar_menu navbar1">
				<nav>
					<input type="checkbox" id="show-search">
					<input type="checkbox" id="show-search2">
					<input type="checkbox" id="show-menu">
					<label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
					<div class="content">
						<div class="logo" style="margin-right: 23px;"><a href="#"><img
									src="<?php echo base_url();?>assets/front/images/logo.png" alt="logo"></a></div>
						<ul class="links sidebar_menu"
							style="background-color: #d9d9d9; margin-bottom: 11px; padding: 3px 15px;">
							<li><a id="home" class="active" href="#"><i class="fa fa-home"></i> Home</a></li>
							<li><a id="live_session" href="#"><i class="fa fa-video-camera"></i> My Work</a></li>
							<li>
								<a id="project_lab" href="#"><i class="fa fa-bug"></i> Payment</a>
							</li>
							<li>
								<a id="instruction" href="#"><i class="fa fa-file"></i> Instructions</a>
							</li>
						</ul>
					</div>

					<div class="navbar_right">
						<div class="notifications">
							<div class="icon_wrap"><i class="far fa-bell"></i></div>
						</div>
						<div class="profile">
							<div class="icon_wrap">
								<?php if($user_detail['profle'] != ''){?>
								<img src="<?php echo $user_detail['profle']; ?>" alt="profile_pic">
								<?php }else{?>
								<img src="<?php echo base_url();?>assets/front/dashboard/images/profi.png" alt="profile_pic">
								<?php } ?>
								<span class="name"><?php echo $tutor_register['name']; ?></span>
								<i class="fas fa-chevron-down"></i>
							</div>

							<div class="profile_dd">
								<ul class="profile_ul">
									<!-- <li class="profile_li"><a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i>
                </span>Profile</a> -->
									<li><a style="background-color: #ddd;" id="profile" href="#"><i
												class="fas fa-user"></i> Profile</a>
									</li>
									<li><a style="background-color: #ddd;" id="" href="<?php echo base_url()?>tutor/tutor-logout/"><i
												class="fa fa-cog"></i> Logout</a></li>
								</ul>
							</div>
						</div>
					</div>


				</nav>
			</div>


		</div>
	</div>
	<!-- end -->

	<div class="popup">
		<div class="shadow"></div>
		<div class="inner_popup">
			<div class="notification_dd">
				<ul class="notification_ul">
					<li class="title">
						<p>All Notifications</p>
						<p class="close"><i class="fas fa-times" aria-hidden="true"></i></p>
					</li>
					<li class="starbucks success">
						<!-- <div class="notify_icon">
                        <span class="icon"></span>
                    </div> -->
						<div class="notify_data">
							<div class="title">
								Lorem, ipsum dolor.
							</div>
							<div class="sub_title">
								Lorem ipsum dolor sit amet consectetur.
							</div>
						</div>
						<div class="notify_status">
							<p>Success</p>
						</div>
					</li>
					<li class="starbucks success">
						<!-- <div class="notify_icon">
												<span class="icon"></span>
										</div> -->
						<div class="notify_data">
							<div class="title">
								Lorem, ipsum dolor.
							</div>
							<div class="sub_title">
								Lorem ipsum dolor sit amet consectetur.
							</div>
						</div>
						<div class="notify_status">
							<p>Success</p>
						</div>
					</li>
					<li class="starbucks success">
						<!-- <div class="notify_icon">
												<span class="icon"></span>
										</div> -->
						<div class="notify_data">
							<div class="title">
								Lorem, ipsum dolor.
							</div>
							<div class="sub_title">
								Lorem ipsum dolor sit amet consectetur.
							</div>
						</div>
						<div class="notify_status">
							<p>Success</p>
						</div>
					</li>
					<li class="starbucks success">
						<div class="notify_data">
							<div class="title">
								Lorem, ipsum dolor.
							</div>
							<div class="sub_title">
								Lorem ipsum dolor sit amet consectetur.
							</div>
						</div>
						<div class="notify_status">
							<p>Success</p>
						</div>
					</li>
						<div class="notify_data">
							<div class="title">
								Lorem, ipsum dolor.
							</div>
							<div class="sub_title">
								Lorem ipsum dolor sit amet consectetur.
							</div>
						</div>
						<div class="notify_status">
							<p>Failed</p>
						</div>
					</li>
					<li class="mcd success">
						<div class="notify_data">
							<div class="title">
								Lorem, ipsum dolor.
							</div>
							<div class="sub_title">
								Lorem ipsum dolor sit amet consectetur.
							</div>
						</div>
						<div class="notify_status">
							<p>Success</p>
						</div>
					</li>
					<li class="pizzahut failed">
						<div class="notify_data">
							<div class="title">
								Lorem, ipsum dolor.
							</div>
							<div class="sub_title">
								Lorem ipsum dolor sit amet consectetur.
							</div>
						</div>
						<div class="notify_status">
							<p>Failed</p>
						</div>
					</li>
					<li class="kfc success">
						<div class="notify_data">
							<div class="title">
								Lorem, ipsum dolor.
							</div>
							<div class="sub_title">
								Lorem ipsum dolor sit amet consectetur.
							</div>
						</div>
						<div class="notify_status">
							<p>Success</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div class="start_popup">
	<div class="shadow_2"></div>
	<div class="inner_start_popup">
		<div class="close_2"><i class="fas fa-times" aria-hidden="true"></i></div>
		<div style="display:flex; padding: 27px 20px;">We are very happy to have you on our team. As a startup, we are constantly working to provide you with the best earning opportunities but we know that things take time to build up. Also the current semester is over. So we are hopeful that we will do well together in the upcoming semester starting by September. Till then we request you to kindly calm down and support us in this initial phase.</div>
	</div>
</div>
		<div class="dummy-text mainContent DashboardContent" >
			<div class="dTbale homeContant active_">
				<ul style="margin: 0 0 -10px 20px;" class="nav nav-tabs border-0">
					<li class=""><a data-toggle="tab" class="active" href="#menu1">Assignments</a></li>
					<li><a data-toggle="tab" href="#menu3">Available Assignments</a></li>
				</ul>
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade active show">
						<form class="commForm" method="" action="">
							<div class="flex_div search_box">
								<h2> Inprogress Order</h2>
							</div>

							<table class="table1 table table-striped" style="border: 2px solid #43b97e;">
								<tbody>
									<tr class="thead"
										style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-bottom: 2px solid #43b97e;text-align: center;">
										<td>Order ID</td>
										<td>Description</td>
										<td>Assignment File</td>
										<td>Deadline</td>
										<td>Time</td>
										<td>Amount</td>
									<!--	<td>Chat</td>-->
									</tr>
									<?php 
									foreach ($TutorWorkingAssignment as $key => $assignment) { 
									
									    $file = 'javascript:void(0)';
                                        $preview = 'NA';
                                        if($assignment['assignment'] != '' && $assignment['assignment'] != null){
                                            $file = base_url().$assignment['assignment'];
                                            $preview = 'Preview';
                                        }
                                        ?>
										<tr style="font-size: 13px;color: #3c3b3b;border-top: none;text-align: center;">
											<td><?php echo $assignment['order_id'];?></td>
											<td style="max-width:150px;"><?php echo $assignment['description'];?></td>
											<td><a href="<?php echo $file ?>" target="_blank"><?php echo $preview;?></a> </td>
											<td style="color:#43b97e;"><?php echo $assignment['deadline'];?></td>
											<td style="color:#43b97e;">NA</td>
											<td style="color: #43b97e;"><?php echo $assignment['float_expert_amount'];?></td>
											<!--<td>
												<div class="chatIcon main_chat_icon"><img style="height: 30px;"
														src="<?php echo base_url();?>assets/front/dashboard/images/chat.png"></div>
											</td>-->
										</tr>
									<?php } ?>
								</tbody>
							</table>

							</table>

						</form>

					</div>

					<div id="menu3" class="tab-pane fade">
						<form class="commForm" method="" action="">
							<div class="flex_div search_box">
								<h2> Available Assignments</h2>
							</div>
							<table class="table1 table table-striped" style="border: 2px solid #43b97e;">
								<tbody>
									<tr class="thead"
										style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-bottom: 2px solid #43b97e;text-align: center;">
										<td>Order ID</td>
										<td>Description</td>
										<td>Assignment File</td>
										<td>Deadline</td>
										<td>Time</td>
										<td>Amount</td>
										<td>Interested</td>
									</tr>
									<?php 
									foreach ($TutorAvailabelOrder as $key => $assignment) 
									{    
									    $file = 'javascript:void(0)';
                                        $preview = 'NA';
                                        if($assignment['assignment'] != '' && $assignment['assignment'] != null){
                                            $file = base_url().$assignment['assignment'];
                                            $preview = 'Preview';
                                        }
									    
										?>
										<tr style="font-size: 13px;color: #3c3b3b;border-top: none;text-align: center;">
											<td><?php echo $assignment['order_id'];?></td>
											<td style="max-width:150px;"><?php echo $assignment['description'];?></td>
											<td><a href="<?php echo $file ?>" target="_blank"><?php echo $preview;?></a> </td>
											<td style="color:#43b97e;"><?php echo $assignment['deadline'];?></td>
											<td style="color:#43b97e;">NA</td>
											<td style="color: #43b97e;"><?php echo $assignment['float_expert_amount'];?></td>
											<td><select class="form-control" id="intested_op<?php echo $assignment['id'];?>" onchange="show_interest(<?php echo $assignment['id'];?>)"><option value="1" <?php if(trim($assignment['interested']) == '1'){ echo 'selected';} ?>>Yes</option><option value="0" <?php if(trim($assignment['interested']) == '' || trim($assignment['interested']) == 0){ echo 'selected';} ?>>No</option></select></td>
											
										</tr>
									<?php } ?>
								</tbody>
							</table>


						</form>
					</div>
				</div>
			</div>
			<div class="profileContent">
				<div class="col50">
					<form class="commForm mt-3" method="POST" enctype="multipart/form-data" action="<?php echo base_url()?>tutor/tutor_profile/">
						<div class="avatar-upload">
							<div class="avatar-edit">
								<input type='file' id="imageUpload" name="profile" accept=".png, .jpg, .jpeg" />
								<label for="imageUpload"><img title="Add profile photo"
										src="<?php echo base_url();?>assets/front/images/camera.png"></label>
							</div>
							<div class="avatar-preview">
								<?php if($user_detail['profle'] != ''){?>
								<div id="imagePreview" style="background-image: url(<?php echo $user_detail['profle'];?>);">
									<?php }else{?>
									<div id="imagePreview" style="background-image: url('');">
										<?php } ?>
									</div>
								</div>
								
							</div>
							<h2 class="text-dark text-left"><?php echo $tutor_register['name'];?></h2>
							<p>Edit/update your details here</p>
							<div class="">
								<label>Enter Your Name </label>
								<input type="name" name="nae" class="input" placeholder="Enter Name"
									value="<?php echo $tutor_register['name'];?>">
							</div>
							<div class="">
								<label>Enter Your Email Id </label>
								<input type="email" name="email" class="input" readonly placeholder="Enter Email"
									value="<?php echo $tutor['email'];?>">
							</div>
							<div class="">
								<label>Enter Phone/WhatsApp Number</label>
								<input name="if-phone" id="if-phone" value="<?php echo $tutor_register['phone'];?>" class="input"
									placeholder="Enter Phone Number" type="text" maxlength="10">
							</div>
							<div class="">
								<label>University/College</label>
								<input class="input" required="" name="College" type="text"
									placeholder="University/College" value="<?php echo $tutor_register['college'];?>">
							</div>
							<div>
								<input type="checkbox" id="" name="checkbox" value="">
								<label for="checkbox">Get Email Notifications</label>
							</div>

							<div class="psr mt-3">
								<input type="submit" class="formBtn theme-btn btn-style-one" value="Get Solution Now">

								<a href="" class="theme-btn btn-style-one"><span class="txt">Update</span></a>
								<input name="hyd_profile" id="hyd_profile" value="1" type="hidden">
							</div>
					</form>
				</div>
				<div class="col50">
					<form class="commForm mt-3" method="POST" action="<?php echo base_url()?>tutor/tutor_reset_password">
						<h2 class="text-dark text-left">Password</h2>
						<p>Create new password here</p>
						<div class="" style="position: relative;">
							<label>New Password</label>
							<input class="input" type="password" name="password" placeholder="New Password"
								id="password">
							<i onclick="changeInputType()" class="show_password_icon fa fa-eye"></i>
						</div>
						<div class="" id="confm_password" style="position: relative;">
							<label>Confirm Password</label>
							<input class="input" type="password" name="confm_password" placeholder="Confirm Password"
								id="con_password">
							<i onclick="changeInputType2()" class="show_CPassword_icon fa fa-eye"></i>
						</div>
						<div class="psr mt-3">
							<input type="submit" class="formBtn theme-btn btn-style-one" value="Update">

							<a href="" class="theme-btn btn-style-one"><span class="txt">Update</span></a>

						</div>
					</form>
				</div>
			</div>

			<div class="live_session_content">
				<ul style="margin: 0 0 -10px 20px;" class="nav nav-tabs border-0">
					<li class=""><a data-toggle="tab" class="active" href="#tab_1">Assignments</a></li>
					<!--<li><a data-toggle="tab" href="#tab_2">lab</a></li>-->
				</ul>

				<div class="tab-content">

					<div id="tab_1" class="tab-pane fade active show">
						<form class="commForm" method="" action="">
							<div class="flex_div search_box">
								<h2> Completed Assignments</h2>
							</div>
							<table class="table1 table table-striped" style="border: 2px solid #43b97e;">
								<tbody>
									<tr class="thead"
										style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-bottom: 2px solid #43b97e;text-align: center;">
										<td>Order ID</td>
										<td>Description</td>
										<td>Assignment File</td>
										<td>Deadline</td>
										<td>Time</td>
										<td>Amount</td>
									</tr>
									<?php 
									foreach ($assignments as $key => $assignment) 
									{
										
										?>
										<tr style="font-size: 13px;color: #3c3b3b;border-top: none;text-align: center;">
											<td><?php echo $assignment['order_id'];?></td>
											<td style="max-width:150px;"><?php echo $assignment['description'];?></td>
											<td><a href="<?php echo $file ?>" target="_blank"><?php echo $preview;?></a> </td>
											<td style="color:#43b97e;"><?php echo $assignment['deadline'];?></td>
											<td style="color:#43b97e;">NA</td>
											<td style="color: #43b97e;"><?php echo $assignment['float_expert_amount'];?></td>
										</tr>
										<?php  } ?>
								</tbody>
							</table>

							
						</form>
					</div>
					<div id="tab_2" class="tab-pane fade">
						<form class="commForm" method="" action="">
						
						
						</form>
					</div>
				</div>
			</div>
			<div class="instructions_content" id="instructions_content">
				<iframe title="CVHA Plumbing Need a Plumbing Services?" onload="window.parent.scrollTo(0,0)"
					allowtransparency="true" allowfullscreen="true" allow="geolocation; microphone; camera"
					src="<?php echo base_url();?>assets/front/images/InsForTutors.pdf#view=FitH" frameborder="0" style="min-width: 100%;
    height: 96vh;
    border: none;" scrolling="no" height="100%" width="100%"></iframe>
			</div>
			<div class="project_lab_content">

				<form class="commForm mt-3" method="POST" action="{% url 'withdrawl' %}">
					<div>
						<h2 class="aq_cstm_h2">
							<b>Redeemable & Total Earning
								<sup><i class="fa fa-exclamation-circle" aria-hidden="true"></i></sup><br> <?php echo $b;?> INR
							</b>
						</h2>
						<div class="Redeem_box">
							<input type="text" placeholder="Enter Amount to Redeem" name="withdrawl" required>
							<input type="submit" class="theme-btn btn-style-one txt" value="Redeem">
						</div>
				</form>
				<p style="text-align: center;">Please update your account details completely so that there is no problem
					while redeeming your amount.</p>
				<div class="dTbale Payment_content">
					<ul style="margin: 0 0 -10px 20px;" class="nav nav-tabs border-0">
						<li class=""><a data-toggle="tab" class="" href="#tutor_payments">Tutor Payments</a></li>
						<li><a data-toggle="tab" href="#earn_detail" class="">Earned Details</a></li>
						<li><a data-toggle="tab" href="#account" class="active">Account</a></li>
					</ul>

					<div class="tab-content">

						<div id="tutor_payments" class="tab-pane fade">
							<div class="connent_con table_container">
								<table class="table table-striped" style="border: 2px solid #43b97e;">
									<tbody>
										<tr class="thead"
											style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-bottom: 2px solid #43b97e;text-align: center;">
											<td>Trans. ID</td>
											<td>Date</td>
											<td>Amount</td>
											<td>Transferred to Account</td>
											<td>TDS</td>
											<td>Payout Status</td>
										</tr>
										<?php foreach ($payment_history as $key => $history) {?>
										<tr style="font-size: 13px;color: #3c3b3b;border-top: none;text-align: center;">
											<td style="width: 16%;"><?php echo $history['transaction_id'];?></td>
											<td style="width: 16%;"><?php echo $history['date'];?></td>
											<td style="width: 16%;"><?php echo $history['amount'];?></td>
											<td><?php echo $history['account'];?></td>
											<td style="width: 16%;"><?php echo $history['tds'];?></td>
											<td style="width: 16%;"><?php echo $history['status'];?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<div id="earn_detail" class="tab-pane fade">
							<div class="connent_con">
								<table class="table table-striped" style="border: 2px solid #43b97e;">
									<tbody>
										<tr class="thead"
											style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-bottom: 2px solid #43b97e;text-align: center;">
											<td style="width: 25%;">Discription</td>
											<td style="width: 25%;">Time</td>
											<td style="width: 25%;">Date</td>
											<td style="width: 25%;">Amount</td>
										</tr>
										<?php foreach ($earned as $key => $earned) {?>
										<tr style="font-size: 13px;color: #3c3b3b;border-top: none;text-align: center;">
											<td style="width: 25%;"><?php echo $earned['description'];?></td>
											<td style="width: 25%;"><?php echo $earned['time'];?></td>
											<td style="width: 25%;"><?php echo $earned['date'];?></td>
											<td style="width: 25%;"><?php echo $earned['amount'];?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<div id="account" class="tab-pane fade active show">
							<div class="connent_con">
								<form class="commForm" method="POST" action="<?php echo base_url()?>tutor/dashboard/">
									<div class="form_group">
										<div class="pos_rel">
											<label>Payment Mode</label>
											<input class="input" required="" name="bank" type="text" placeholder="Bank">
										</div>
										<div class="pos_rel">
											<label>PAN number</label>
											<input required class="input pan_card" type="text"
												placeholder="PAN card number" name="pan_card" id="pan_card"
												maxlength="10" minlength="10" value="<?php echo $tutor_account['pan_number'];?>">
										</div>
									</div>
									<div class="form_group">
										<div class="pos_rel">
											<label>Name on PAN</label>
											<input required class="input" required="" name="pan_name" type="text"
												placeholder="Salman Khan" value="<?php echo $tutor_account['name_on_pan'];?>">
										</div>
										<div class="pos_rel">
											<label>Name in Account</label>
											<input required class="input" required="" name="name_in_account" type="text"
												placeholder="Name in Account" value="<?php echo $tutor_account['name_in_account'];?>">
										</div>
									</div>
									<div class="form_group">
										<div class="pos_rel">
											<label>Bank Account Number</label>
											<input required name="account_number" id="account_number" class="input"
												type="text" placeholder="Account Number"
												value="<?php echo $tutor_account['account_number'];?>">
										</div>
										<div class="pos_rel px_15">
											<label>Confirm Account Number</label>
											<input required name="confirm_bank_account" id="confirm_account_number"
												class="input" type="text" placeholder="Confirm Account Number"
												value="<?php echo $tutor_account['account_number'];?>">
										</div>
										<div class="pos_rel">
											<label>IFSC Code</label>
											<input required name="ifsc" id="ifsc_code" class="input" type="text"
												placeholder="Enter IFSC Code" value="<?php echo $tutor_account['ifsc'];?>">
										</div>
									</div>
									<div class="text-center psr mt-3">
										<input type="submit" class="formBtn theme-btn btn-style-one" value="Update">
										<input type="hidden" name="tutor_register_up" id="tutor_register_up" value="1">
										<a href="" class="theme-btn btn-style-one"><span class="txt">Update</span></a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="notifications_table">
		</div>
	</div>
	</div>
	<div class="modal" id="myModal">
		<div class="modal-dialog customPopWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<div class="modal-body">
					<form action="" method="post" id="firstStp"
						class="firstStp commForm border-0 p-3 login_form loginF">
						<div class="pos_rel">
							<label>Choose Assignment Deadline</label>
							<input type="date" required="" class="input" name="deadline" id="" placeholder="Deadline">
						</div>
						<div class="pos_rel">
							<label>Your Message*</label>
							<textarea name="Details" id="description" class="Detail"
								placeholder="Write assignment description"></textarea>
							<div>
								<input type="file" name="files" id="files" multiple="" value="Add File">
								<p id="file-name" class="fileName"></p>
							</div>
						</div>
						<div class="text-right psr mx-4 mt-3">
							<input type="submit" class="formBtn theme-btn btn-style-one" value="Get Solution Now">
							<a href="" class="theme-btn btn-style-one"><span class="txt">submit</span></a>
							<a class="nextStepbtn" id="nextStepbtn" href="javascript:void(0)">Project/Lab Assignment</a>
						</div>
					</form>

					<form action="" method="post" id="secondStp"
						class="secondStp ProjectLabAssignment commForm border-0 p-3 login_form loginF">
						<div class="form_group">
							<div class="pos_rel">
								<label>Choose Assignment Deadline</label>
								<input type="date" required="" class="input" name="deadline" id=""
									placeholder="Deadline">
							</div>
							<div class="pos_rel">
								<label>Lab Manual</label>
								<input type="file" class="attach_file input" required="" multiple="" value="Add File"
									name="lab_manual">
							</div>
						</div>
						<div class="form_group">

							<div class="pos_rel">
								<label>Report Guidelines</label>
								<input type="file" class="attach_file input" required="" multiple="" value="Add File"
									name="report_guidline">
							</div>
							<div class="pos_rel">
								<label>Lab Data</label>
								<input type="file" class="attach_file input" required="" multiple="" value="Add File"
									name="lab_data">
							</div>
						</div>
						<div class="form_group">
							<div class="pos_rel">
								<label>Reference Materials</label>
								<input type="file" class="attach_file input" required="" multiple="" value="Add File"
									name="reference_material">
							</div>
						</div>
						<div class="text-center psr mt-3 mb-2">
							<input type="submit" class="formBtn theme-btn btn-style-one" value="Get Solution Now">
							<a href="" class="theme-btn btn-style-one"><span class="txt">Get Solution Now</span></a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		$(".profile .icon_wrap").click(function () {
			$(this).parent().toggleClass("active");
			$(".notifications").removeClass("active");
			$('#show-menu').prop("checked", false);
		});

		$(".notifications .icon_wrap").click(function () {
			$(this).parent().toggleClass("active");
			$(".profile").removeClass("active");
			$('#show-menu').prop("checked", false);
		});

		$(".show_all .link").click(function () {
			$(".notifications").removeClass("active");
			$(".popup").show();
		});

		$(".close, .shadow").click(function () {
			$(".popup").hide();
		});

		// notification and profile icon ends

 $(".close_2, .shadow_2").click(function(){
	 $(".start_popup").hide();
 });


		$(document).ready(function () {
			$('#choose-file').change(function () {
				var i = $(this).prev('label').clone();
				var file = $('#choose-file')[0].files[0].name;
				$(this).prev('label').text(file);
			});
		});

		$(document).ready(function () {
			$('.main_chat_icon').click(function () {
				$('.chat_box').addClass("open");
			});
			$('#close_chat').click(function () {
				$('.chat_box').removeClass("open");
			});
		});

		$("#home").click(function () {
			$(".homeContant").addClass("active_");
			$(".profileContent").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$("#instructions_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
			$(".notifications_table").removeClass("active_");
			$(".profile").removeClass("active");
			$(".notifications").removeClass("active");
			$('#show-menu').prop("checked", false); // Unchecks the menu icon
		});
		$("#notifications").click(function () {
			$(".homeContant").removeClass("active_");
			$(".profileContent").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$("#instructions_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
			$('.sidebar_menu ul li a').removeClass("active");
			$(".notifications_table").addClass("active_");
			$(".profile").removeClass("active");
			$(".notifications").removeClass("active");
			$('#show-menu').prop("checked", false); // Unchecks the menu icon
		});

		$("#profile").click(function () {
			$(".profileContent").addClass("active_");
			$(".homeContant").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$("#instructions_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
			$(".notifications_table").removeClass("active_");
			$(".profile").removeClass("active");
			$(".notifications").removeClass("active");
			$('#show-menu').prop("checked", false); // Unchecks the menu icon
		});
		$("#live_session").click(function () {
			$(".live_session_content").addClass("active_");
			$(".profileContent").removeClass("active_");
			$(".homeContant").removeClass("active_");
			$("#instructions_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
			$(".notifications_table").removeClass("active_");
			$(".profile").removeClass("active");
			$(".notifications").removeClass("active");
			$('#show-menu').prop("checked", false); // Unchecks the menu icon
		});
		$("#instruction").click(function () {
			$("#instructions_content").addClass("active_");
			$(".profileContent").removeClass("active_");
			$(".homeContant").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
			$(".notifications_table").removeClass("active_");
			$(".profile").removeClass("active");
			$(".notifications").removeClass("active");
			$('#show-menu').prop("checked", false); // Unchecks the menu icon
		});
		$("#project_lab").click(function () {
			$(".project_lab_content").addClass("active_");
			$(".profileContent").removeClass("active_");
			$(".homeContant").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$("#instructions_content").removeClass("active_");
			$(".notifications_table").removeClass("active_");
			$(".profile").removeClass("active");
			$(".notifications").removeClass("active");
			$('#show-menu').prop("checked", false); // Unchecks the menu icon
		});

		$("#change_sub").click(function () {
			$(".Update_subject_content").addClass("active_");
			$(".profileContent .col50").toggle();
		});

		$(document).ready(function () {
			$('.sidebar_menu ul li a').click(function () {
				$('.sidebar_menu ul li a').removeClass("active");
				$(this).addClass("active");
			});
		});
		// $(document).ready(function () {
		// 	$('#mobBtn').click(function () {
		// 		$('.sidebar').toggleClass("open");
		// 		var classname = $("#i").attr("class")
		// 		if(classname=="fa fa-bars"){
		// 			$("#i").removeClass("fa fa-bars");
		// 			$("#i").addClass("icon flaticon-multiply");
		// 		}
		// 		else{
		// 			$("#i").removeClass("icon flaticon-multiply");
		// 			$("#i").addClass("fa fa-bars");
		// 		}
		// 	});
		// });
		$(document).ready(function () {
			$('.sidebar a').click(function () {
				$('.sidebar').toggleClass("open");
			});
		});
		$(document).ready(function () {
			$('.main_sub_con_inner a').click(function () {
				$('.static_t span').hide();
			});
		});

		$("#interest").submit(function (e) {
			e.preventDefault();
			var form = $("#interest")[0];
			var data = new FormData(form)
			var actionurl = $("#interest").attr('action');
			$.ajax({
				type: "POST",
				url: actionurl,
				data: data,
				cache: false,
				processData: false,
				contentType: false,
				success: function (data) {
					alert(data['msg'])
				}
			})
		})
	</script>


	<script>
		function changeInputType() {
			$(".show_password_icon").toggleClass("fa-eye-slash");
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}

		function changeInputType2() {
			$(".show_CPassword_icon").toggleClass("fa-eye-slash");
			var ConfirmPassword = document.getElementById("con_password");
			if (ConfirmPassword.type === "password") {
				ConfirmPassword.type = "text";
			} else {
				ConfirmPassword.type = "password";
			}
		}

		$(document).ready(function () {
			$('.main_chat_icon').click(function () {
				$('.chat_box').addClass("open");
			});
			$('#close_chat').click(function () {
				$('.chat_box').removeClass("open");
			});
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#imagePreview').css('background-image', 'url('+e.target.result +')');
					$('#imagePreview').hide();
					$('#imagePreview').fadeIn(650);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imageUpload").change(function() {
			readURL(this);
		});
	</script>
    
    <script>
        function show_interest(id){
            var val = $('#intested_op'+id).val()
            if(confirm('Are you sure')){
                $.ajax({
                type        : 'GET',
                url         : "<?php echo base_url('/tutor/show-interest/');?>"+id+'/'+val,
                success     : function(response)
                {   
                   
                }
                });
            }
        }
    </script>


</body>

</html>
