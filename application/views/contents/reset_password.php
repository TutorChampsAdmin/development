
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - TutorChamps.com </title>
    <meta name="description" content="Login to get all your assignments/homework solved instantly from subject expert tutors." />
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://tutorchamps.com/login/" />
    <link rel="shortcut icon" href="..<?php echo base_url();?>assets/front/images/favicon.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="<?php echo base_url();?>assets/front/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/front/css/style.css" rel="stylesheet">
    <style>
        *{
            margin: 0%;
            padding: 0%;
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
        .err_msz_con{position: relative;}
        .left_con li{margin-bottom: 10px;padding-left: 25px;}
        .left_con h2{font-size: 32px;}
        .left_con{padding-right: 10px;position: relative;}
        .left_con li i{position: absolute;
            left: 0;}
        .py70{padding: 70px 0;}
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
.loginF{max-width: 470px;
width: 100%;
box-shadow: 1px 1px 15px #e0e0e0;
margin: 0 auto; padding: 30px 26px 60px;
border-radius: 15px;
position: relative;}
.epError {
font-size: 14px;
left: 0;
width: 100%;
text-align: center;
color: red;
position: relative;
top: -40px;
margin: 0;
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
a.continue_btn{display: flex;
font-size: 14px;
line-height: 30px;
color: #000;
padding: 3px 8px 4px 4px;
font-weight: 600;
overflow: hidden;
border: 1px solid #ddd;
border-radius: 83px;
align-items: center;
max-width: 215px;}
.btn_con{display: flex;justify-content: space-between;}
.btn_con img{max-width: 26px; margin-right: 4px;}
.continue_with_fb{background: #3b5999;
color: #fff!important; padding: 5px 8px 5px 8px!important;}
.continue_with_fb span{margin-left: 4px;}
.line_{text-align: center;
border-bottom: 1px solid #ddd;
margin-bottom: 25px;}
.line_ > div{line-height: 0;
display: block;
max-width: 37px;
margin: -10px auto;
background: #fff;
height: 9px;}
.err_msz{    font-size: 13px;
color: red;
text-align: center;
text-transform: capitalize;
margin: -35px 0 40px 0;}
.loginField img {
    filter: grayscale(1);
}
@media screen and (max-width:992px) {
    .account_sec > div.d-flex{display: block!important;}
    .account_sec .pattern-layer-seven{display: none;}
}
@media screen and (max-width: 767px){   
    .btn_con{display: block;}
    a.continue_btn{margin: 15px auto;}
    .loginF{margin-top: 30px;}
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
form h5{font-size: 26px;}
form h5 + p{    line-height: 24px;
    margin-bottom: 33px;}

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
<div id="loading"></div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVND638"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="page-wrapper">
    <header class="">
        <div class="container">
            <a href="<?php echo base_url();?>" title=""><img src="<?php echo base_url();?>assets/front/images/logo.png" alt="" title=""></a>
        </div>
    </header>

    <section class="account_sec mt-5 bg-white py70 main-footer">
        <div class="container d-flex">
          
            <form action="<?php echo base_url('password-reset-confirm/');?>" method="POST" id="reset_form" class="commForm login_form loginF">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                <div class="text-center text-dark mb-2">
                    <h5>Reset Your Password</h5>
                </div>
               <div class="form-group loginField login">
                    <img src="<?php echo base_url();?>assets/front/images/password_Img.svg" alt="password">
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password"
                    id="password">
                    <i onclick="changeInputType('password')" class="show_password_icon fa fa-eye"></i>
                </div>
                <div class="form-group loginField login">
                    <img src="<?php echo base_url();?>assets/front/images/password_Img.svg" alt="password">
                    <input class="form-control" type="password" name="re_password" id="re_password" placeholder="Password"
                    id="password">
                    <i onclick="changeInputType('re_password')" class="show_password_icon fa fa-eye"></i>
                </div>
                <div class="text-center psr mt-3 pb-5">
                    <input type="hidden" name="token" value="<?php echo str_replace('/','',$this->input->get('token'));?>">
                    <input type="hidden" name="uid" value="<?php echo $this->input->get('uid');?>">
                    <input type="button" onclick="checkForm()" class="formBtn theme-btn btn-style-one" value="Submit" style="opacity: 1;position: inherit">
                </div>
                <div class="err_msz_con"><p class="epError"></p></div>

</form>
</div> 
<div class="pattern-layer-seven" style="background-image: url('<?php echo base_url();?>assets/front/images/main-slider/pattern-5.png')"></div>               
<div class="circle-layer"></div>
</section>  

</div>


    <script src="<?php echo base_url();?>assets/front/js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        function changeInputType(id) {
            $(".show_password_icon").toggleClass("fa-eye-slash");
            var x = document.getElementById(id);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function checkForm(){
            var error = false;
            if($.trim($('#password')) == ''){
                alert('Please enter your password.');
                error = true;
                return false;
            }else{
                if($.trim($('#re_password')) != $.trim($('#re_password'))){
                    alert('Password no matched.');
                    error = true;
                    return false;
                }
            }
            if(error){
                return false;
            }else{
                var form = $('#reset_form')[0];
                var form_data = new FormData(form);
                form_data.append("change",'change')
                var actionurl = $("#reset_form").attr("action");
                $.ajax({
                    type:"POST",
                    url:actionurl,
                    data:form_data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        var response = JSON.parse(data);
                        if(response.status=="success"){
                            $("#h").css("color","green");
                            $("#h").text("Password changed successfuly.");
                            $(".epError").css("color","green");
                            $(".epError").text(response.message);
                        }else{
                            $(".epError").css("color","red");
                            $(".epError").text(response.message);
                        }
                    }

                })
                .done(function(){
                    console.log("done")
                })
                .fail(function(){
                    console.log("fail")
                })
            }

            

        }
    </script>
</body>
</html>