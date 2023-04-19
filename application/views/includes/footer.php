<style>
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

<div id="loading"></div>
	<div class="modal EditTableModal openPopup" id="openPopup">
		<div class="modal-dialog customPopWidth">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>
				<div class="form_box">
					<form class="SignUp_form" id="sign_up" method="POST" action="<?php echo base_url('sign-up/');?>">
					    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />  
						<div class="signin_inn" id="sign_up" class="commForm login_form loginF border-0 pt-0" method="POST" action="<?php echo base_url('sign-up/');?>">
							<div>
								<h3 class="popupHead">Create An Account</h3>
							</div>
							<div class="fields_con">
							    <span class ="err_msz"></span>
								<label class="has-float-label">
									<input name="email" placeholder="" type="email" required="required">
									<span class="label">Email *</span>
								</label>
							</div>
							<div class="fields_con">
								<input class="phone" name="phone" type="number" id="phone" placeholder="Phone Number *" />
							</div>
							<div class="fields_con">
								<label class="has-float-label">
									<input name="password" placeholder="" id="createPassword" type="password" required="required">
									<span class="label">Create Password *</span>
									<i onclick="changeInputType()" class="show_password_icon fa fa-eye fa-eye-slash"></i>
								</label>
							</div>
							<!--<p>this is error message</p>-->
							<div class="fields_con text-center mb-0 pt-2">
								<button class="r_btn">Sign Up</button>

								<p class="newUserTxt">Already have an Account? <a class="popup_loginBtn" href="#">Log In</a> </p>
							</div>
						</div>
					</form>
					<form class="login_form" id="login_form" action="<?php echo base_url('login/');?>" method="POST">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />  
						<div class="login_inn">
							<div>
								<h3 class="popupHead">Submit Your Problem <br> Here!</h3>
							</div>
							<div class="fields_con">
							    <span class="epError"></span>
								<label class="has-float-label">
									<input name="email" placeholder="" type="email" required="required">
									<span class="label">Email *</span>
								</label>
							</div>
							<div class="fields_con">
								<label class="has-float-label">
									<input name="password" id="password" placeholder="" type="password" required="required">
									<span class="label">Password *</span>
									<i onclick="changeInputType()" class="show_password_icon fa fa-eye fa-eye-slash"></i>
								</label>
							</div>
							<div class="fields_con text-center m-0">
								<button class="r_btn">Login</button>
								<p class="p_text"><a href="javascript:void(0)" class="fg_pass">Forgot Password?</a> </p>

								<p class="newUserTxt">Don’t have an account? <a class="popup_SignUpBtn" href="#">Sign up</a> </p>
							</div>
						</div>
					</form>
						<div class="resetPassword">
							<div>
								<h3 class="popupHead" id="h">Reset Password</h3>
								<p id="cont">Forgotten your password? Enter your email address below, and we'll email instructions for setting a new one.</p>
							</div>
							<form method="POST" id="reset" action="<?php echo base_url('password_reset/');?>">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
    							<div class="fields_con">
    								<label class="has-float-label">
    									<input placeholder="" type="email" required="required">
    									<span class="label">Email *</span>
    								</label>
    							</div>
    							<div class="fields_con text-center m-0">
    								<button class="r_btn">Send Email</button>
    							</div>
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>


	<footer>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="logo_sec">
						<div class="F_logo_con">
							<img src="<?php echo base_url();?>assets/main/images/logo.png" alt="TutorChamps" title="TutorChamps">
						</div>
						<div class="social_links">
							<a class="insta" href="https://www.instagram.com/tutorchampsofficial/" target="_blank"><i class="fab fa-instagram"></i> </a>
							<a class="fb" href="https://www.facebook.com/tutorchampsofficial" target="_blank"><i class="fab fa-facebook-f"></i> </a>
							<a class="twitter" href="https://twitter.com/TutorchampsO1" target="_blank"><i class="fab fa-twitter"></i> </a>
							<a class="youtube" href="https://www.youtube.com/channel/UCFqnDc2JsWYJmDTG1eQyQCg" target="_blank"><i class="fab fa-youtube"></i> </a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="foot_link_con">
						<h4>Product & Services</h4>
						<ul>
							<li><a href="<?php echo base_url();?>homework-help/">» Homework Help</a></li>
							<li><a href="<?php echo base_url();?>essay-writing-services/">» Writing & Citations</a></li>
							<li><a href="<?php echo base_url();?>coursework-writing-services/">» Coursework</a></li>
							<li><a href="<?php echo base_url();?>">» Exam Preparation</a></li>
							<li><a href="<?php echo base_url();?>live-sessions/">» Real-time Doubts Solving</a></li>
							<li><a href="<?php echo base_url();?>project-lab-report-help">» Lab Reports</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="foot_link_con">
						<h4>Features</h4>
						<ul>
							<li><a href="<?php echo base_url();?>features/">» 30k+ Expert Tutors</a></li>
							<li><a href="<?php echo base_url();?>features/">» 100% Plagiarism-free Solutions</a></li>
							<li><a href="<?php echo base_url();?>features/">» Cost-effective Pricing</a></li>
							<li><a href="<?php echo base_url();?>features/">» Confidentiality</a></li>
							<li><a href="<?php echo base_url();?>features/">» Learn All At One Place</a></li>
							<li><a href="<?php echo base_url();?>features/">» 24/7 Availability</a></li>
							<li><a href="<?php echo base_url();?>features/">» 100% Accurate Solutions</a></li>
							<li><a href="<?php echo base_url();?>features/">» On Time Delivery</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="foot_link_con">
						<h4>About TutorChamps</h4>
						<ul>
							<li><a href="<?php echo base_url();?>about-us/">» About Us</a></li>
							<li><a href="<?php echo base_url();?>faqs/">» FAQs</a></li>
							<li><a href="<?php echo base_url();?>blog/">» Blog</a></li>
							<li><a href="<?php echo base_url();?>refund-policy/">» Refund Policy</a></li>
							<li><a href="<?php echo base_url();?>privacy-policy/">» Privacy Policy</a></li>
							<li><a href="<?php echo base_url();?>terms-and-conditions/">» Terms & Conditions</a></li>
							<li><a href="<?php echo base_url();?>reviews/">» Reviews</a></li>
							<li><a href="<?php echo base_url();?>tutor/">» Become A Tutor</a></li>
						</ul>
					</div>
				</div>
				<div class="col-12">
					<div class="desclaim_con">
						<p><b>Disclaimer:</b> TutorChamps is a Brand name of ExpGrowth Business Solutions LLP. TutorChamps is an online learning platform that offers online homework help to students. All of the work should be used in accordance with the regulations and laws that apply. It is further noted that the use of any photograph on the website, including any photographs of any educational institute/university, does not imply any link, partnership, or sponsorship between the company and the aforementioned educational institute/university. Any such use is solely for illustration reasons, and all intellectual property rights remain the property of their respective owners. To improve your experience, we use Google Analytics. There is no tracking of personal information.</p>
					</div>
					<div class="copyR_cot">
						<div>
							<p>Copyright 2021 - 2023, All Rights Reserved.</p>
						</div>
						<div class="f_contact">
							<a class="email" href="mailto:help@tutorchamps.com" title="E-mail" target="_blank"><i class="fa fa-envelope"> </i>help@tutorchamps.com</a>
							<a href="https://wa.me/+919711569678" title="Whatsapp" target="_blank" class="whatsaap"><i class="fab fa-whatsapp" aria-hidden="true"></i> +91 9711569678</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
    <script src="<?php echo base_url();?>assets/main/js/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/main/js/custom.js"></script>

	<script>
    $("#files").on('change', function () {
        var file = $('#files')[0].files[0].name;
        if (file.length > 0) {
			console.log("file uploaded");
            $("#description").removeAttr('required');
        }
        if (file.length == 0) {
            $("#description").attr('required',required);

        }
    })
	
    $("#description").on('keyup', function () {
        var val = $("#description").val();
        if (val.length > 0) {
            $("#files").removeAttr('required');
        }
        if (val.length == 0) {
            $("#files").attr('required',true);
        }
    })
</script>

<script>
    
    $('#reset').submit(function(e){
            e.preventDefault();
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
                    console.log("success");
                    if(response.status=="success"){
                        $("#h").text("Password reset sent")
                        $("#cont").text(response.message)
                        $("#reset").css("display","none");
                    }else{
                        $("#cont").text(response.message)
                    }
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
    
    <script>
        function openModalFunction() {
            $("#openPopup").css("display","block");
          }

        $("#orderform").submit(function(e){
            e.preventDefault();
            var form = $("#orderform")[0];
            var data = new FormData(form);
            data.append("",'');
            var actionurl = $("#orderform").attr('action');
            openModalFunction();
            $.ajax({
                type:"POST",
                url:actionurl,
                data:data,
                cache: false,
                processData: false,
                contentType: false,
                success:function(data){
                }
            })
        })


    </script>
    <script>
        $('#login_form').submit(function(e){
            e.preventDefault();
            $("#loading").css({"display":"block"});
            var form = $("#login_form")[0];
            var data = new FormData(form);
            data.append("login",'login');
            console.log("form submitted");
            var actionurl = $("#login_form").attr('action');
            $.ajax({
                type:"POST",
                url:actionurl,
                data:data,
                cache: false,
                processData: false,
                contentType: false,
                success:function(data){
                    $("#loading").css({"display":"none"});
                    console.log("success");
                    var response = JSON.parse(data);
                    console.log(response.order);
                    if(response.order=="YES"){
                        var order_id = response.order_id;
						order_id =order_id.toLocaleLowerCase();
                        window.location.href = '<?php echo base_url();?>dashboard/tracking/'+order_id;
                    }
                    else if(response.status=="error"){
                        $(".epError").text(response.msg);
                    }
                    else{
                        window.location.href = '<?php echo base_url();?>dashboard/old-user/';
                    }
                }
            })
        })
        // sign_up
        $('#sign_up').submit(function(e){
            e.preventDefault();
            $("#loading").css({"display":"block"});
            var form = $("#sign_up")[0];
            var data = new FormData(form);
            data.append("sign_up",'sign_up');
            var actionurl = $("#sign_up").attr('action');
            console.log("form submitted")
            $.ajax({
                type:"POST",
                url:actionurl,
                data:data,
                cache: false,
                processData: false,
                contentType: false,
                success:function(data){
                    $("#loading").css({"display":"none"});
                    var response = JSON.parse(data);
                    if(response.status=="success"){
                        if(response.order == "YES"){
                            var order_id = response.order_id;
							order_id =order_id.toLocaleLowerCase();
                            window.location.href = '<?php echo base_url();?>dashboard/tracking/'+order_id;
                        }
                        else{
                            window.location.href = '<?php echo base_url();?>dashboard/new-user/';
                        }
                    }
                    else{
                        var content = response.msg
                        $('.err_msz').text(content)
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
			var password = document.getElementById("password");
			if (password.type === "password") {
				password.type = "text";
			} else {
				password.type = "password";
			}
			var cpassword = document.getElementById("createPassword");
			if (cpassword.type === "password") {
				cpassword.type = "text";
			} else {
				cpassword.type = "password";
			}
		}

		$(".popup_loginBtn").click(function() {
			$(".login_form").toggle("slow");
			$(".form_box").addClass("loginFormBox");
			$(".SignUp_form").toggle("slow");
		});

		$(".popup_SignUpBtn").click(function() {
			$(".login_form").toggle("slow");
			$(".form_box").removeClass("loginFormBox");
			$(".SignUp_form").toggle("slow");
		});
		$(".fg_pass").click(function() {
			$(".resetPassword").toggle("slow");
			$(".form_box").removeClass("loginFormBox");
			$(".form_box").toggleClass("formSpacing");
			$(".login_form .login_inn").toggle("slow");
		});
	</script>

	<script>
		AOS.init({
			offset: 250,
			duration: 600
		});
	</script>
	<script>
		var swiper = new Swiper(".mySwiper", {
			effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: "auto",
			loop: true,
			coverflowEffect: {
				rotate: 0,
				stretch: 0,
				depth: 100,
				modifier: 3,
				slideShadows: true,
			},
			pagination: {
				el: ".swiper-pagination",
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});




		$(document).ready(function() {
			$("#files").click(function() {
				$("#fileinput-button").addClass("fileAtached");
				var Filelist = $("#Filelist").height();
				if ($("#Filelist").height() >= 30) {
					$("#fileinput-button").addClass("fileAtached");
				} else {

				}
			});
		});


		$(".getStarted").click(function() {
			$(".textarea").focus();
		});


		$(".story_box_btn").click(function() {
			$(".story_box").toggleClass("height");
		});


		$(".check_box").click(function() {
			$(this).toggleClass("checked");
			$(".check_box.checked").parent().addClass("green");
		});



		$(".view_more").click(function() {
			$(".one_place").toggleClass("height");
		});


		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			if (scroll >= 120) {
				$("header").addClass("fixed");
			} else {
				$("header").removeClass("fixed");
			}
		});






		//I added event handler for the file upload control to access the files properties.
		document.addEventListener("DOMContentLoaded", init, false);

		//To save an array of attachments
		var AttachmentArray = [];

		//counter for attachment array
		var arrCounter = 0;

		//to make sure the error message for number of files will be shown only one time.
		var filesCounterAlertStatus = false;

		//un ordered list to keep attachments thumbnails
		var ul = document.createElement("ul");
		ul.className = "thumb-Images";
		ul.id = "imgList";

		function init() {
			//add javascript handlers for the file upload event
			document
				.querySelector("#files")
				.addEventListener("change", handleFileSelect, false);
		}

		//the handler for file upload event
		function handleFileSelect(e) {
			//to make sure the user select file/files
			if (!e.target.files) return;

			//To obtaine a File reference
			var files = e.target.files;

			// Loop through the FileList and then to render image files as thumbnails.
			for (var i = 0, f;
				(f = files[i]); i++) {
				//instantiate a FileReader object to read its contents into memory
				var fileReader = new FileReader();

				// Closure to capture the file information and apply validation.
				fileReader.onload = (function(readerEvt) {
					return function(e) {
						//Apply the validation rules for attachments upload
						ApplyFileValidationRules(readerEvt);

						//Render attachments thumbnails.
						RenderThumbnail(e, readerEvt);

						//Fill the array of attachment
						FillAttachmentArray(e, readerEvt);
					};
				})(f);

				// Read in the image file as a data URL.
				// readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
				// More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
				fileReader.readAsDataURL(f);
			}
			document
				.getElementById("files")
				.addEventListener("change", handleFileSelect, false);
		}

		//To remove attachment once user click on x button
		jQuery(function($) {
			$("div").on("click", ".img-wrap .close", function() {
				var id = $(this)
					.closest(".img-wrap")
					.find("img")
					.data("id");

				//to remove the deleted item from array
				var elementPos = AttachmentArray.map(function(x) {
					return x.FileName;
				}).indexOf(id);
				if (elementPos !== -1) {
					AttachmentArray.splice(elementPos, 1);
				}

				//to remove image tag
				$(this)
					.parent()
					.find("img")
					.not()
					.remove();

				//to remove div tag that contain the image
				$(this)
					.parent()
					.find("div")
					.not()
					.remove();

				//to remove div tag that contain caption name
				$(this)
					.parent()
					.parent()
					.find("div")
					.not()
					.remove();

				//to remove li tag
				var lis = document.querySelectorAll("#imgList li");
				for (var i = 0;
					(li = lis[i]); i++) {
					if (li.innerHTML == "") {
						li.parentNode.removeChild(li);
					}
				}
			});
		});

		//Apply the validation rules for attachments upload
		function ApplyFileValidationRules(readerEvt) {
			//To check file type according to upload conditions
			if (CheckFileType(readerEvt.type) == false) {
				alert(
					"The file (" +
					readerEvt.name +
					") does not match the upload conditions, You can only upload jpg/png/gif files"
				);
				e.preventDefault();
				return;
			}

			//To check file Size according to upload conditions
			// if (CheckFileSize(readerEvt.size) == false) {
			//   alert(
			//     "The file (" +
			//       readerEvt.name +
			//       ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
			//   );
			//   e.preventDefault();
			//   return;
			// }

			//To check files count according to upload conditions
			if (CheckFilesCount(AttachmentArray) == false) {
				if (!filesCounterAlertStatus) {
					filesCounterAlertStatus = true;
					alert(
						"You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
					);
				}
				e.preventDefault();
				return;
			}
		}

		//To check file type according to upload conditions
		function CheckFileType(fileType) {
			if (fileType == "image/jpeg") {
				return true;
			} else if (fileType == "image/png") {
				return true;
			} else if (fileType == "image/gif") {
				return true;
			} else {
				return false;
			}
			return true;
		}

		//To check file Size according to upload conditions
		function CheckFileSize(fileSize) {
			if (fileSize < 300000) {
				return true;
			} else {
				return false;
			}
			return true;
		}

		//To check files count according to upload conditions
		function CheckFilesCount(AttachmentArray) {
			//Since AttachmentArray.length return the next available index in the array,
			//I have used the loop to get the real length
			var len = 0;
			for (var i = 0; i < AttachmentArray.length; i++) {
				if (AttachmentArray[i] !== undefined) {
					len++;
				}
			}
			//To check the length does not exceed 10 files maximum
			if (len > 9) {
				return false;
			} else {
				return true;
			}
		}

		//Render attachments thumbnails.
		function RenderThumbnail(e, readerEvt) {
			var li = document.createElement("li");
			ul.appendChild(li);
			li.innerHTML = [
				'<div class="img-wrap"> <span class="close" id="close">&times;</span>' +
				'<img class="thumb" src="',
				e.target.result,
				'" title="',
				escape(readerEvt.name),
				'" data-id="',
				readerEvt.name,
				'"/>' + "</div>"
			].join("");


			var div = document.createElement("div");
			div.className = "FileNameCaptionStyle";
			li.appendChild(div);
			div.innerHTML = [readerEvt.name].join("");
			document.getElementById("Filelist").insertBefore(ul, null);
		}

		//Fill the array of attachment
		function FillAttachmentArray(e, readerEvt) {
			AttachmentArray[arrCounter] = {
				AttachmentType: 1,
				ObjectType: 1,
				FileName: readerEvt.name,
				FileDescription: "Attachment",
				NoteText: "",
				MimeType: readerEvt.type,
				Content: e.target.result.split("base64,")[1],
				FileSizeInBytes: readerEvt.size
			};
			arrCounter = arrCounter + 1;
		}






		$(".btn_con a").click(function() {
			$(this).addClass("active");
			$(this).next().removeClass("active");
			$(this).prev().removeClass("active");
		});



		(function($) {
			$.fn.menumaker = function(options) {
				var cssmenu = $(this),
					settings = $.extend({
						format: "dropdown",
						sticky: false
					}, options);
				return this.each(function() {
					$(this).find(".button").on('click', function() {
						$(this).toggleClass('menu-opened');
						$("body").toggleClass('menu_open');
						var mainmenu = $(this).next('ul');
						if (mainmenu.hasClass('open')) {
							mainmenu.slideToggle().removeClass('open');
						} else {
							mainmenu.slideToggle().addClass('open');
							if (settings.format === "dropdown") {
								mainmenu.find('ul').show();
							}
						}
					});
					cssmenu.find('li ul').parent().addClass('has-sub');
					multiTg = function() {
						cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
						cssmenu.find('.submenu-button').on('click', function() {
							$(this).toggleClass('submenu-opened');
							if ($(this).siblings('ul').hasClass('open')) {
								$(this).siblings('ul').removeClass('open').slideToggle();
							} else {
								$(this).siblings('ul').addClass('open').slideToggle();
							}
						});
					};
					if (settings.format === 'multitoggle') multiTg();
					else cssmenu.addClass('dropdown');
					if (settings.sticky === true) cssmenu.css('position', 'fixed');
					resizeFix = function() {
						var mediasize = 1000;
						if ($(window).width() > mediasize) {
							cssmenu.find('ul').show();
						}
						if ($(window).width() <= mediasize) {
							cssmenu.find('ul').hide().removeClass('open');
						}
					};
					resizeFix();
					return $(window).on('resize', resizeFix);
				});
			};
		})(jQuery);

		(function($) {
			$(document).ready(function() {
				$("#cssmenu").menumaker({
					format: "multitoggle"
				});
			});
		})(jQuery);
	</script>

</body>

</html>