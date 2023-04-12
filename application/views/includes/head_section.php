<?php 
$req_url = "https://" . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
if($req_url != strtolower($req_url)) {
    $req_url = strtolower($req_url);
    header("HTTP/1.1 301 Moved Permanently");
    header('Location:  '. trim($req_url)  );
    die;
}

$req_url = preg_replace('/\/page.*/', '', $req_url);
if(strpos($req_url, '/index.php') !== false || strpos($req_url, '/index.php/') !== false) {
    $req_url = str_replace('/index.php','',$req_url);
    if($home_page == '1'){
        redirect($req_url,'location',301);
    }else{
        redirect($req_url);
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/fav.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/front/style.css" />
	<title>Homework Help | Online Homework Help 24/7 | TutorChamps</title>
	<style>
		html {
			scroll-behavior: smooth;
		}

		* {
			margin: 0;
			padding: 0;
			text-decoration: none;
		}

		.container {
			max-width: 1400px;
			padding: 0 20px;
		}

		body,
		html {
			overflow-x: hidden !important;
			width: 100%;
			box-sizing: border-box;
		}

		body,
		body p,
		input,
		div {
			font-family: 'Noto Sans TC', sans-serif;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: Noto Sans;
		}

		body p {
			font-size: 20px;
			line-height: 30px;
		}

		h3 {
			font-size: 44px;
			font-weight: bold;
			line-height: 55px;
		}

		.logo {
			max-width: 215px;
		}

		img {
			max-width: 100%;
		}

		.light_b {
			background: #08b07b0a
		}

		.light_y {
			background: #f9d76226;
		}

		header.fixed {
			position: fixed;
			top: 0;
			width: 100%;
			background: #fff;
			z-index: 999999;
			padding: 10px 0;
			border-bottom: 1px solid #ddd;
			transition: .2s ease-in-out;
		}
		header{    width: 100%;
    background: #fff;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
    transition: .2s ease-in-out;
    position: relative;
    z-index: 99999999;}

		header nav {
			position: relative;
			display: flex !important;
			justify-content: space-between;
		}

		.cssmenu>ul {
			width: calc(100% - 215px);
			text-align: right;
			margin-bottom: 0;
		}

		.btn_con {
			display: flex;
			align-items: center;
			border: 1px solid #686666;
			border-radius: 140px;
		}

		.btn_con a.active {
			background-color: #43b97e;
			color: #fff !important;
		}

		.sign_up {
			padding: 15px 20px 17px !important;
			border-radius: 50px;
		}

		.cssmenu,
		.cssmenu ul,
		.cssmenu ul li,
		.cssmenu ul li a,
		.cssmenu #head-mobile {
			border: 0;
			list-style: none;
			line-height: 1;
			display: block;
			position: relative;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box
		}

		.cssmenu:after,
		.cssmenu>ul:after {
			content: ".";
			display: block;
			clear: both;
			visibility: hidden;
			line-height: 0;
			height: 0
		}

		.cssmenu #head-mobile {
			display: none
		}

		.cssmenu>ul>li {
			display: inline-block;
		}

		.cssmenu>ul>li>a {
			margin-right: 5px;
		}

		.cssmenu>ul>li>a:hover {
			color: #43b97e;
		}

		.cssmenu>ul>li>a:after {
			content: "";
			position: absolute;
			left: 0;
			width: 100%;
			height: 3px;
			background: transparent;
			bottom: 0;
		}

		.cssmenu>ul>li>a:hover::after {
			background: #43b97e;
		}

		.cssmenu>ul>li>a,
		.btn_con a {
			position: relative;
			padding: 16px 25px;
			font-size: 16px;
			letter-spacing: .5px;
			text-decoration: none;
			color: #000;
			font-weight: 500;
		}

		.cssmenu>ul>li:hover,
		.cssmenu ul li.active:hover,
		.cssmenu ul li.active,
		.cssmenu ul li.has-sub.active:hover {
			-webkit-transition: background .3s ease;
			-ms-transition: background .3s ease;
			transition: background .3s ease;
		}

		.cssmenu>ul>li.has-sub>a {
			padding-right: 30px
		}

		.cssmenu>ul>li.has-sub>a:after {
			opacity: 0;
			position: absolute;
			top: 22px;
			right: 11px;
			width: 8px;
			height: 2px;
			display: block;
			background: #ddd;
			content: ''
		}

		.cssmenu>ul>li.has-sub>a:before {
			opacity: 0;
			position: absolute;
			top: 19px;
			right: 14px;
			display: block;
			width: 2px;
			height: 8px;
			background: #ddd;
			content: '';
			-webkit-transition: all .25s ease;
			-ms-transition: all .25s ease;
			transition: all .25s ease
		}

		.cssmenu>ul>li.has-sub:hover>a:before {
			top: 23px;
		}

		.cssmenu ul ul {
			position: absolute;
			left: -9999px;
			text-align: left;
		}

		.cssmenu ul ul li {
			-webkit-transition: all .25s ease;
			-ms-transition: all .25s ease;
			background: #fff;
			transition: all .25s ease
		}

		.cssmenu li:hover>ul {
			left: auto;
			z-index: 99999999999;
			box-shadow: 0 0 10px rgb(0 0 0 / 25%);
			background: #fff;
			min-width: 250px;
			padding: 15px 0px;
			border-radius: 24px;
		}

		.cssmenu ul ul ul {
			margin-left: 100%;
			top: 0
		}

		.cssmenu ul ul li a {
			border-bottom: 1px solid rgba(150, 150, 150, 0.15);
			padding: 11px 15px;
			font-size: 16px;
			text-decoration: none;
			color: #000;
			font-weight: 500;
		}

		.cssmenu ul ul li:last-child>a,
		.cssmenu ul ul li.last-item>a {
			border-bottom: 0
		}

		.cssmenu ul ul li:hover>a,
		.cssmenu ul ul li a:hover {
			color: #43b97e;
			transition: .3s ease-in-out;
			font-size: 15px;
		}

		.cssmenu ul ul li.has-sub>a:after {
			position: absolute;
			top: 16px;
			right: 11px;
			width: 8px;
			height: 2px;
			display: block;
			background: #ddd;
			content: ''
		}

		.cssmenu ul ul li.has-sub>a:before {
			position: absolute;
			top: 13px;
			right: 14px;
			display: block;
			width: 2px;
			height: 8px;
			background: #ddd;
			content: '';
			-webkit-transition: all .25s ease;
			-ms-transition: all .25s ease;
			transition: all .25s ease
		}

		.cssmenu ul ul>li.has-sub:hover>a:before {
			top: 17px;
			height: 0
		}

		.cssmenu ul ul li.has-sub:hover,
		.cssmenu ul li.has-sub ul li.has-sub ul li:hover {
			background: #363636;
		}

		.cssmenu ul ul ul li.active a {
			border-left: 1px solid #333
		}

		.cssmenu>ul>li.has-sub>ul>li.active>a,
		.cssmenu>ul ul>li.has-sub>ul>li.active>a {
			border-top: 1px solid #333
		}

		.banner_section {
			background-image: linear-gradient(to top, #7af7cb, #fff);
			padding: 100px 0 85px;
			position: relative;
		}

		.banner_section .container {
			position: relative;
			z-index: 9;
		}



		.banner_section h1 {
			font-size: 56px;
			font-weight: 800;
			line-height: 68px;
			margin-bottom: 15px;
		}

		.banner_section h1 span {
			color: #08b07b;
		}

		.banner_section p {
			margin: 25px 0 35px;
		}

		.banner_form_con .p_text {
			margin: 0;
			font-size: 16px;
		}

		.r_btn.bg_y.cstm_btn {
			font-size: 22px;
			line-height: 28px;
		}

		.banner_section .banner_form {
			max-width: 480px;
			position: relative;
			z-index: 9;
			margin-right: 0;
			margin-left: auto;
			background: #141d25;
			color: #fff;
			padding: 22px 40px;
			border-radius: 35px;
		}

		.banner_form h3 {
			font-size: 24px;
			color: #fff;
			font-weight: 500;
			line-height: 30px;
			text-align: center;
			padding-bottom: 15px;
		}

		.banner_form textarea {
			resize: none;
			width: 100%;
			background: transparent;
			border: transparent;
			outline: none;
			color: #08b07b;
			line-height: 20px;
			height: 75px;
			font-size: 14px;
		}

		.banner_form textarea::placeholder {
			color: #08b07b;
		}

		.rating_sec {
			padding: 35px 0;
			background: #141d25;
		}

		.rating_sec .rating_box {
			max-width: 275px;
			margin: 0 auto;
			display: flex;
			align-items: center;
		}

		.rating_sec .rating_box img {
			margin-right: 12px;
		}

		.rating_sec .rating {
			color: #fff;
			font-size: 38px;
			font-weight: bold;
			display: block;
			line-height: 45px;
		}

		.rating_sec p {
			color: #fff;
			font-size: 14px;
			margin-bottom: 0;
		}


		.services_sec {
			padding: 60px 0 30px;
		}

		.services_sec p {
			margin-bottom: 25px;
		}

		.cstm_ser_box {
			text-align: center;
			box-shadow: 0 0 13px #00000038;
			border: 2px solid #08b07b;
			max-width: 90%;
			margin: 0 auto 40px;
			border-radius: 60px;
			padding: 50px 15px 40px;
			background: #fff;
		}

		.cstm_ser_box p,
		.testimonial_box p {
			font-size: 18px;
			line-height: 28px;
			text-align: justify;
		}

		.Wondering_sec .cstm_ser_box {
			display: flex;
			align-items: center;
			min-height: 128px;
		}

		.cstm_ser_box h4 {
			font-size: 30px;
			font-weight: bold;
			margin-top: 18px;
		}

		.cstm_ser_box h4 a {
			color: #000;
		}

		.cstm_ser_box:hover>h4 a {
			text-decoration: none;
			color: #fff;
		}

		.r_btn {
			background: #08b07b;
			display: inline-block;
			color: #fff !important;
			text-decoration: none !important;
			cursor: pointer;
			font-size: 17px;
			line-height: 22px;
			font-weight: bold;
			padding: 8px 32px 12px;
			text-decoration: none;
			border-radius: 50px;
			position: relative;
			border: none !important;
			outline: none !important;
		}

		.one_place .cstm_ser_box p a {
			color: #000 !important;
			padding: 0 5px;
			text-decoration: underline;
		}

		.hover_img {
			display: none;
		}

		.cstm_ser_box:hover,
		.cstm_ser_box.green {
			background: #08b07b;
			color: #fff;
		}

		.cstm_ser_box:hover>.hover_img {
			display: inline-block;
		}

		.cstm_ser_box:hover>.deflt_img {
			display: none;
		}

		.cstm_ser_box:hover>.r_btn {
			color: #08b07b !important;
			background: #fff;
		}

		body div .r_btn:hover,
		body .cstm_ser_box .r_btn:hover {
			background: #f8c316 !important;
			color: #000 !important;
			transition: .2s ease-in-out;
		}

		.help_www_sec {
			background: #d7f2ea;
			padding: 90px 0;
		}

		.help_www_sec .cont_box {
			max-width: 550px;
			margin: 0 auto;
		}

		.logIn {
			border-radius: 40px;
			padding: 15px 20px 17px !important;
		}

		.story_sec {
			padding: 70px 0;
		}

		.r_btn.bg_y {
			background: #f8c316;
			padding: 8px 45px 12px;
			color: #000 !important;
		}

		body .r_btn.bg_y:hover {
			background: #08b07b !important;
			color: #fff !important;
		}

		.benefit_sec {
			padding: 70px 0;
		}

		.benefit_sec .b_box_con span {
			color: transparent;
			font-size: 70px;
			line-height: 70px;
			font-weight: 600;
			-webkit-text-stroke: 1px #030A21;
			padding-right: 20px;
		}

		.f_contact a {
			color: #08b07b;
			font-size: 18px;
			margin-left: 20px;
			text-decoration: none;
			display: inline-block;
		}

		.f_contact a i {
			margin-right: 8px;
		}

		.benefit_sec .b_box_con p {
			margin-bottom: 5px;
			font-size: 17px;
			line-height: 28px;
			font-weight: 500;
			color: #000;
		}

		.benefit_sec .b_box_con {
			display: flex;
			margin-bottom: 45px;
			align-items: flex-start;
		}

		.benefit_sec .b_box_con h4 {
			font-size: 25px;
			font-weight: 700;
		}

		.justify_align p {
			text-align: justify;
		}

		.form_innBox {
			border: 1px solid #08b07b;
			margin-bottom: 30px;
			border-radius: 10px;
			padding: 10px 10px 0px 10px;
		}


		.testimonials_sec {
			background: #ededed;
			padding: 100px 0 90px;
		}

		.testimonial_box {
			padding: 25px 50px 60px;
			background: #fff;
			border-radius: 30px;
			position: relative;
			text-align: center;
		}

		.swiper-slide-active .testimonial_box {
			text-align: left;
		}

		.mySwiper .swiper-slide-active .testimonial_box {
			background: #f8c316;
		}

		.mySwiper .swiper-slide-active .testimonial_box .quote_img {
			padding-left: 20px;
			max-width: 70px;
		}

		.swiper {
			width: 100%;
			padding-top: 50px;
			padding-bottom: 100px;
		}

		.swiper-slide {
			width: 42%;

		}

		.swiper-3d .swiper-slide-shadow-right,
		.swiper-3d .swiper-slide-shadow-left {
			background-image: none !important;
		}

		.testimonial_box .user_img {
			width: 70px;
			margin: 0 auto;
			height: 70px;
			background: #141d25;
			border-radius: 100%;
		}

		.testimonial_box .user_img img {
			filter: grayscale(1);
		}

		.testimonial_box .quote_img {
			margin-bottom: 12px;
		}

		.testimonial_box p {
			text-align: center !important;
		}

		.testimonial_box .name {
			display: block;
			font-size: 17px;
			font-weight: 500;
			padding: 8px 0 4px;
		}

		.testimonial_box .pos {
			display: block;
			font-size: 14px;
		}

		.testimonial_box .user_det {
			position: absolute;
			bottom: -90px;
			text-align: center;
			left: calc(50% - 50px);
		}

		.faq_sec {
			background: #f8c316;
			padding: 70px 0;
		}

		.faq_sec .questions-con .btn.btn-link:after {
			content: "-";
			position: absolute;
			top: 15px;
			right: 15px;
			font-weight: 100;
			color: #08b07b;
			font-size: 50px;
			line-height: 0;
		}

		.questions-con .collapse.show,
		.card-header+div {
			background: #fff;
		}

		.questions-con .card-header {
			background: transparent;
			position: relative;
			padding: 0px;
		}

		.questions-con .card-header button {
			font-size: 20px;
			text-align: left;
			background: #fff !important;
			padding: 8px 35px 8px 15px;
			font-weight: bold;
			color: #08b07b;
			text-decoration: none;
			width: 100%;
			box-shadow: none;
			outline: none;
		}

		.questions-con .card-header button.collapsed {
			color: #000;
			background: transparent !important;
		}

		.faq_sec .questions-con .btn.btn-link.collapsed:after {
			content: "+";
			position: absolute;
			top: 20px;
			right: 15px;
			color: #000;
			font-size: 28px;
			line-height: 0;
			font-weight: 700;
		}

		.faq_sec .questions-con {
			overflow: hidden;
			background: transparent;
			margin-bottom: 25px;
			border: 3px solid #000;
			border-radius: 15px;
		}

		.collapse.show:parent {
			background: #fff;
		}


		.story_sec .story_box {
			overflow: hidden;
			display: -webkit-box;
			-webkit-line-clamp: 6;
			-webkit-box-orient: vertical;
			margin-bottom: 30px;
		}

		.story_sec .story_box.height {
			overflow: hidden;
			display: block;
			-webkit-line-clamp: initial;
			-webkit-box-orient: initial;
			margin-bottom: 30px;
		}

		.story_sec .content_box {
			border: 2px solid #08b07b;
			border-radius: 60px;
			padding: 50px 15px 40px;
		}

		.story_sec .read_less {
			display: none;
		}

		.story_box.height+.story_box_btn .read_more {
			display: none !important;
		}

		.story_box.height+.story_box_btn .read_less {
			display: inline-block;
		}


		form .fileinput-button {
			position: relative;
			overflow: hidden;
			display: inline-block;
			text-align: center;
			font-size: 11px;
			padding: 6px 10px;
			border: 2px dashed#08b07b;
			width: 100%;
			border-radius: 5px;
			margin-bottom: -12px;
		}

		form .form_fields+.form_fields {
			margin-bottom: -7px;
		}

		form .fileinput-button i {
			font-size: 22px;
			color: #08b07b;
		}

		form .fileinput-button input {
			position: absolute;
			top: 0;
			right: 0;
			left: 0;
			opacity: 0;
			cursor: pointer;
			bottom: 0;
		}

		form .thumb {
			height: 60px;
			width: 72px;
			border: 2px solid #08b07b;
			object-fit: cover;
			background: #ddd;
		}

		form ul.thumb-Images {
			margin: 0;
		}

		form ul.thumb-Images li {
			width: 72px;
			display: inline-block;
			vertical-align: top;
			height: 60px;
			margin-bottom: 3px;
		}

		form .img-wrap {
			position: relative;
			display: inline-block;
			margin-right: 3px;
		}

		form .img-wrap .close {
			position: absolute;
			top: 4px;
			right: 4px;
			z-index: 9;
			background-color: #fff;
			padding: 3px 2px 7px;
			color: #000;
			cursor: pointer;
			opacity: 1;
			font-size: 22px;
			line-height: 10px;
			border-radius: 50%;
			width: 20px;
			height: 20px;
		}

		form .FileNameCaptionStyle {
			display: none;
		}



		footer {
			background: #141d25;
			padding: 70px 0;
		}

		footer .foot_link_con ul {
			list-style: none;
		}

		footer .foot_link_con ul li a {
			font-size: 16px;
			text-decoration: none;
			color: #fff;
			display: inline-block;
			padding: 5px 0;
		}

		footer .foot_link_con li {}

		footer .left_links a {
			font-size: 17px;
			text-decoration: none;
			color: #fff;
			display: inline-block;
			margin-right: 15px;
		}

		footer .foot_link_con h4 {
			font-size: 24px;
			font-weight: 500;
			color: #08b07b;
		}

		footer .logo_sec {
			display: flex;
			align-items: center;
			justify-content: space-between;
			border-bottom: 1px solid #ddd;
			margin-bottom: 30px;
			padding-bottom: 30px;
		}

		footer .F_logo_con {
			background: #ededed;
			border-radius: 15px;
			display: inline-block;
			padding: 8px;
		}

		footer .social_links a {
			display: inline-block;
			background: #08b07b;
			color: #fff;
			margin-left: 15px;
			width: 30px;
			text-align: center;
			border-radius: 30px;
			height: 30px;
		}

		.insta:hover {
			background-image: linear-gradient(72.44deg, #FF7A00 11.92%, #FF0169 51.56%, #D300C5 85.69%);
		}

		.fb:hover {
			background: #3c58a0;
		}

		.twitter:hover {
			background: #4596ef;
		}

		.youtube:hover {
			background: #ea1e26;
		}

		footer .social_links i {
			vertical-align: middle;
		}

		footer .desclaim_con {
			padding: 20px 0 15px;
			margin-top: 35px;
			border-top: 1px solid #ddd;
			border-bottom: 1px solid #ddd;
			color: #fff;
		}

		footer .desclaim_con b {
			color: #08b07b;
		}

		footer .desclaim_con p {
			font-size: 16px;
		}

		footer .copyR_cot {
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding-top: 20px;
		}

		footer .copyR_cot p {
			font-size: 16px;
			color: #fff;
			margin-bottom: 0;
		}

		#Filelist {
			padding-top: 10px;
		}

		.swiper-button-next,
		.swiper-button-prev {
			background: #08b07b6b;
			min-width: 36px;
			right: 0;
			top: calc(50% - 44px);
		}

		.swiper-button-prev,
		.swiper-rtl .swiper-button-next {
			left: 0;
			x
		}

		.swiper-button-next:after,
		.swiper-button-prev:after {
			font-size: 23px !important;
			font-weight: bold;
			color: #fff;
		}

		.swiper-button-next:hover,
		.swiper-button-prev:hover {
			background: #08b07b;
		}

		.fileinput-button.fileAtached {
			width: 75px;
			padding: 13px 10px;
		}

		.fileinput-button.fileAtached span>span,
		.fileinput-button.fileAtached span>br {
			display: none;
		}

		.fileinput-button.fileAtached+#Filelist {
			padding: 0;
			display: inline-block;
			width: 100%;
		}

		.fileinput-button.fileAtached+#Filelist ul li {
			margin-bottom: 55px;
			margin-top: -52px;
		}

		.fileinput-button.fileAtached+#Filelist ul li:first-child {
			margin-left: 82px;
		}

		.fileinput-button.fileAtached+#Filelist ul li:last-child {
			margin-bottom: 6px !important;
		}

		#Filelist ul li:nth-child(1),
		#Filelist ul li:nth-child(2),
		#Filelist ul li:nth-child(3),
		#Filelist ul li:nth-child(4) {
			margin-bottom: 5px !important;
		}

		#Filelist ul li:nth-child(5),
		#Filelist ul li:nth-child(6),
		#Filelist ul li:nth-child(7),
		#Filelist ul li:nth-child(8),
		#Filelist ul li:nth-child(9),
		#Filelist ul li:nth-child(10) {
			margin: -10px 0 15px !important;
		}

		footer ul li a:hover {
			color: #08b07b !important;
		}

		.cstm_ser_box p a {
			color: #08b07b !important;
		}

		.cstm_ser_box:hover>p a {
			color: #f8c316 !important;
		}

		.check_sec .cstm_ser_box {
			position: relative;
			padding: 20px 35px 20px 55px;
			border-radius: 20px;
			min-height: 144px;
		}

		.check_sec .cstm_ser_box p {
			margin-bottom: 0;
		}

		.check_sec .cstm_ser_box .left_icon {
			position: absolute;
			left: 0;
			top: calc(50% - 30px);
			width: 60px;
			height: 60px;
			background: #fff;
			border: 2px solid #009966;
			transform: translatex(-50%);
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 100px;
		}

		.check_sec .cstm_ser_box .left_icon i {
			font-size: 30px;
			color: #fff;
		}

		.check_sec .cstm_ser_box:hover .left_icon {
			background: #ffcc00;
			transition: ease-in-out .2s;
			border-color: #ffcc00;
		}

		.check_sec .cstm_ser_box:hover .left_icon i {
			color: #08b07b;
			transition: ease-in-out .2s;
		}

		.service .banner_section {
			padding: 100px 0 85px;
			position: relative;
			background: url(../images/homeworkHelp_img.png);
			background-repeat: no-repeat;
			background-size: 330px;
			background-position: center bottom;
		}


		.service .banner_section:after {
			content: "";
			position: absolute;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 100%;
			background-image: linear-gradient(to top, #7af7cbbf, #ffffffa8);
		}

		.sub_sec,
		.ser_sec {
			padding: 60px 0 30px;
		}

		.sub_sec .cstm_ser_box {
			background: #d6efe6;
			border: none;
		}

		.sub_sec .cstm_ser_box:hover,
		.ser_sec .cstm_ser_box:hover {
			background: #08b07b;
		}

		.sub_sec .cstm_ser_box h4 {
			margin: 0 0 8px;
			text-align: left;
		}

		.ser_sec .cstm_ser_box {
			padding: 18px 30px;
			text-align: left;
			border-radius: 20px;
			background: #d2f1e7;
			border: none;
		}

		.ser_sec .cstm_ser_box h4,
		.ser_sec .cstm_ser_box p {
			margin: 0;
		}

		.one_place {
			height: 1065px;
			overflow: hidden;
		}

		.one_place.height {
			height: auto;
		}

		.trust_con {
			display: flex;
			justify-content: flex-start;
		}

		.trust_con .trust_box {
			display: flex;
			align-items: center;
			background: #fff;
			padding: 4px 8px 6px;
			border-radius: 10px;
			margin-right: 15px;
		}

		.trust_con .trust_box>div+div {
			margin-left: 6px;
		}

		.trust_head {
			margin: 25px 0 10px !important;
			font-size: 20px;
			font-weight: 500;
		}

		.trust_con .trust_box p {
			font-size: 12px !important;
			margin: 0 !important;
			line-height: 14px;
			font-weight: 500;
		}

		.trust_con .trust_box>div+div span {
			font-size: 17px;
			font-weight: 600;
			line-height: 18px;
		}

		.trust_con .trust_box .rating_stars i {
			color: #fd8c04;
			font-size: 10px;
			vertical-align: middle;
		}

		.trust_con .rating_stars {
			text-align: center;
			display: inline-block;
			min-width: 75px;
		}

		.check_box {
			position: absolute;
			left: 0;
			cursor: pointer;
			top: calc(50% - 30px);
			width: 60px;
			height: 60px;
			background: #fff;
			border: 2px solid #009966;
			transform: translatex(-50%);
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 100px;
		}

		.check_box.checked .fa-check {
			opacity: 1;
			color: #08b07b !important;
		}

		.check_box .fa-check {
			opacity: 0;
		}

		.check_box.checked {
			background: #ffcc00 !important;
			border-color: #ffcc00 !important;
		}

		.check_sec .cstm_ser_box:hover .left_icon.check_box {
			background: #fff;
			border: 2px solid #009966;
		}

		.story_box h4 {
			font-size: 22px;
			font-weight: bold;
		}

		.topic_sec .topic_inner .cstm_ser_box {
			padding: 18px 20px 24px;
			text-align: left;
			width: calc(20% - 20px);
			margin: 0 10px 35px;
		}

		.topic_sec .topic_inner .cstm_ser_box h4 {
			text-align: center;
			margin: 0 !important;
			font-size: 18px;
		}

		.topic_sec .topic_inner {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.topic_sec {
			padding: 60px 0;
		}

		.openPopup {
			background: #08b07bd9;
			padding: 0 !important;
			z-index: 9999999999;
		}

		.customPopWidth {
			max-width: 500px !important;
			width: 100%;
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			margin: 0 auto;
		}

		.openPopup .modal-content {
			border-radius: 12px;
			background-image: url(<?php echo base_url();?>assets/front/image/popup-bg.jpg);
			background-position: center bottom;
			background-size: cover;
			display: flex;
			align-items: center;
			justify-content: center;
			background-repeat: no-repeat;
			padding: 165px 0 38px 0;
		}

		.resetPassword p {
			font-size: 15px;
			line-height: 27px;
			text-align: center;
		}

		.loginFormBox {
			margin-top: 6px;
			margin-bottom: 6px;
		}

		.formSpacing {
			margin-top: 58px;
			margin-bottom: 58px;
		}

		.resetPassword,
		.login_form {
			display: none;
		}

		.popupHead {
			font-size: 24px;
			line-height: 33px;
			text-align: center;
		}

		.iti--separate-dial-code .iti__selected-dial-code {
			color: #08b07b;
			font-size: 14px;
		}

		.fields_con .iti__arrow {
			border-left: 3px solid transparent;
			border-right: 3px solid transparent;
			border-bottom-color: #08b07b;
			border-top-color: #08b07b;
		}

		.EditTableModal input::-webkit-input-placeholder {
			color: #08b07b9e;
			font-size: 13px;
		}

		.EditTableModal input:-ms-input-placeholder {
			color: #08b07b9e;
			font-size: 13px;
		}

		.EditTableModal input::placeholder {
			color: #08b07b9e;
			font-size: 13px;
		}

		.EditTableModal .fields_con .phone {
			padding-left: 76px;
			background: transparent;
			color: #08b07b;
			border: none;
			border-bottom: 2px solid #08b07b;
			width: 100%;
			padding-bottom: 10px;
			padding-top: 10px;
		}

		.EditTableModal .fields_con>.iti {
			width: 100%;
		}

		.has-float-label {
			display: block;
			position: relative;
			margin-bottom: 16px;
		}

		.EditTableModal .show_password_icon {
			position: absolute;
			color: #08b07b;
			right: 20px;
			bottom: 15px;
			cursor: pointer;
		}

		.EditTableModal .has-float-label input:hover:not(:disabled):not(:focus) {
			border-bottom: 2px solid #08b07b !important;
		}

		.EditTableModal .has-float-label input:focus {
			border-bottom: 2px solid #08b07b;
			transition: all .2s;
		}

		.EditTableModal .has-float-label input:placeholder:not(:focus) {
			border-bottom: 2px solid #08b07b;
		}

		.EditTableModal .has-float-label input {
			font-size: 16px;
			padding: 22px 0 10px 0;
			border: 0;
			border-radius: 0;
			box-shadow: none;
			background-color: initial;
			color: #08b07b;
			caret-color: #08b07b;
			border-bottom: 2px solid #08b07b;
			width: 100%;
		}

		input {
			outline: none;
		}

		.EditTableModal .has-float-label input:visited+.label,
		.has-float-label input:focus+.label,
		.has-float-label input:focus-within+.label {
			top: 2px;
		}

		.EditTableModal .has-float-label label,
		.has-float-label>.label {
			position: absolute;
			left: 0;
			top: 7px;
			cursor: text;
			font-size: 12px;
			color: #08b07b;
			transition: all .2s;
			pointer-events: none;
		}

		.fields_con {
			margin-bottom: 25px;
		}

		.EditTableModal .fg_pass {
			text-decoration: none !important;
			color: #000 !important;
			font-size: 13px;
			display: inline-block;
			padding-top: 5px;
		}

		.fields_con .newUserTxt {
			font-size: 15px;
			color: #000;
			margin: 20px 0 0;
			padding-bottom: 0 !important;
		}

		.EditTableModal .newUserTxt a {
			text-decoration: none !important;
			color: #08b07b !important;
		}

		#iti-0__item-in {
			display: none !important;
		}

		.form_box {
			max-width: 300px;
			background: #fff;
			padding: 20px;
			margin-left: calc(50% - 230px);
			border-radius: 20px;
			f
		}

		.EditTableModal .modal-header {
			position: absolute;
			right: 0px;
			padding: 0;
			top: 0px;
		}

		.EditTableModal .close {
			margin: 0;
			font-weight: 800;
			padding: 8px;
		}

		.iti--separate-dial-code .iti__selected-flag {
			background-color: transparent;
		}






		@media screen and (min-width:1001px) {
			.cssmenu>ul {
				margin-right: -3px;
			}
		}

		@media screen and (max-width:1300px) {
			.topic_sec .topic_inner .cstm_ser_box h4 {
				font-size: 16px;
			}
		}

		@media screen and (max-width:1130px) {

			.cssmenu>ul>li>a,
			.btn_con a {
				font-size: 12px;
			}
		}

		@media screen and (max-width:1000px) {
			body.menu_open {
				position: relative;
			}

			.cssmenu li:hover>ul {
				box-shadow: none;
				border-top: 1px solid #ddd;
			}

			body.menu_open:after {
				content: "";
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: #000000ad;
				z-index: 9999;
			}

			header .container {
				padding: 0;
			}

			.logo {
				margin-left: 15px;
				padding-top: 20px;
			}

			nav {
				width: 100%;
			}

			.cssmenu {
				width: 100%
			}

			.cssmenu ul {
				width: 100%;
				display: none
			}

			.cssmenu ul li {
				width: 100%;
				border-bottom: 1px solid #ddd;
			}

			.cssmenu ul li a,
			.cssmenu ul ul li a {
				width: 100%;
				border-bottom: 0
			}

			.cssmenu>ul>li {
				float: none
			}

			.cssmenu ul ul li a {
				padding-left: 25px
			}

			.cssmenu ul ul li:hover {
				background: #363636 !important
			}

			.cssmenu ul ul ul li a {
				padding-left: 35px
			}

			.cssmenu ul ul li:hover>a,
			.cssmenu ul ul li.active>a {
				color: #fff
			}

			.cssmenu ul ul,
			.cssmenu ul ul ul {
				position: relative;
				left: 0;
				width: 100%;
				margin: 0;
				text-align: left
			}

			.cssmenu>ul>li.has-sub>a:after,
			.cssmenu>ul>li.has-sub>a:before,
			.cssmenu ul ul>li.has-sub>a:after,
			.cssmenu ul ul>li.has-sub>a:before {
				display: none
			}

			.button {
				width: 55px;
				height: 46px;
				position: absolute;
				right: 0;
				top: 20px;
				cursor: pointer;
				z-index: 9999999999;
			}

			.cssmenu ul ul li:last-child {
				border-bottom: 0;
			}

			.button:after {
				position: absolute;
				top: 22px;
				right: 20px;
				display: block;
				height: 8px;
				width: 20px;
				border-top: 2px solid #000;
				border-bottom: 2px solid #000;
				content: ''
			}

			.button:before {
				-webkit-transition: all .3s ease;
				-ms-transition: all .3s ease;
				transition: all .3s ease;
				position: absolute;
				top: 16px;
				right: 20px;
				display: block;
				height: 2px;
				width: 20px;
				background: #000;
				content: ''
			}

			.button.menu-opened:after {
				-webkit-transition: all .3s ease;
				-ms-transition: all .3s ease;
				transition: all .3s ease;
				top: 23px;
				border: 0;
				height: 2px;
				width: 19px;
				background: #000;
				-webkit-transform: rotate(45deg);
				-moz-transform: rotate(45deg);
				-ms-transform: rotate(45deg);
				-o-transform: rotate(45deg);
				transform: rotate(45deg)
			}

			.button.menu-opened:before {
				top: 23px;
				background: #000;
				width: 19px;
				-webkit-transform: rotate(-45deg);
				-moz-transform: rotate(-45deg);
				-ms-transform: rotate(-45deg);
				-o-transform: rotate(-45deg);
				transform: rotate(-45deg)
			}

			.cssmenu .submenu-button {
				position: absolute;
				z-index: 99;
				right: 0;
				top: 0;
				display: block;
				border-left: 1px solid #ddd;
				height: 46px;
				width: 46px;
				cursor: pointer
			}

			.cssmenu ul ul .submenu-button {
				height: 34px;
				width: 34px
			}

			.cssmenu .submenu-button:after {
				position: absolute;
				top: 22px;
				right: 19px;
				width: 8px;
				height: 2px;
				display: block;
				background: #000;
				content: ''
			}

			.cssmenu ul ul .submenu-button:after {
				top: 15px;
				right: 13px
			}

			.cssmenu .submenu-button:before {
				position: absolute;
				top: 19px;
				right: 22px;
				display: block;
				width: 2px;
				height: 8px;
				background: #000;
				content: ''
			}

			.cssmenu ul ul .submenu-button:before {
				top: 12px;
				right: 16px
			}

			.cssmenu .submenu-button.submenu-opened:before {
				display: none
			}

			.cssmenu ul ul ul li.active a {
				border-left: none
			}

			.cssmenu>ul>li.has-sub>ul>li.active>a,
			.cssmenu>ul ul>li.has-sub>ul>li.active>a {
				border-top: none
			}

			.button.menu-opened+ul {
				display: block !important;
				background: #fff;
				text-align: left;
				position: absolute;
				right: 0;
				width: 100%;
				max-height: 100vh;
				overflow-y: scroll;
				padding-top: 30px;
				z-index: 99999999;
			}

			.has-sub .open {
				display: block !important;
			}

			.cssmenu>ul>li>a,
			.btn_con a {
				font-size: 15px;
			}

			.btn_con {
				max-width: 205px;
				margin: 12px;
			}
		}

		@media only screen and (max-width: 1024px) {
			.topic_sec .topic_inner .cstm_ser_box {
				width: calc(33.3% - 20px);
			}
		}


		@media only screen and (max-width: 992px) {
			.rating_sec .rating_box {
				margin: 15px auto;
			}

			.banner_section .banner_form {
				margin: 0 auto;
			}

			.banner_section {
				padding: 50px 0;
				background-size: contain;
				background-position: center;
			}

			form .img-wrap .close {
				padding: 2px 1px 7px;
				font-size: 14px;
				line-height: 4px;
				width: 13px;
				height: 13px;
			}
		}

		@media only screen and (min-width: 768px) {
			.LearningSolution .cstm_ser_box {
				min-height: 440px;
			}

			.whyTutorChamps .cstm_ser_box {
				min-height: 352px;
			}

			.howItWorks .cstm_ser_box {
				min-height: 474px;
			}

		}

		@media only screen and (max-width: 767px) {
			.topic_sec .topic_inner .cstm_ser_box {
				width: calc(100% - 20px);
				margin-bottom: 20px;
			}

			.trust_con .rating_stars {
				min-width: auto;
			}

			.banner_section p br {
				display: none;
			}

			.benefit_sec .b_box_con p {
				font-size: 16px !important;
				line-height: 24px;
			}

			.rating_sec {
				padding: 12px;
			}

			.benefit_sec .b_box_con h4 {
				font-size: 19px;
			}

			.testimonial_box p,
			.services_sec p,
			p.fs_23 {
				font-size: 17px;
			}

			.testimonial_box {
				padding: 25px 20px 60px;
			}

			.cstm_ser_box {
				max-width: 100%;
			}

			.banner_section .banner_form {
				margin-top: 30px;
				background: #141d25f7;
				padding: 22px 20px;
			}

			h3 {
				font-size: 30px;
				line-height: 45px;
			}

			.container {
				padding: 0 12px;
			}

			header {
				margin-top: -24px;
			}

			.banner_section h1 {
				font-size: 36px;
				line-height: 45px;
			}

			.banner_section p {
				margin: 15px 0 30px;
			}

			.cstm_btn {
				font-size: 18px;
				line-height: 24px;
			}

			footer .logo_sec {
				display: block;
			}

			footer .F_logo_con {
				margin-bottom: 15px;
			}

			footer .foot_link_con h4 {
				margin-top: 15px;
			}

			footer .copyR_cot {
				display: block;
				text-align: center;
			}

			footer .copyR_cot p {
				padding-top: 15px;
			}

			.swiper-slide {
				width: 85%;
			}

			.benefit_sec .b_box_con i {
				font-size: 30px;
				vertical-align: middle;
			}

			.benefit_sec .b_box_con span {
				padding-left: 10px;
			}

			.benefit_sec .b_box_con {
				padding: 15px 0;
				margin: 20px auto;
			}

			.rating_sec .rating {
				font-size: 26px;
				line-height: 30px;
			}

			.rating_sec p {
				font-size: 10px !important;
				line-height: 20px;
			}

			.rating_sec .rating_box img {
				max-width: 34px;
				margin-right: 6px;
			}

			.help_www_sec .img_box {
				margin-top: 35px;
			}

			body p {
				font-size: 16px !important;
			}

			.check_sec .cstm_ser_box {
				max-width: 90%;
				margin: 0 8px 40px auto;
			}

			.sub_sec .cstm_ser_box h4 {
				font-size: 26px !important;
			}

			.sub_sec .cstm_ser_box p {
				font-size: 14px !important;
				text-align: left;
			}

			.mBoxShadow {
				box-shadow: 0 -40px 10px #ebebebe6;
				margin-top: 25px;
			}
		}

		@media screen and (max-width: 510px) {
			.openPopup .modal-content {
				padding: 160px 0 25px 20px;
			}

			.form_box {
				margin: 0;
				padding: 10px 15px;
				max-width: 268px;
			}

			.fields_con .newUserTxt {
				margin-top: 5px;
			}

			.popupHead {
				font-size: 22px;
				line-height: 26px;
			}

			.fields_con {
				margin-bottom: 22px;
			}

			.form_box.formSpacing {
				margin-top: 33px;
				margin-bottom: 33px;
			}

			@media screen and (max-width:455px) {
				form #Filelist ul li:nth-child(4) {
					margin: -10px 0 15px !important;
				}
			}

			@media screen and (max-width:383px) {
				form #Filelist ul li:nth-child(3) {
					margin: -10px 0 15px !important;
				}
			}
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