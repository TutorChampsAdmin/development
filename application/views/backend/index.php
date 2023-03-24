
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator</title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/front/images/favicon.png');?>">
        <link rel="apple-touch-icon" href="<?php echo base_url('assets/front/images/favicon.png');?>">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <link href="<?php echo base_url('assets/backend/css/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/backend/css/font-awesome.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/backend/css/nprogress.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/backend/css/animate.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/backend/css/set2.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/backend/css/style.css');?>" rel="stylesheet">
        <style>
            .err{text-align:left;display:none;color:#d40d0d;float:left;margin:0 !important; }
            .clear{
                clear:both;
            }
            .field-icon {
              float: right;
              margin-right: 5px;
              margin-top: -25px;
              position: relative;
              z-index: 2;
            }
            .UserNmeWrp::after {
            content: "\f007";
            display: inline-block;
            font-family: fontawesome;
            font-size: 19px;
            position: absolute;
            top: 27px;
            left: 12px;
            color: #2a589e;
            border-right: 1px solid #d5d5d5;
            padding-right: 10px;
            height: 26px;
        }
</style>
    </head>
    <body class="login">
        <main class="bg-color">
            <section class="login_content">
                <div class="container">
                    <div class="row">
                         <div class="col-lg-12 text-center">
                            <div class="logo"> <a href="index.php"><img src="<?php echo base_url('assets/front/images/logo.png');?>" alt="Logo" 
                            style="width: 250px;"></a> </div>
                        </div>
                        <div class="col-lg-12 text-center"> <a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor" id="signin"></a>
                            <div class="login_wrapper">
                                <div class="animate form login_form">
                                    <form method="post" id="login_form">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" /> 
                                        <h1>Login</h1>
                                        <p>Please fill out the following fields to login</p> 
                                        <div class="form-group UserNmeWrp">
                                            <label class="control-label" for="input-20">Username <span style="color: red;">*</span></label>
                                            <input class="form-control login_with_enter" type="text" name="username" id="input-20" placeholder="Enter Username"/>
                                            <span id="username_err" class="err"><small>Please enter Username*</small></span>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form-group passWrp">
                                            <label class="control-label" for="input-21"> Password <span style="color: red;">*</span></label>
                                            <input class="form-control login_with_enter" type="password" name="password" id="input-21"  placeholder="Enter Password"/> 
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <span id="password_err" class="err"><small>Please Enter Password*</small></span>
                                            <div class="clear"></div>
                                        </div>
                                        <input type="hidden" name="login" value="1">
                                        <span id="login_msg"></span> 
                                        <div class="sub-btn">
                                            <input type="button" class="btn button-deflt submit" name="submit" id="b_login_btn" 
                                            onclick="return validate_login();" value="submit" style="background: #08b07b;">
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                <div class="m-t-sm" style="display:none ;">
                                    <a href="<?php echo base_url(BACKEND_FOLDER.'/forgot-password');?>">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="position: relative;margin: 0 auto; text-align: center;"><br><br><br><br><br><br><br><br>© 2022 <a target="_blank" 
                        href="<?php echo base_url(BACKEND_FOLDER);?>">TutorChamps</a>. All rights reserved.</p>
                </div>
            </section>
        </main>
        <script src="<?php echo base_url('assets/backend/js/jquery-1.8.3.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/backend/js/classie.js');?>" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js"></script>  
    </body>
</html>
<script>
function showPassword() 
{
    var x = document.getElementById("input-21");
    if (x.type === "password") 
    {
        document.getElementById("eye").className='fa fa-eye';
        x.type = "text";
    } 
    else 
    {
        document.getElementById("eye").className='fa fa-eye-slash';
        x.type = "password";
    }
}
$('.login_with_enter').keypress(function (e) 
{
    var key = e.which;
    if(key == 13) 
    {
        validate_login();  
    }
});
function validate_login()
{
  
    $('#username_err').hide();
    $('#password_err').hide();

  
    var username        = $.trim($('#input-20').val());
    var password        = $.trim($('#input-21').val());

    var error_found = false;
   
    if(username == '')
    {
        $('#username_err').show();
        error_found = true;
    }
    if(password == '')
    {
        $('#password_err').show();
        error_found = true;
    }
    if(error_found)
    {
        return false;
    }
    else
    {
        
		$('#b_login_btn').prop('disabled', true);
		$('#b_login_btn').val('Please Wait..');

        var form = $('#login_form')[0];
        var formData = new FormData(form);
		$.ajax({
			type        : 'POST',
			url         : "<?php echo base_url(BACKEND_FOLDER.'/login/verify_login');?>",
			data        : formData,
            contentType : false,
            cache       : false,
            processData : false,
			success     : function(response)
			{	
                
                
                var response = JSON.parse(response);
                if(response.status == 'success'){
					$('#login_msg').show();
				    $("#login_msg").html(response.message);
					$("#login_msg").css({"color": response.color});
                    location.href = "<?php echo base_url(BACKEND_FOLDER.'/pages')?>";
				}
				if(response.status == 'password'){
					$('#b_login_btn').prop('disabled', false);
                    $('#b_login_btn').val('Submit');
					$('#password_err').show();
				    $("#password_err").html(response.message);
					$("#password_err").css({"color": response.color});
				}
				if(response.status == 'email'){
					$('#b_login_btn').prop('disabled', false);
                    $('#b_login_btn').val('Submit');
					$('#username_err').show();
				    $("#username_err").html(response.message);
					$("#username_err").css({"color": response.color});
				}
			
				setTimeout(function() {
					$('#email_err').fadeOut();
					$('#username_err').fadeOut();
				
				}, 2000);
			}
		});
    }
}
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = document.getElementById('input-21');
  if (input.type == "password") {
     input.type = "text";
  } else {
     input.type = "password";
  }
});
</script>