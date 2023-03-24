<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tutor Details - Become A Tutor @TutorChamps.com</title>
        <link href="<?php echo base_url();?>assets/front/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/front/css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/front/images/favicon.png" type="image/x-icon">
    <style>
    form h3 + p{padding-bottom: 5px;  text-align: center;
    line-height: 24px;}
    .left_con li{margin-bottom: 10px;padding-left: 25px;}
    .left_con h2{font-size: 32px;}
    .left_con{padding-right: 10px;position: relative;}
    .left_con li i{position: absolute;
    left: 0;}
    .py100{padding: 75px 0;}
    .loginF .form-control{box-sizing: border-box;}
    header{padding: 12px; background: #fbfbfb;    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999;}
        body{height: 100vh;
    }
    form{background: #fff;    width: 100%;
    max-width: 500px;}
    .userImg{    max-width: 120px;
    background: #e8f0fe;
    border-radius: 100%;
    padding: 5px;
    margin-bottom: 35px;}
    .loginF{max-width: 750px;
    width: 100%;
    box-shadow: 1px 1px 15px #e0e0e0;
    margin: 0 auto; padding: 30px 26px 20px;
    border-radius: 15px;
    position: relative;}
    .epError {
        bottom: 0px;
        top: auto;
        font-size: 16px;
        left: 0;
        width: 100%;
        text-align: center;
        color: red;
        position: relative;
        top: 160px
    }
    .logo{
        text-align: center;
        position: absolute;
        top: -70px;
        width: 100%;
        left: 0;}
        .loginT p{font-size: 14px;
    text-align: center;
    margin-bottom: 35px;}
    .bgsignup ul li{margin-bottom: 10px;}
    
    .err_msz{    font-size: 13px;
    color: red;
    text-align: center;
    text-transform: capitalize;
    margin: -35px 0 40px 0;}
    .loginField img {
        filter: grayscale(1);
    }
    .commForm .pos_rel .input{height: 37px;}
    @media screen and (max-width:992px) {
        .account_sec > div.d-flex{display: block!important;}
        .account_sec .pattern-layer-seven{display: none;}
    }
    @media screen and (max-width: 767px){   
        .login_form .btn_con{display: block!important;}
        a.continue_btn{margin: 15px auto;}
        .loginF{margin-top: 30px;}
        .loginF{padding: 30px 10px 20px!important;}
    }
    #alr{
        position: relative;
    top: -16px;
    right: 26px;
    }
    #anch{
        position: relative;
        top: -60px;
        left: 104px;
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
    <body>
       <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVND638"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) --> 
        <div class="page-wrapper">
        <header class="">
            <div class="container">
                <a href="/" title=""><img src="<?php echo base_url();?>assets/front/images/logo.png" alt="" title=""></a>
            </div>
        </header>

        <section class="account_sec mt-5 bg-white py100 main-footer">
            <div class="container d-flex align-items-center">
                <form class="commForm login_form loginF" method="POST" action="<?php echo base_url()?>tutor/tutor_detail/" enctype="multipart/form-data" >
                <div class="first_step">
                    <h3 class="text-dark text-center">Enter Required Details Here</h3>
                    <p>Please submit the required details and go to your working dashboard now!</p>
                    <div class="form_group">
                        <div class="pos_rel">

                            <label>Phone Number</label>
                            <input required name="phone" type="Number" placeholder="Phone Number" maxlength="10" class="input" maxlength="10">
                        </div>
                        <div class="pos_rel">
                            <label>Your State</label>
                            <input required maxlength="50" name="state" type="text" class="input" placeholder="Select State">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="pos_rel">
                            <label>Your City</label>
                            <input required maxlength="60" name="city" type="text" class="input" placeholder="Select State">
                        </div>
                        <div class="pos_rel">
                            <label>Enter Pin Code</label>
                            <input required name="pin" type="Number" maxlength="6" class="input" placeholder="Enter Pin Code">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="pos_rel">
                            <label>Degree</label>
                            <input required name="degree" maxlength="100" type="text" class="input" placeholder="Degree">
                        </div>
                        <div class="pos_rel">
                            <label>Branch/Subject</label>
                            <input required maxlength="100" name="branch" type="text" class="input" placeholder="Branch">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="pos_rel">
                            <label>College</label>
                            <input required maxlength="200" name="college" type="text" class="input" placeholder="College">
                        </div>
                        <div class="pos_rel">
                            <label>Degree Certificate/College ID</label>
                            <input required name="college_id" type="file" class="input" placeholder="College ID">
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <input type="hidden" name="tutor_detail" id="tutor_detail" value="1">
                        <input type="submit" name="" id="" class="theme-btn btn-style-one" value="Submit">
                    </div>
                </div>
            </form>
        </div> 
    <div class="pattern-layer-seven" style="background-image: url('<?php echo base_url();?>assets/front/images/main-slider/pattern-5.png')"></div>               
    <div class="circle-layer"></div>
        </section>  
    </div>

    </body>
</html>