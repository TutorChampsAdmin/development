<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Thank you - TutorChamps.com</title>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url();?>assets/front/images/fav.png" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    .thead td {
        width: 25%;
        border-right: 1px solid #fff;
    }

    tr td {
        text-align: center;
        border:none;
        margin: 0;
        padding: 9px 0;
    }
.thankYou{
	text-align: center;
    display: flex;
    color: #000;
    font-family: 'Noto Sans TC', sans-serif;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: calc(70vh - 150px)}
.thankYou h1{
	font-size: 45px;
    text-align: center;
    margin: 0px;
    padding: 15px 0 0 0;
    font-family: 'Noto Sans TC', sans-serif;
    font-weight: 600;
}
.thankYou p{font-size: 17px;
    padding: 5px;
    margin-top: 0px;
    color: #06092d;
}
.thankYou h3{    font-size: 30px;
    text-align: center;
    padding: 10px;
    margin: 0px
}
.thankYou h3+p{color: #06092d; font-size: 16px;}
a:hover{color: #EE698C;}
a{color: #43b97e;}
.thankYouCounter{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            position: relative;
            height: 100px;
        }
        .fitstrip{position: absolute;bottom: 0; left: 0; width: 100%; height: 70px;background-color: #47bf7f;}
        .thankYouCounter span{
            display: inline-block;
    font-size: 45px;
    padding: 20px;
    width: 85px;
    box-sizing: border-box;
    height: 85px;
    line-height: 40px;
    text-align: center;
    border-radius: 100%;
    background: #47bf7f;
    color: #ffffff;
    font-weight: 500;
            
        }
        .thankYouCounter span:after{
        	width: 100%;
		    content: "0";
		    position: absolute;
		    animation-name: contentChang;
		    animation-duration: 6s;
		    left: 0;
    	}
        @keyframes contentChang {
          0%{
            content: "5";
          }
          20% {
            content: "4";
          }
          40% {
            content: "3";
          }
          60% {
            content: "2";
          }
          80% {
            content: "1";
          }
          100% {
            content: "0";
          }
        }
.pattern-layer-seven{top: auto!important;bottom: 50px!important;z-index: 0!important;}
.news-section .icon-layer-two{    right: auto;
    bottom: 60px;
    top: auto;
    left: 34px;}
    header{    background: #fbfbfb;
    display: inline-block;}
    .table{max-width: 700px; width: 100%; margin: 15px auto}

@media only screen and (max-width:767px){
  .thankYou h1{font-size: 26px!important;}
}
</style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NVND638');</script>
    <!-- End Google Tag Manager -->
</head>

<body class="hidden-bar-wrapper">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVND638"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
	<header class="main-header">
            <div class="header-upper">
                <div class="auto-container clearfix">
                    <div class="pull-left logo-box">
                        <div class="logo"><a href="/tutor/"><img src="<?php echo base_url();?>assets/front/images/logo.png" alt="" title=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

	<div class="page-wrapper news-section">
		<section id="counter-stats" style="display: inline-block; width: 100%;">
			<div class="pattern-layer-seven" style="background-image: url('<?php echo base_url();?>assets/front/images/main-slider/pattern-5.png')"></div>
			<div class="icon-layer-two" style="background-image:url('<?php echo base_url();?>assets/front/images/icons/icon-2.png')"></div>
			<div class="auto-container">  
				<div class="row">
                    <div class="col-12">
                        
                        <div class="thankYou">
                            
							<h1>Thanks for choosing to be a Tutorchamp</h1>
							<p>We have shared an email with you with information about the screening test. Please check your email inbox If it is not found in inbox please check spam folder. You are just one step away from earning a great payout.</p>
                            <a href="<?php echo base_url();?>tutor/" style="position: relative; z-index: 999; text-decoration: none; display: block; text-align: center;">Go To Home Page</a>
						</div>
                        
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="fitstrip"></div>
<script src="<?php echo base_url();?>assets/front/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/front/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/front/js/bootstrap.min.js"></script>
</body>
</html>