<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,500;0,600;0,700;0,800;0,900;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/main/css/style.css" />
	<title>Register To Get Your Assignments/Homework Solved Instantly | TutorChamps</title>
	<style type="text/css">
		.iti--separate-dial-code .iti__selected-dial-code {
			color: #08b07b;
			font-size: 14px;
		}
    #loading{
        position: fixed;
        width: 100%;
        height: 100vh;
        background: #fff url('<?php echo base_url();?>assets/main/images/loader.gif') no-repeat center  ;
        z-index: 999;
        display: none;
        opacity: 0.7;
    }
		.fields_con .iti__arrow {
			border-left: 3px solid transparent;
			border-right: 3px solid transparent;
			border-bottom-color: #08b07b;
			border-top-color: #08b07b;
		}

		::-webkit-input-placeholder {
			color: #08b07b9e;
			font-size: 13px;
		}

		:-ms-input-placeholder {
			color: #08b07b9e;
			font-size: 13px;
		}

		::placeholder {
			color: #08b07b9e;
			font-size: 13px;
		}

		.fields_con .phone {
			padding-left: 76px;
			background: transparent;
			color: #08b07b;
			border: none;
			border-bottom: 2px solid #08b07b;
			width: 100%;
			padding-bottom: 10px;
			padding-top: 10px;
		}

		.fields_con>.iti {
			width: 100%;
		}

		.has-float-label {
			display: block;
			position: relative;
			margin-bottom: 16px;
		}

		.show_password_icon {
			position: absolute;
			color: #08b07b;
			right: 20px;
			bottom: 15px;
			cursor: pointer;
		}

		.has-float-label input:hover:not(:disabled):not(:focus) {
			border-bottom: 2px solid #08b07b !important;
		}

		.has-float-label input:focus {
			border-bottom: 2px solid #08b07b;
			transition: all .2s;
		}

		.has-float-label input:placeholder:not(:focus) {
			border-bottom: 2px solid #08b07b;
		}

		.has-float-label input {
			font-size: 16px;
			padding: 22px 0 10px 0;
			border: 0;
			border-radius: 0;
			box-shadow: none;
			background-color: initial;
			color: #08b07b;
			caret-color: #fff;
			border-bottom: 2px solid #08b07b;
			width: 100%;
		}

		input {
			outline: none;
		}

		.has-float-label input:visited+.label,
		.has-float-label input:focus+.label,
		.has-float-label input:focus-within+.label {
			top: 2px;
		}

		.has-float-label label,
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


		.signinInner {
			display: flex;
			align-items: flex-start;
			justify-content: space-between;
			background: #141d25;
			border-radius: 25px;
			overflow: hidden;
		}

		.signinInner>div {
			width: 50%;
			padding: 60px 25px;
		}

		.container {
			max-width: 1000px;
		}

		.contentBox {
			background: #c4d4dc;
			padding: 60px 25px !important;
		}

		.check_sec .cstm_ser_box {
			margin: 0 auto 20px 30px;
			min-height: 78px;
		}

		.check_sec .cstm_ser_box .left_icon {
			top: calc(50% - 23px);
			width: 45px;
			height: 45px;
		}

		.check_sec .cstm_ser_box .left_icon i {
			font-size: 24px;
		}

		.signin {
			background: url(<?php echo base_url();?>assets/main/images/signUp-bg.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			padding: 100px 0;
			background-position: top left;
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.signin h2 {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
		}

		.signin h1 {
			font-size: 22px;
			color: #fff;
		}

		.fields_con {
			margin-bottom: 25px;
		}

		.fg_pass {
			text-decoration: none !important;
			color: #fff !important;
			font-size: 13px;
			display: inline-block;
			padding-top: 5px;
		}

		.fields_con .newUserTxt {
			font-size: 15px;
			color: #fff;
			margin: 20px 0 0;
			padding-bottom: 0 !important;
		}

		.newUserTxt a {
			text-decoration: none !important;
			color: #08b07b !important;
		}

		.r_btn {
			min-width: 160px;
			border: none;
		}

		.signin_inn p {
			color: #fff;
			font-size: 15px;
			line-height: 26px;
			padding-bottom: 15px;
		}

		#iti-0__item-in {
			display: none !important;
		}


		@media only screen and (min-width: 1750px) {
			.logo {
				position: absolute;
				top: 60px;
				left: 305px;
			}
		}

		@media only screen and (max-width: 1749px) {
			.logo {
				position: absolute;
				top: 40px;
				left: 185px;
			}
		}

		@media only screen and (max-width: 1400px) {
			.logo {
				top: 30px;
				left: 150px;
			}

			.signin {
				padding: 145px 0 100px !important;
			}
		}

		@media only screen and (max-width: 767px) {
			.signin {
				background: #fff;
				padding: 100px 0 0px !important;
			}

			.logo {
				left: 15px;
				top: 10px;
				margin-left: 0;
			}

			.signinInner {
				display: block;
				max-width: 450px;
				margin-bottom: 15px;
			}

			.signinInner>div {
				width: 100%;
			}

			.signin h2 {
				font-size: 22px;
			}

			.check_sec .cstm_ser_box {
				margin: 0 auto 20px 20px;
				padding: 20px 20px 20px 35px;
			}

			.contentBox {
				padding: 60px 15px !important;
			}

			.check_sec {
				background: #08b07b;
				padding-top: 15px;
			}
		}
	</style>
</head>

<body class="signin">
    <div id="loading"></div>
	<div class="check_sec">

		<div class="container">
			<img class="logo" src="<?php echo base_url();?>assets/main/images/logo.png" alt="TutorChamps" title="TutorChamps">
			<div class="row">
				<div class="col-12 text-center">
					<div class="signinInner">
						<div class="loginFormBox">
							<form id="sign_up"  method="POST" action="<?php echo base_url('sign-up/');?>">
								<div class="signin_inn">
									<div>
										<h1>Create An Account</h1>
									</div>
									<div class="fields_con">
										<label class="has-float-label">
											<input name="email" placeholder="" type="email" required="required">
											<span class="label">Email *</span>
										</label>
									</div>
									<div class="fields_con">
										<input class="phone" name="phone" type="number" id="phone"
											placeholder="Phone Number *" />
									</div>
									<div class="fields_con">
										<label class="has-float-label">
											<input name="password" placeholder="" id="password" type="password" required="required">
											<i onclick="changeInputType()"
												class="show_password_icon fa fa-eye fa-eye-slash"></i>
											<span class="label">Create Password *</span>
										</label>
									</div>
									<p id="error_msg" style="color:red;"></p>
									<div class="fields_con text-center mb-0 pt-2">
										<button type="submit" class="r_btn">Sign Up</button>

										<p class="newUserTxt">Already have an Account? <a href="<?php echo base_url();?>login/">Log In</a>
										</p>
									</div>
								</div>
							</form>
						</div>
						<div class="contentBox">
							<div>
								<h2>We are So Glad to Have You Back at TutorChamps</h2>
							</div>
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

    <script src="<?php echo base_url();?>assets/main/js/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css" />
	<script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    
    <script>
        $('#sign_up').submit(function(e){
            e.preventDefault();
            $("#loading").css({'display': 'block'});
            var form = $("#sign_up")[0];
            var data = new FormData(form);
            data.append("sign_up",'sign_up')
            var actionurl = $("#sign_up").attr('action');
            $.ajax({
                type:"POST",
                url:actionurl,
                data:data,
                cache: false,
                processData: false,
                contentType: false,
                success:function(data){
                    $("#loading").css({'display':'none'});
                    console.log("successfully")
                    var response = JSON.parse(data);
                    if(response.status=='error'){
                        var content = response.msg
                        $('#error_msg').text(content);
						console.log(content);
                        console.log("error");
                    }
                    else{
                        window.location.href = '<?php echo base_url();?>dashboard/new-user';
                    }
                }
            })  
        })
    </script>


	<script>
		var input = document.querySelector("#phone");
		window.intlTelInput(input, {
			separateDialCode: true
		});
	</script>

	<script type="text/javascript">
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