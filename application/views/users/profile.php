<!DOCTYPE html>
<html>

<head> 
	<meta charset="utf-8">
	<title>Dashboard - TutorChamps.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css" />
	<link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">
	<!-- <link href="<?php echo base_url();?>assets/css/chat.css" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&amp;display=swap"
		rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/fav.png" type="image/x-icon">
</head>

<body>
<style>
	
</style>
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
	<div class="body_sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="dashboardContainer clientDashboard">
						<div class="sidebar sidebar_menu">

							<ul class="sidebar_menu">
								<li><a id="home" class="active" href="<?php echo base_url(); ?>dashboard/"><i class="fa fa-home"></i> Home</a></li>
								<li><a id="live_session" href="javascript:void(0)"><i class="fa fa-history" aria-hidden="true"></i> Order History</a></li>
								<li><a id="project_lab" href="javascript:void(0)"><i class="fa fa-bug"></i> Reward Points</a></li>
								<li><a id="profile" href="javascript:void(0)"><i class="fa fa-user"></i> Refer & Earn</a></li>
								<li><a id="profile" href="javascript:void(0)"><i class="fa fa-question-circle"></i> FAQs</a></li>
								<div class="sidebar_bottomLink">
									<li><a id="" href="javascript:void(0)"><i class="fa fa-question-circle"></i> Help</a></li>
									<li><a id="" href="<?php echo base_url('dashboard/logout/');?>"><i class="fa fa-cog"></i> Logout</a></li>
								</div>
							</ul>
						</div>

						<div class="mainContent DashboardContent">
							
							<div class="editProfile">
								<form>
									<input type="hidden" name="ci_csrf_token" value="" />  
									<div class="uploadProf">
										<div class="avatar-upload">
									        <div class="avatar-edit">
									            <input type='file' id="imageUpload" name="profile" accept=".png, .jpg, .jpeg" />
									            <label for="imageUpload"><img title="Add profile photo" src="https://tutorchamps.com/assets/front/images/camera.png"></label>
									        </div>
									        <div class="avatar-preview">
												<div id="imagePreview" style="background-image: url('');"></div>
									        </div>
									    </div>
									    <div class="">
									    	<span class="prof_name">Test</span>
									    </div>
									</div>
								</form>

								<ul class="nav nav-tabs tab_sec">
								    <li><a data-toggle="tab" href="#menu1" class="active">Personal Information</a></li>
								    <li><a data-toggle="tab" href="#menu2">Billing Address</a></li>
								    <li><a data-toggle="tab" href="#menu3">Change Password</a></li>
								    <li><a data-toggle="tab" href="#menu4">Privacy Policy</a></li>
								  </ul>

								  <div class="tab-content">
								    <div id="menu1" class="tab-pane fade active show">
								      	<form class="order_form">
								      		<div class="fields_outer_div">
								      			<div class="form_fields">
								      				<label>Phone</label>
													<input class="phone_num input" name="phone_num" type="number" id="phone_num" placeholder="9876543210" />
												</div>
												<div class="form_fields">
													<label>Whatsapp Number</label>
													<input class="input" name="phone" type="number" id="phone" placeholder="9876543210" />
												</div>
								      		</div>

								      		<div class="fields_outer_div">
								      			<div class="form_fields">
								      				<label>Name</label>
													<input name="Name" class="input" placeholder="Name" type="text">
												</div>
												<div class="form_fields">
													<label>Email</label>
													<input name="email" class="input" placeholder="Email" type="email">
												</div>
								      		</div>


								     		<div class="fields_outer_div">
								     			<div class="form_fields">
													<label>Birthday</label>
													<input class="Birthday input" type="datetime-local" id="birthday" name="Birthday" placeholder="Birthday">
												</div>
												<div class="form_fields">
													<label>Gender</label>
													<div class="radioCon">
												 		<label for="male">
												 			<input style="display: inline-block;" checked type="radio" id="male" name="Gender" value="male">Male
												 		</label>
												 		<label for="female">
												 		   <input style="display: inline-block;" type="radio" id="female" name="Gender" value="female">female
												 		</label>
												 	</div>
												</div>
								       		</div>

								      		<div class="fields_outer_div">
								      			<div class="form_fields">
								      				<label>Collage Name</label>
													<input name="CollageName" class="input" placeholder="Collage Name" type="text">
												</div>
												<div class="form_fields">
								      				<label>Graduation year</label>
													<input name="GraduationYear" class="input" placeholder="2000" type="text">
												</div>
								      		</div>

								    <div class="fields_outer_div">
								     	<div class="form_fields">
								    		<label>Course Name</label>
											<input name="CourseName" class="input" placeholder="Course Name" type="text">
										</div>
										<div class="form_fields">
								    		<label>Time Zone</label>
											<input name="TimeZone" class="input" placeholder="" type="text">
										</div>
								    </div>

								    <div class="fields_outer_div">
										<div class="form_fields">
											<label for="EmailNotif">
												<input type="checkbox" id="EmailNotif" name="EmailNotif" value="EmailNotif"> Get Email Notifications
											</label>
										</div>
										<div class="form_fields">
								     		<label for="WhatsappNotif">
								    			<input type="checkbox" id="WhatsappNotif" name="WhatsappNotif" value="WhatsappNotif" checked> Get Whatsapp Notifications
								     		</label>
											</div>
								     	</div>

								      		<div class="text-center mt-4">
												<button id="" type="submit" class="r_btn">Save Details</button>
											</div>

								      	</form>
								    </div>
								    <div id="menu2" class="tab-pane fade">
								      <form class="order_form">
								      		<div>
								      			<h3>Billing Address</h3>
								      		</div>

								      		<div class="fields_outer_div">
								      			<div class="form_fields">
								      				<label>Name</label>
													<input name="Name" class="input" placeholder="Name" type="text">
												</div>
												<div class="form_fields">
													<label>Email</label>
													<input name="email" class="input" placeholder="Email" type="email">
												</div>
								      		</div>

								      		<div class="fields_outer_div">
								      			<div class="form_fields">
								      				<label>Phone</label>
													<input class="phone_num input" name="phone_num" type="number" id="phone_num" placeholder="9876543210" />
												</div>
												<div class="form_fields">
													<label>Address</label>
													<input class="input" name="Address" type="text" id="Address" placeholder="Address" />
												</div>
								      		</div>

								      		<div class="fields_outer_div">
								      			<div class="form_fields">
								      				<label>Zip Code</label>
													<input class="phone_num input" name="" type="number" id="ZipCode" placeholder="Zip Code" />
												</div>
												<div class="form_fields">
													<label>Country</label>
													<input class="input" name="" type="text" id="Country"  placeholder="Country" />
												</div>
								      		</div>

								      		<div class="fields_outer_div">
								      			<div class="form_fields">
								      				<label>State</label>
													<input name="" class="input" placeholder="State" type="text">
												</div>
												<div class="form_fields">
								      				<label>City</label>
													<input name="" class="input" placeholder="City" type="text">
												</div>
								      		</div>

								      		<div class="text-center mt-4">
												<button id="" class="r_btn">Save Details</button>
											</div>

								      	</form>
								    </div>
								    <div id="menu3" class="tab-pane fade">
										<form class="order_form changePassword">
								      		<div>
								      			<h3>Change Password</h3>
								      		</div>

								      		<div>
								      			<div class="form_fields">
								      				<label>Old Password</label>
													<input class="input" type="password" name="" placeholder="Old Password" id="oldPassword">
													<i onclick="changeInputType()" id="show_password_icon" class="show_password_icon fa fa-eye fa-eye-slash"></i>
												</div>
												<div class="form_fields">
								      				<label>New Password</label>
													<input class="input" type="password" name="" placeholder="New Password" id="newPassword">
													<i onclick="changeInputTypeTwo()" id="show_password_iconTwo"  class="show_password_icon fa fa-eye fa-eye-slash"></i>
												</div>
								      		</div>

											<div>
								      			<div class="form_fields">
								      				<label>Confirm Password</label>
													<input class="input" type="password" name="" placeholder="Confirm Password" id="ConfPassword">
													<i onclick="changeInputTypeThree()" id="show_password_iconThree" class="show_password_icon fa fa-eye fa-eye-slash "></i>
												</div>
								      		</div>


								      		<div class="text-center mt-4">
												<button id="" class="r_btn">Change</button>
											</div>

								      	</form>
								    </div>

									<div id="menu4" class="tab-pane fade">
										<div class="privacy_content">
											<h3 class="aq_h3">Privacy Policy</h3>

											<h4>» Overview :</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

											<h4>» Overview :</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

											<h4>» Overview :</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
										</div>
									</div>
								  </div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal EditTableModal openPopup" id="openPopup">
		<div class="modal-dialog customPopWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>
				<div class="banner_form ">  
					<h3>Submit Your Problem Here!</h3>
					<div class="banner_form_con">
						<form id="hwform" method="POST" action="<?php echo base_url('dashboard/order/');?>" enctype="multipart/form-data">
							<div class="form_innBox">
								<div class="form_fields">
									<textarea name="desc" class="textarea" placeholder="Type your question here" required></textarea>
								</div>
								<div class="form_fields">
									<div class="upload_MFile">
										<span class="fileinput-button" id="fileinput-button">
								            <span><i class="fas fa-cloud-upload-alt" aria-hidden="true"></i><br><span>Drop your file or Browse</span> </span>
								            <input type="file" name="assignment" id="files" multiple accept="image/jpeg, image/png, image/gif," required><br />
								        </span>
								        <output id="Filelist"></output>
								    </div>
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="r_btn">Submit</button>
								<p class="p_text pt-3">Your desired grade is just a click away!</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>

  <script>
		var input = document.querySelector("#phone");
		window.intlTelInput(input, {
			separateDialCode: true
		});
	</script>

	<script>
		function changeInputType() {
            $("#show_password_icon").toggleClass("fa-eye-slash");
            var oldPassword = document.getElementById("oldPassword");
            if (oldPassword.type === "password") {
                oldPassword.type = "text";
            } else {
                oldPassword.type = "password";
            }
        }

		function changeInputTypeTwo() {
            $("#show_password_iconTwo").toggleClass("fa-eye-slash");
            var newPassword = document.getElementById("newPassword");
            
			if (newPassword.type === "password") {
                newPassword.type = "text";
            } else {
                newPassword.type = "password";
            }
        }

		function changeInputTypeThree() {
            $("#show_password_iconthree").toggleClass("fa-eye-slash");
            var ConfPassword = document.getElementById("ConfPassword");

			if (ConfPassword.type === "password") {
                ConfPassword.type = "text";
            } else {
                ConfPassword.type = "password";
            }
        }
	</script>

	<script>
        if ('{{ ordered }}' == 'True'){
			$("#check").click()
		}
		console.log($("#checkbox").checked)


		// $("#home").click(function () {
		// 	$(".homeContant").addClass("active_");
		// 	$(".profileContent").removeClass("active_");
		// 	$(".live_session_content").removeClass("active_");
		// 	$(".assignment_help_content").removeClass("active_");
		// 	$(".project_lab_content").removeClass("active_");
		// });
		$("#profile").click(function () {
			$(".profileContent").addClass("active_");
			$(".homeContant").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$(".assignment_help_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
		});
		$("#live_session").click(function () {
			$(".live_session_content").addClass("active_");
			$(".profileContent").removeClass("active_");
			$(".homeContant").removeClass("active_");
			$(".assignment_help_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
		});
		$("#assignment_help").click(function () {
			$(".assignment_help_content").addClass("active_");
			$(".profileContent").removeClass("active_");
			$(".homeContant").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
		});
		$("#project_lab").click(function () {
			$(".project_lab_content").addClass("active_");
			$(".profileContent").removeClass("active_");
			$(".homeContant").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$(".assignment_help_content").removeClass("active_");
		});
		
		$(document).ready(function () {
			$('.sidebar_menu ul li a').click(function () {
				$('li a').removeClass("active");
				$(this).addClass("active");
			});
		});

		$(document).ready(function () {
			$('#mobBtn').click(function () {
				$('.sidebar').toggleClass("open");
				var classname = $("#i").attr("class")
				if(classname=="fa fa-bars"){
					$("#i").addClass("fa-times");
					$("#i").removeClass("fa-bars");
				}
				else{
					$("#i").addClass("fa-bars");
					$("#i").removeClass("fa-times");
				}
			});
		});
		$(document).ready(function () {
			$('.sidebar a').click(function () {
				$('.sidebar').toggleClass("open");
			});
		});
	</script>




    <script>
    	$("#next").click(function(){
   		  $(".first_step .form_innBox").toggleClass("hide");
   		  $(".first_step").toggleClass("opened_Box");
   		  $("#progressbar li").removeClass("active");
   		  $("#progressbar li:nth-child(1)").addClass("active");
   		});

   		$("#second_stepNext_btn").click(function(){
   		  $(".Second_step .form_innBox").toggleClass("show");
   		  $(".Second_step").toggleClass("opened_Box");
   		  $("#progressbar li").removeClass("active");
   		  $("#progressbar li:nth-child(1)").addClass("active");
   		  $("#progressbar li:nth-child(2)").addClass("active");
   		});

   		$("#third_stepNext_btn").click(function(){
   		  $(".third_step .form_innBox").toggleClass("show");
   		  $(".third_step").toggleClass("opened_Box");
   		  $("#progressbar li").removeClass("active");
   		  $("#progressbar li:nth-child(1)").addClass("active");
   		  $("#progressbar li:nth-child(2)").addClass("active");
   		  $("#progressbar li:nth-child(3)").addClass("active");
   		});

   		$("#FeedbackToggle").click(function(){
   		  $(".four_step .form_innBox").toggleClass("show");
   		  $(".four_step").toggleClass("opened_Box");
   		  $("#progressbar li").addClass("active");
   		});
   		
    </script>

<!--this is from -->


	<script>
function getdata(){
	$.ajax({
		type:"GET",
		url:'/getdata/',
		success:function(data){
		for(let i=0; i<data.length;i++){
			var order_id = data[i].order_id
			var deadline = data[i].deadline
			var subject = data[i].subject
			var status = data[i].status
			var temp = '<tr><td>'+order_id+'</td><td>'+deadline+'</td><td>'+subject+'</td><td>'+status+'</td><td>'+'<div class="chatIcon main_chat_icon"><a href="https://wa.me/+919711569678" target="_blank"><img src="<?php echo base_url();?>assets/front/dashboard/images/chat.png"></a></div>'+'</td></tr>'
			$("#labdata tr:last").after(temp)
		}
		}
	})
}
	</script>

	<script>
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
            $('#files').change(function() {
				var i = $(this).prev('label').clone();
				var file = $('#files')[0].files[0].name;
				$(this).prev('label').text(file);
			  });
        </script>
		<script>
			$("#hwform").submit(function(e){
				e.preventDefault();
				$("#loading").css({"display":"block"});
				var form = $("#hwform")[0];
				var data = new FormData(form);
				data.append("order_from_dashboard",'order_from_dashboard')
				var actionurl = $("#hwform").attr('action');
				$.ajax({
					type:"POST",
					url:actionurl,
					data:data,
					cache: false,
					processData: false,
					contentType: false,
					success:function(data){
						$("#loading").css({"display":"none"});
						$('#hwform').trigger('reset');
						alert('Order successful');
						 window.location.href = '<?php echo base_url();?>dashboard/new-user/order-successful';
					}
				})
			})
		</script>


<?php $this->load->view('includes/order_detail_popup'); ?>

<?php  
$req_url2 = "https://" . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];

    if(strpos($req_url2, '/order-successful') !== false) {
        $ordID = $this->session->userdata('onlyOrder_id') ;
        $Order_Code = $this->session->userdata('Order_Code') ; ?>
        <script>
            var lead_id ='<?php echo $ordID ; ?>';
            var order_id ='<?php echo $Order_Code ; ?>';
            show_order_details(lead_id,order_id,subjectname='');
        </script>
<?php    } 
?>


</body>

</html>
