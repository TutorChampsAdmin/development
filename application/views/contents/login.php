<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap"
    rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url()?>assets/main/css/style.css"/>
   <title>Login To Get Your Assignments Solved Instantly | TutorChamps</title>
   <style type="text/css">
   	.has-float-label {
    display: block;
    position: relative;
		margin-bottom:16px;
}
.show_password_icon{position: absolute;
    color: #08b07b;
    right: 20px;
    bottom: 15px;
    cursor: pointer;}
.resetPassword{display: none;}
.has-float-label input:hover:not(:disabled):not(:focus) {
	border-bottom:2px solid #08b07b!important;
}

.has-float-label input:focus {
	border-bottom:2px solid #08b07b;
	transition: all .2s;
}

.has-float-label input:placeholder:not(:focus) {
	border-bottom:2px solid #08b07b;
}
.has-float-label input {
    font-size: 16px;
	padding: 22px 0 10px 0;
    border: 0;
    border-radius: 0;
	box-shadow:none;
	background-color:initial;
	color:#08b07b;
	caret-color:#fff;
	border-bottom:2px solid #08b07b;
	width: 100%;	
}

input {outline: none;}
.has-float-label input:visited + .label, .has-float-label input:focus + .label, .has-float-label input:focus-within + .label{
    top: 2px;
}

.has-float-label label, .has-float-label > .label {
    position: absolute;
    left: 0;
    top: 7px;
    cursor: text;
    font-size: 12px;
    color:#08b07b;
    transition: all .2s;
		pointer-events:none;
}


.loginInner{display: flex; align-items: flex-start; justify-content: space-between; background: #141d25; border-radius: 25px; overflow: hidden;}
.loginInner > div{width: 50%; padding: 60px 25px;}
.container{max-width: 1000px;}
.contentBox{background: #c4d4dc; padding: 60px 25px!important;}
.check_sec .cstm_ser_box{margin: 0 auto 20px 30px; min-height: 78px;}
.check_sec .cstm_ser_box .left_icon {
    top: calc(50% - 23px);
    width: 45px;
    height: 45px;}
.check_sec .cstm_ser_box .left_icon i{font-size: 24px;}
.login{background: url(<?php echo base_url();?>assets/front/image/signUp-bg.jpg); background-size: cover; background-repeat: no-repeat; padding: 100px 0; background-position: top left; min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;}
.login h2{font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;}
.login h1{font-size: 22px; color: #fff;}
.fields_con{margin-bottom: 25px;}
.fg_pass{text-decoration: none!important;
    color: #fff!important;
    font-size: 13px;
    display: inline-block; padding-top: 5px;}
.fields_con .newUserTxt{font-size: 15px; color: #fff; margin-bottom: 0;}
.newUserTxt a{text-decoration: none!important; color: #08b07b!important;}
.r_btn{min-width: 160px; border: none;}
.resetPassword p{color: #fff; font-size: 16px; line-height: 28px; padding-bottom: 15px;}
.resetPassword h2{color: #fff;}


@media only screen and (min-width: 1750px){
    .logo{position: absolute;
    top: 60px;
    left: 305px;}
  }

@media only screen and (max-width: 1749px){
.logo{    position: absolute;
    top: 40px;
    left: 185px;}
}

@media only screen and (max-width: 1400px){
.logo{top: 30px;
    left: 150px;}
    .login{padding: 145px 0 100px!important;}
}

@media only screen and (max-width: 767px){
    .login{background: #fff; padding: 100px 0 0px!important;}
    .logo {left: 15px; top: 10px; margin-left: 0px;}
    .loginInner{display: block; max-width: 450px; margin-bottom: 15px;}
    .loginInner > div {width: 100%;}
    .check_sec .cstm_ser_box {padding: 20px 20px 20px 35px;
    margin: 0 auto 20px 20px;}
    .login h2{font-size: 22px;}
    .contentBox {
    padding: 60px 15px!important;}
    .check_sec{    background: #08b07b;
    padding-top: 15px;}
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
<body class="login">
<div id="loading"></div>
<div class="check_sec">

	<div class="container">
		<img class="logo" src="<?php echo base_url();?>assets/main/images/logo.png" alt="TutorChamps" title="TutorChamps">
		<div class="row">
			<div class="col-12 text-center">
				<div class="loginInner">
					<div class="loginFormBox">
						<form action="<?php echo base_url('login/');?>" method="POST" id="login_form">
						      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
							<div class="login_inn">
								<div>
									<h1>Submit Your Problem <br> Here!</h1>
								</div>
								<div class="fields_con">
									<label class="has-float-label">
										<input name="email" placeholder="" type="email" required="required">
										<span class="label">Email *</span>
									</label>
								</div>
								<div class="fields_con">
									<label class="has-float-label">
										<input id="password" placeholder="" type="password" name="password" required="required">
										<i onclick="changeInputType()" class="show_password_icon fa fa-eye fa-eye-slash"></i>
										<span class="label">Password *</span>
									</label>
								</div>
								<div class="fields_con text-center m-0">
									<button class="r_btn">Login</button>
									<p class="p_text"><a href="javascript:void(0)" class="fg_pass">Forgot Password?</a> </p>

									<p class="newUserTxt">Don’t have an account? <a href="<?php echo base_url();?>sign-up/">Sign up</a> </p>
								</div>
							</div>
						</form>
							<div class="resetPassword">
								<div>
									<h2 id="h">Reset Password</h2>
									<p id="cont">Forgotten your password? Enter your email address below, and we'll email instructions for setting a new one.</p>
								</div>
								<form  method="POST" id="reset" action="<?php echo base_url('password_reset/');?>">
								<div class="fields_con">
									<label class="has-float-label">
										<input placeholder="" name="email" type="email" required="required">
										<span class="label">Email *</span>
									</label>
								</div>
								<div class="fields_con text-center m-0">
									<button type="submit" class="r_btn">Send Email</button>
								</div>
								</form>
							</div>
					</div>
					<div class="contentBox">
						<div><h2>We are So Glad to Have You Back at TutorChamps</h2> </div>
						<div class="cstm_ser_box">
							<div class="left_icon"><i class="fa fa-check"></i></div>
							<p>1000000+ Questions Solved.</p>
						</div>

						<div class="cstm_ser_box">
							<div class="left_icon"><i class="fa fa-check"></i></div>
							<p>30k+ Tutors with 100+ PhD.</p>
						</div>

						<div class="cstm_ser_box">
							<div class="left_icon"><i class="fa fa-check"></i></div>
							<p>Unlimited Revisions</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script src="<?php echo base_url();?>assets/front/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $('#login_form').submit(function(e){
            e.preventDefault();
            var form = $("#login_form")[0];
            $("#loading").css({'display': 'block'});
            var data = new FormData(form);
            data.append("login",'login')
            var actionurl = $("#login_form").attr('action');
            $.ajax({
                type:"POST",
                url:actionurl,
                data:data,
                cache: false,
                processData: false,
                contentType: false,
                success:function(data){ 
                    $("#loading").css({'display':'none'});
                    var response = JSON.parse(data);
                    if(response.status=='error'){
                        var content = response.msg
                        $('.epError').text(content)
                    }
                    else if(response.status == 'success'){
                        window.location.href = '<?php echo base_url();?>dashboard/old-user';
                    }
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

        $('#reset').submit(function(e){
            e.preventDefault();
            $("#loading").css({'display': 'block'});
            var form = $('#reset')[0];
            var form_data = new FormData(form);
            form_data.append("reset_pass",'reset_pass')
            var actionurl = $("#reset").attr("action");
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
                        $("#h").text("Password reset sent")
                        $("#cont").text(response.message)
                        $("#reset").css("display","none");
                    }else{
                        $("#cont").text(response.message)
                    }
                    $("#loading").css({'display': 'none'});
                }

            })
            .done(function(){
                console.log("done")
            })
            .fail(function(){
                console.log("fail")
            })

        })
    </script>

<script type="text/javascript">
	$(".fg_pass").click(function(){
	  $(".resetPassword").toggle("slow");
	  $(".login_inn").toggle("slow");
	});


	function changeInputType() {
        $(".show_password_icon").toggleClass("fa-eye-slash");
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }

</script>

</body>
</html>