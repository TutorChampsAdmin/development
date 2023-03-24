
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LMS : Lead Management System</title>
        <link rel="shortcut icon" href="{{ WEBSITE_URL }}static/assets/front/images/favicon.ico">
        <link rel="apple-touch-icon" href="{{ WEBSITE_URL }}static/assets/front/images/favicon.ico">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <link href="{{ WEBSITE_URL }}static/assets/backend/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ WEBSITE_URL }}static/assets/backend/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ WEBSITE_URL }}static/assets/backend/css/nprogress.css" rel="stylesheet">
        <link href="{{ WEBSITE_URL }}static/assets/backend/css/animate.min.css" rel="stylesheet">
        <link href="{{ WEBSITE_URL }}static/assets/backend/css/set2.css" rel="stylesheet">
        <link href="{{ WEBSITE_URL }}static/assets/backend/css/style.css" rel="stylesheet">
    </head>
    <body class="login">
        <main class="bg-color">
            <section class="login_content">
                <div class="container">
                    <div class="row">
                         <div class="col-lg-12 text-center">
                            <div class="logo"> <a href="index.php"><img src="{{ WEBSITE_URL }}static/assets/front/images/logo-sssi.png" alt="Logo" 
                                style="width: 250px;"></a> </div>
                        </div>
                        <div class="col-lg-12 text-center"> <a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor" id="signin"></a>
                            <div class="login_wrapper">
                                <div class="animate form login_form">
                                   
                                    <form method="post" id="login_form">
                                        {% csrf_token %}
                                        <h1>Reset PASSWORD</h1>
                                        <span id="login_msg"></span> 
                                        <div class="form-group UserNmeWrp">
                                            <label class="control-label" for="input-20">Password</label>
                                            <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password "/>
                                            <span id="passworde_err" class="err"><small>* Please Enter Password!</small></span>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="form-group UserNmeWrp">
                                            <label class="control-label" for="input-20">Confirm Password</label>
                                            <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password "/>
                                            <span id="confirm_password_err" class="err"><small>* Please Enter Confirm Password!</small></span>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="sub-btn">
                                            <input type="hidden" name="reset_code_user_id" id="reset_code_user_id" value="{{ reset_code }}">
                                            <input type="button" class="btn button-deflt submit" name="submit" id="portal_login_btn" 
                                            onclick="return validate_reset_password();" value="Reset Password" style="background: #6b2a7f;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="position: relative;margin: 0 auto; text-align: center;"><br><br><br><br><br><br><br><br>© 2022 <a target="_blank" 
                        href="{{ WEBSITE_URL }}">Lead Management System</a>. All rights reserved.</p>
                </div>
            </section>
        </main>
        <script src="{{ WEBSITE_URL }}static/assets/backend/js/jquery-1.8.3.min.js?ver=3.08" type="text/javascript"></script>
        <script src="{{ WEBSITE_URL }}static/assets/backend/js/classie.js?ver=3.08" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js?ver=3.08"></script>  
    </body>
</html>
<script>
function validate_reset_password()
{
    $('#passworde_err').hide();
    $('#confirm_password_err').hide();

    var password            = $.trim($('#password').val());
    var confirm_password    = $.trim($('#confirm_password').val());
    var reset_code_user_id  = $.trim($('#reset_code_user_id').val());
    reset_code_user_id      = reset_code_user_id.split('@@');
    var reset_code          = reset_code_user_id['0'];
    var user_id             = reset_code_user_id['1'];
  
    var error_found = false;
    if(password == '')
    {
        $('#passworde_err').show();
        error_found = true;
    }
    if(confirm_password == '')
    {
        $('#confirm_password_err').show();
        error_found = true;
    }
    if(confirm_password != password)
    {
        $('#confirm_password_err').show();
        $('#confirm_password_err').html("Password and confirm password should be same!");
        error_found = true;
    }
    if(error_found)
    {
        return false;
    }
    else
    {
        var csrftoken       = " {{ csrf_token }}";
		$('#portal_login_btn').prop('disabled', true);
		$('#portal_login_btn').val('Please Wait..');

        var JSONObject = {
            "password"          : password, 
            "confirm_password"  : confirm_password,
            "reset_code"        : reset_code,
            "user_id"           : user_id
        };
        var jsonData = JSON.stringify(JSONObject);
		$.ajax({
			type        : 'POST',
			headers     : {'X-CSRFToken': csrftoken},
			url         : "/portal/reset-password/",
			data        : jsonData,
            contentType : "application/json",
            cache       : false,
            processData : false,
            dataType    : 'JSON',
			success     : function(response)
			{	
                $('#portal_login_btn').prop('disabled', false);
                $('#portal_login_btn').val('Submit');
                
                if(response.status == 'success'){
					
					$('#login_msg').show();
				    $("#login_msg").html(response.message);
					$("#login_msg").css({"color": response.color});
				}
				if(response.status == 'confirm_password'){
					
					$('#confirm_password_err').show();
				    $("#confirm_password_err").html(response.message);
					$("#confirm_password_err").css({"color": response.color});
				}
				setTimeout(function() 
				{
					$('#login_msg').fadeOut();
					$('#email_err').fadeOut();
					$('#confirm_password_err').fadeOut();

					if(response.status == 'success'){
						location.href = "/portal";
					}
				}, 2000);
			}
		});
    }
}
</script>