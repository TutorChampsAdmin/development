<?php $this->load->view('users/head');?>

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
<?php $this->load->view('users/footer');?>
<script>

	$("#home").addClass("active");
</script>

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
