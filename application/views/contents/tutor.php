
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://unpkg.com/phosphor-icons"></script>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/front/images/fav.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/tutors/css/styles-tutor-new.css">
  <title>Tutor</title>
  <script src="<?php echo base_url();?>assets/tutors/js/jquery.js"></script>
  <style>
    .procedure1 {
  background-image: url("<?php echo base_url();?>assets/tutors/images/procedure1.svg");
  }

  .procedure2 {
    background-image: url("<?php echo base_url();?>assets/tutors/images/procedure2.svg");
  }

  .procedure3 {
    background-image: url("<?php echo base_url();?>assets/tutors/images/procedure3.svg");
  }

  .procedure4 {
    background-image: url("<?php echo base_url();?>assets/tutors/images/procedure4.svg");
  }

    .testimonals {
    background-color: #FFFFFF;
    background-image: url("<?php echo base_url();?>assets/tutors/images/tesimonialbg.png");
    background-size: cover;
    padding-bottom: 40px;
  }
    .button1 {
      display: inline-block;
      border-radius: 40px;
      background-color: #47bf7f;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 21px;
      padding: 10px;
      width: 225px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
      font-family: 'Noto Sans TC', sans-serif;
    }

    .button1 span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    /* .button span:after{
	content: '\003E';
} */
    .button1 span:after {
      content: '\003E';
      position: absolute;
      opacity: 1;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }

    .button1:hover {
      background-color: #0e9d56;
    }

    .button1:hover span {
      padding-right: 25px;
    }

    .button1:hover span:after {
      content: '\2192';
      opacity: 1;
      right: 0;

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
<body>
    <div id="loading"></div>
  <!-- Navbar -->
  <div class="navbar">
    <div class="topnav" id="myTopnav">
      <a href="/" class="active"><img src="<?php echo base_url();?>assets/tutors/images/logo.png"></a>
      <a class="link" href="#procedure">How it Works</a>
      <a class="link" href="#benefits">Benefits</a>
      <a class="link" href="#work">Work Description</a>
      <a class="link" href="#testimonial">Testimonial</a>
      <a class="link" href="#faqs">FAQ's</a>
      <!-- <a href="#form" class="button"><button class="button log-in">Log In <span class="arrow"></span></button></a> -->
      <a style="color: white; text-decoration: none; padding: 6px 0px;" href="#form" id="url"><button class="button1" style="vertical-align:middle; width: 130px;"><span>Log In </span></button></a>
      <!-- <a href="/tutor/register/" class="button"><button class="button sign-up">Sign Up <span class="arrow"></span></button></a> -->
      <a style="color: white; text-decoration: none; padding: 6px 0px;" href="<?php echo base_url();?>tutor/register/" id="url"><button class="button1" style="vertical-align:middle; width: 130px;"><span>Sign Up </span></button></a>
      <a href="javascript:void(0);" for="show-menu" class="icon" onclick="myFunction()">
        <i id="bars_icon" class="fa fa-bars"></i>
      </a>

      <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }

          var x = document.getElementById("bars_icon");
          if (x.className === "fa fa-bars") {
            x.className = "fa fa-close";
          } else {
            x.className = "fa fa-bars";
          }
        }
      </script>
      
    </div>
  </div>
  <!--<div class="container">
      <div class="col-md-6" style="padding:60px">
           <p class="heading">This page is under maintenance.</span></p>
      </div>
  </div>-->

  <!-- Landing page -->
  <div class="landing">
    <div class="slide-in landing-left">

      <p class="heading">Online Tutoring Jobs at <span class="green">TutorChamps</span></p>

      <p class="text ce">
        Come work with us if you're seeking a rewarding career as a professional tutor providing assignment help.<br><br>        
        Earn good money by solving homework problems!
      </p>
      <center>
        <img class="tutor-image" src="<?php echo base_url();?>assets/tutors/images/landing.svg">
      </center>

    </div>



    <div class="slide-in landing-right" id="form">
      <p class="motto"><span class="green">Learn - Educate - Earn</span></p>

      <!-- Form -->
    <center>
      <form method="post" id="login-form" action="<?php echo base_url()?>tutor/index/">
        <center>
          <p class="form-heading">Sign In to Work</p>
          
          <div class="input-field"> 
            <i class="ph-at"></i>
            <input name="email" id="emailid" type="email" required><br>
          </div>
          <div class="input-field">
            <i class="ph-lock-key"></i>
            <input name="password" type="password" id="password" name="password" required>
            <i class="ph-eye" type="button" id="eye" onclick="showPassword()" style="cursor: pointer;"></i>
          </div>
          <span style="color:red;"><?php echo $this->session->flashdata('success_msg'); $this->session->set_flashdata('success_msg', '');?></span>
           <p class="forgot-pw" id="forgotpw">Forgot password?</p> 
          <!-- <button type="submit" class="button button-form">Sign IN<span class="arrow"></span></button> -->
          <button type ="submit" class="button1" style="vertical-align:middle; width: 120px;"><span><a style="color: white; text-decoration: blink;" id="url">Sign In</a> </span></button>
          <input type="hidden" name="tutor_sign_in" id="tutor_sign_in" value="1">
        </center>
      </form>
    </center>

    <script>
      function showPassword() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>

    <div class="features">
      <div class="feature1">
        <center><img class="feature-image" src="<?php echo base_url();?>assets/tutors/images/feature1.svg"></center>
        <p class="feature-text">100% Genuine Website</p>
      </div>
      <div class="feature2">
        <center><img class="feature-image" src="<?php echo base_url();?>assets/tutors/images/feature2.svg"></center>
        <p class="feature-text">Simplest Registration Process</p>
      </div>
      <div class="feature3">
        <center><img class="feature-image" src="<?php echo base_url();?>assets/tutors/images/feature3.svg"></center>
        <p class="feature-text">3000+ Tutors in the team</p>
      </div>
    </div>

    </div>
    <!-- Popup -->
    <div class="popup" id="popup">
      <div class="popup-content">
        <span class="close">&times;</span>
        <h1 class="popup-heading" id="h">Reset Password</h1>
        <p id="cont">Forgotten your password? Enter your email address below, and we'll email instructions for setting a new one.</p>
        <center>
		      	<form method="POST" id="reset" action="<?php echo base_url('password_reset/');?>">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
			       <div class="input-field">
				      <i class="ph-at"></i>
              			<input name="email" id="emailid" type="email" required><br>
              			<input type="hidden" name="reset_pass" value="1">
            		</div>
            		<button type="submit" class="button button-form button-forgotpw">Mail Me<span class="arrow"></span>
            		</button>
          	</form>
        </center>
      </div>
    </div>

    <script>
      const swipers = document.querySelectorAll(".slide-in");

      const slideInOptions = {
        threshold: 1,
        rootMargin: "0px 0px -250px 0px"
      };


      const slideInOnScroll = new IntersectionObserver(function (
        entries,
        slideInOnScroll
      ) {
        entries.forEach(entry => {
          if (!entry.isIntersecting) {
            return;
          } else {
            entry.target.classList.add("appear");
            slideInOnScroll.unobserve(entry.target);
          }
        });
      },
        slideInOptions);

      sliders.forEach(slider => {
        slideInOnScroll.observe(slider);
      });
    </script>
    
    <script>
      var popup = document.getElementById("popup");
      var btn = document.getElementById("forgotpw");
      var span = document.getElementsByClassName("close")[0];
      var btnemail = document.getElementsByClassName("button-forgotpw")
      btn.onclick = function () {
        popup.style.display = "block";
      }
      span.onclick = function () {
        popup.style.display = "none";
      }
      btnemail.onclick = function () {
        popup.style.display = "none";
      }
      window.onclick = function (event) {
        if (event.target == popup) {
          popup.style.display = "none";
        }
      }
    </script>

  </div>

  <!-- Who are we  -->
  <div class="intro" id="intro">
    <p class="primary-heading"><span class="green">Who </span>are we</p>
    
    <p class="fade content">
      TutorChamps is a new online learning platform committed to making your academic path as smooth and successful as possible. We provide two types of services for the student: real-time question answering and deadline based online homework help service. Our tutors are all enthusiastic about their fields of specialization and willing to support students in their academic journey. <br><br>
      We are the best platform for giving tutors a chance to develop and make money while they are simply sitting in one place. Therefore, the reason you should choose us is that we give tutors the flexibility they need to work and earn as much as possible. So registering yourself as a tutor at TutorChamps will help you to become more optimistic and you to enjoy the maximum profit and revenue. <br><br>
      Our online tutoring platform makes it easy, flexible, and convenient to interact with students (and make extra money!).
    </p>

    <img class="decoration" src="<?php echo base_url();?>assets/tutors/images/design.png">
  </div>

  <!-- Why join tutorchamps -->
  <div class="reasons" id="benefits">
    <p class="primary-heading">Why join <span class="green">TutorChamps Tutor’s Team?</span></p>

    <div class="container">
      <div class="slide-in left-1"></div>
      <div class="slide-in right-1">
        <div class="benefit-content">
          <p class="secondary-heading">Choose topic as per your expertise</p>
            <p class="blog-content">Choose any topic that interests you and share your expertise with college or university students to help them study and excel in their classes so that they can graduate confident and prepared.</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="slide-in right-2 right-2-1"></div>
      <div class="slide-in left-2">
        <div class="benefit-content">
          <p class="secondary-heading">Work from anywhere</p>
            <p class="blog-content">All you need is a computer and an internet connection, you can do your tutoring work online anytime and from anywhere. Simply log on when you’re available and work remotely.</p>
        </div>
      </div>
      <div class="slide-in right-2"></div>
    </div>
    <div class="container">
      <div class="slide-in left-3"></div>
      <div class="slide-in right-3">
        <div class="benefit-content">
          <p class="secondary-heading">Excellent knowledge and enhanced knowledge</p>
            <p class="blog-content">Our top tutors earn over INR 60,000 per month by answering or solving assignment problems in their area of ​​expertise. No invoice is required; just be paid on time.</p>
        </div>
      </div>
    </div>

    <script>
      const sliders = document.querySelectorAll(".slide-in");

      const slideOptions = {
          threshold: 0,
          rootMargin: "0px 0px -250px 0px"
        };


      const slideOnScroll = new IntersectionObserver(function (
          entries,
          slideOnScroll
        ) {
          entries.forEach(entry => {
            if (!entry.isIntersecting) {
              return;
            } else {
              entry.target.classList.add("appear");
              slideOnScroll.unobserve(entry.target);
            }
          });
        },
          slideOptions);

          sliders.forEach(slider => {
              slideOnScroll.observe(slider);
            });
    </script>

  </div>

  <!-- How it works -->
  <div class="procedure" id="procedure">
    <p class="primary-heading"><span class="green">How</span> it works</p>

    <div class="swiper-container fade">
      <div class="swiper-wrapper">
    
        <div class="swiper-slide">
          <div class="swiper-content">
            <div class="procedure-slide procedure1">
            </div>
            <div class="procedure-text">
              <p class="procedure-name">Register Yourself</p>
              <p class="procedure-number">Step 1</p>
              <p class="procedure-explanation">Please use your active email address to register on our website. After registration, you will have to pass a screening test which will be based on your selected subject. Your test result will be sent to your registered email or displayed on the website.</p>
            </div>
          </div>
        </div>
    
        <div class="swiper-slide">
          <div class="swiper-content">
            <div class="procedure-slide procedure2">
            </div>
            <div class="procedure-text">
              <p class="procedure-name">Get Questions</p>
              <p class="procedure-number">Step 2</p>
              <p class="procedure-explanation">Once you become a tutor at TutorChamps only then you will be able to solve assignment/homework problems. You have to solve the given assignments and homework questions and submit them before the deadline.</p>
            </div>
          </div>
        </div>
    
        <div class="swiper-slide">
          <div class="swiper-content">
            <div class="procedure-slide procedure3">
            </div>
            <div class="procedure-text" style="padding: 12px;">
              <p class="procedure-name">Submit Solutions</p>
              <p class="procedure-number">Step 3</p>
              <p class="procedure-explanation">Adhere to the deadlines and submit the complete solutions in a step-by-step manner. You have to solve the questions or assignments as per the instructions given by the student(s). You can also go for revision or any kind of rectification if you are asked to make some changes by the student.</p>
            </div>
          </div>
        </div>
    
        <div class="swiper-slide">
          <div class="swiper-content">
            <div class="procedure-slide procedure4">
            </div>
            <div class="procedure-text">
              <p class="procedure-name">Get Paid</p>
              <p class="procedure-number">Step 4</p>
              <p class="procedure-explanation">Once your solution is approved by our quality check team, you can get paid between INR 460-600 per question and INR 200-4000 respectively for the assignment. Payment is done instantly and is automatically deposited into your bank account.</p>
            </div>
          </div>
        </div>
    
      </div>
      <div class="swiper-pagination"></div>
    </div>
    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
        pagination: {
          el: '.swiper-pagination',
        },
      });

    </script>
// <script>
// 	$('#reset').submit(function(e){
// 		e.preventDefault();
//         $("#loading").css({'display','block'})
// 		var form = $('#reset')[0];
// 		var form_data = new FormData(form);
// 		var actionurl = $("#reset").attr("action");
// 		$('.button-forgotpw').html('Please wait...');
// 		$.ajax({
// 			type:"POST",
// 			url:actionurl,
// 			data:form_data,
// 			cache: false,
// 			processData: false,
// 			contentType: false,
// 			success:function(data){ 
// 			       $("#loading").css({'display','none'})
// 			    var response = JSON.parse(data);
// 				if(response.status=="success"){ 
// 					$("#h").text("Password reset sent");
// 					$("#cont").text(response.message);
// 					$("#reset").css("display","none");
// 				}else{
// 				    $("#cont").text(response);
// 				}
// 				$('.button-forgotpw').html('Mail Me <span class="arrow"></span>');
// 			}
			
// 		})
// 		.done(function(){
// 			console.log("done")
// 		})
// 		.fail(function(){
// 			console.log("fail")
// 		})
		
// 	})
    
// </script>
<script>
    
    $('#reset').submit(function(e){
            e.preventDefault();
            //  $("#loading").css({'display','block'})
            var form = $('#reset')[0];
            var form_data = new FormData(form);
            form_data.append("reset_pass",'reset_pass')
            var actionurl = $("#reset").attr("action");
            // $('.button-forgotpw').html('Please wait...');
            $.ajax({
                type:"POST",
                url:actionurl,
                data:form_data,
                cache: false,
                processData: false,
                contentType: false,
                success:function(data){
                    //  $("#loading").css({'display','none'})
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
                // $('.button-forgotpw').html('Mail Me <span class="arrow"></span>');

            })
            .done(function(){
                console.log("done")
            })
            .fail(function(){
                console.log("fail")
            })

        })
</script>
  <!-- Work in brief -->
  <div class="work" id="work">
    <p class="primary-heading"><span class="green">Work</span> in brief</p>
      
    <div class="fade work-grid">
      <div class="deadline">
        <center><img src="<?php echo base_url();?>assets/tutors/images/deadline.jpg" alt="" class="deadline-image"></center>
        <div class="deadline-text">
          <p class="work-heading">Deadline based Work</p>
          <p class="work-explanation">
          <p style="padding-bottom: 10px;">Solve the assignments within the stipulated time frame.</p>
          <ul style="padding-left: 15px;">
            <li>Accept assignments based on your availability and knowledge.</li>
            <li>Giving 100% plagiarism-free, unique and precise solutions in a step-by-step manner.</li>
            <li>Make sure you submit every solution before the due date.</li>
            <li>Submit a copied solution or failure to meet the deadlines may result in account termination.</li>
          </ul>
          </p>
        </div>
      </div>
    
      <div class="live-sesson">
        <center><img src="<?php echo base_url();?>assets/tutors/images/live.jpeg" alt="" class="live-session-image"></center>
        <div class="live-session-text">
          <p class="work-heading">Live Sessions</p>
          <p class="work-explanation">
          <p style="padding-bottom: 10px;">Engage students in real-time conversation to assist them in resolving their problems.</p>
          <ul style="padding-left: 15px;">
            <li>Depending on your availability and skills, accept a session.</li>
            <li>Be prepared by carefully reading the reference material in advance.</li>
            <li>Be available and reachable for the duration of the accepted session.</li>
            <li>Give quick, direct answers in a step-by-step manner.</li>
          </ul>
          </p>
        </div>
      </div>
    </div>

    </div>

    <!-- Testimonals -->
    <div class="testimonals" id="testimonial">

      <p class="primary-heading">Testimonials</p>
      
        <div class="fade testimonial-box">
          <div id="slide">
        
            <div class="card">
              <div class="profile">
                <img class="tutor-testimonial-image" src="<?php echo base_url();?>assets/tutors/images/tutor1.jpg">
                <div class="profile-text">
                  <h4 class="customer-name">Aishwarya Singh</h4>
                  <p class="customer-role">A Math expert</p>
                </div>
              </div>
              <p class="review">"My tutoring on TutorChamps has helped me improve my mathematical abilities, earn money to pay for my schooling, and fit tutoring around my class schedule as I work for a Master's in computer science."
              </p>
            </div>
        
            <div class="card">
              <div class="profile">
                <img class="tutor-testimonial-image" src="<?php echo base_url();?>assets/tutors/images/tutor2.jpg">
                <div class="profile-text">
                  <h4 class="customer-name">Manish Arora</h4>
                  <p class="customer-role">An Accounting expert</p>
                </div>
              </div>
              <p class="review">"Through TutorChamps, I can be a valuable study resource for students all over the world while also supplementing my full-time teaching profession."
              </p>
            </div>
        
            <div class="card">
              <div class="profile">
                <img class="tutor-testimonial-image" src="<?php echo base_url();?>assets/tutors/images/tutor3.jpg">
                <div class="profile-text">
                  <h4 class="customer-name">Kritika Jain</h4>
                  <p class="customer-role">A Biology expert</p>
                </div>
              </div>
              <p class="review">"Overall, a great place to work with the possibility to apply my expertise to assist students in their academic success. I love working here, and the hours are flexible."
              </p>
            </div>
        
            <div class="card">
              <div class="profile">
                <img class="tutor-testimonial-image" src="<?php echo base_url();?>assets/tutors/images/tutor4.jpg">
                <div class="profile-text">
                  <h4 class="customer-name">Hitesh Daswani</h4>
                  <p class="customer-role">A Nursing expert</p>
                </div>
              </div>
              <p class="review">"Being an expert, I have answered questions of the highest caliber, enhancing my knowledge and expertise. You can employ your knowledge to the greatest extent on our platform. All thanks go to TutorChamps for providing the chance to work as a tutor on this website."
              </p>
            </div>
        
            <div class="card">
              <div class="profile">
                <img class="tutor-testimonial-image" src="<?php echo base_url();?>assets/tutors/images/tutor5.jpg">
                <div class="profile-text">
                  <h4 class="customer-name">Anamika Gujral</h4>
                  <p class="customer-role">A Chemistry expert</p>
                </div>
              </div>
              <p class="review">"Working with TutorChamps has been a pleasure because it gives tutors a nice platform to put their newly acquired talents to use and make good money. As and when the tutor is free and available to work on the specified duties, TutorChamps offers an excellent way to work part-time with flexible hours."
              </p>
            </div>
        
          </div>
        
          <div class="sidebar">
            <img src="<?php echo base_url();?>assets/tutors/images/up.png" id="up">
            <img src="<?php echo base_url();?>assets/tutors/images/down.png" id="down">
          </div>
        
        </div>
        
        <script>
          var slide = document.getElementById("slide");
          var up = document.getElementById("up");
          var down = document.getElementById("down");

          let x = 0;

          down.onclick = function () {
            if (x > "-1200") {
              x = x - 300;
              slide.style.top = x + "px";
            }
          }

          up.onclick = function () {
            if (x < "0") {
              x = x + 300;
              slide.style.top = x + "px";
            }
          }

        </script>
        
        </div>
    </div>


    <!-- FAQs -->
    <div class="faqs" id="faqs">
      <p class="primary-heading">FAQ's</p>
      <div class="fade faq-grid">
        <div class="faq-left">
          <p class="faq-content">You must be wondering why you want to be a part of our online tutoring tribe. Check out our FAQs to get all your questions answered!<br><br>
          </p>
          <img class="faq-image" src="<?php echo base_url();?>assets/tutors/images/faqs.svg">
        </div>
        <div class="faq-right">
          <div class="faq">
            <button class="question">Is it necessary to be a certified tutor or professor to be a TutorChamps tutor?</button>
            <div class="answer">
              <p>We don't insist that you must be a certified professor or tutor because we think that experts come in all forms. You must, however, provide enough documentation to demonstrate your knowledge of the subjects you wish to tutor.</p>
            </div>
          </div>

          <div class="faq">
            <button class="question">What qualifications must I have to tutor with TutorChamps?</button>
            <div class="answer">
              <p> All tutors must be at least 18 years old and should have enrolled in or graduated from a reputable university. You must be thorough in your area of expertise. 10+2 holders are not accepted.</p>
            </div>
          </div>

          <div class="faq">
            <button class="question">Is it necessary for me to tutor for a certain amount of time or to answer a certain number of questions?</button>
            <div class="answer">
              <p>No, you are not obliged to tutor for a specific duration or respond to a predetermined number of questions. This is a position for an independent contractor. However, the more opportunities you'll have to make money, the higher your rating will be.</p>
            </div>
          </div>

          <div class="faq">
            <button class="question">How long should I anticipate waiting to hear about my request for a tutor?</button>
            <div class="answer">
              <p>Usually, you'll get a response from us in 1-3 business days. Occasionally, during periods of strong demand or vacations, it can take us longer.</p>
            </div>
          </div>

          <div class="faq">
            <button class="question">Can I cancel a session that I agreed to attend?</button>
            <div class="answer">
              <p>Even though we strongly advise against it, we do acknowledge that emergencies can occasionally arise. In such circumstances, the tutor is required to inform the operations team 1 day before or at least 10 hours before the session. A session that is missed will result in a tutor receiving a zero-rating.</p>
            </div>
          </div>

          <div class="faq">
            <button class="question">Do I need a full background check?</button>
            <div class="answer">
              <p>Registration as a tutor on the website doesn't call for a background check. Students are free to pay for background checks on potential tutors. You need to pass our background check to work with any TutorChamps user.</p>
            </div>
          </div>

          <div class="faq">
            <button class="question">If I sign up to be a tutor, what is my legal connection to TutorChamps?</button>
            <div class="answer">
              <p>By enrolling with TutorChamps, you consent to work as an independent contractor. This implies that you and TutorChamps do not have an employment connection. Therefore, you are only compensated for completing assignments or responding to questions from students. You also have the flexibility and freedom to complete this work whenever and wherever you please.</p>
            </div>
          </div>

          <div class="faq">
            <button class="question">What softwares and materials do I need to work as a tutor?</button>
            <div class="answer">
              <p>Various online calculators, subject-specific engineering software, PDF conversion software, and textbooks that you will need to use. Copying is prohibited. Tutors must change their answers if they have already answered the same question in the past before submitting them again since they cannot submit the same answer twice for the same question.</p>
            </div>
          </div>
          
        </div>
        <script>
          var ques = document.getElementsByClassName("question");
          var i;

          for (i = 0; i < ques.length; i++) {
            ques[i].addEventListener("click", function () {
              this.classList.toggle("live");
              var answer = this.nextElementSibling;
              if (answer.style.maxHeight) {
                answer.style.maxHeight = null;
              } else {
                answer.style.maxHeight = answer.scrollHeight + "px";
              }
            });
          }
        </script>
      </div>
    </div>
    


    <div class="footer fade">
      <div class="footer-grid">
        <div class="apply">
          <div class="logo"><img src="<?php echo base_url();?>assets/tutors/images/logo.png"></div>
          <p class="apply-text">Everyone wants to earn money but how amazing it is that you can earn money by enjoying your passion. Register as a tutor
          at TutorChamps and solve student homework problems and get paid high in return on a daily basis. So why are you waiting?
          <span class="footer-link">Apply Today!</span></p>
          <div class="contact-buttons">
            <a target="_blank" style="text-decoration: none" href="https://www.instagram.com/tutorchampsofficial/"><i class="ph-instagram-logo"></i></a>
            <a target="_blank" style="text-decoration: none" href="https://www.facebook.com/tutorchampsofficial"><i class="ph-facebook-logo"></i></a>
            <a target="_blank" style="text-decoration: none" href="https://www.youtube.com/channel/UCFqnDc2JsWYJmDTG1eQyQCg"><i class="ph-youtube-logo"></i></a>
            <a target="_blank" style="text-decoration: none" href="https://twitter.com/TutorchampsO1"><i class="ph-twitter-logo"></i></a>
            <i class="ph-linkedin-logo"></i>
          </div>
        </div>
        <div class="quick-links">
          <div class="footer-header">Quick Links</div>
          <div class="links-footer">
            <a class="link-footer" href="#procedure">How it Works</a>
            <a class="link-footer" href="#benefits">Benefits</a>
            <a class="link-footer" href="#work">Work Description</a>
            <a class="link-footer" href="#testimonial">Testimonial</a>
            <a class="link-footer" href="#faqs">FAQ's</a>
          </div>
        </div>
        <div class="contact-us">
          <div class="footer-header">Contact Us</div>
          <p class="contact-text">
            Any question? Reach out to us and we'll get back to you shortly.
          </p>
          <a style="color: black; text-decoration: none;" href="mailto:tutors@tutorchamps.com"><div class="email"><i class="ph-envelope"></i> : tutors@tutorchamps.com</div></a>
          <a style="color: black; text-decoration: none;" href="https://wa.me/+919540989578"><div class="whatsapp"><i class="ph-whatsapp-logo"></i> : +91 9540989578</div></a>
        </div>
      </div>
      <div class="copyright">
        <p>Copyright 2022, All Rights Reserved</p>
        <p class="copyright-body"><b>Disclaimer:</b> TutorChamps is a Brand name of Exp Growth Business Solutions LLP. TutorChamps is an online learning platform
        that offers online homework help to the students. All of the work should be used in accordance with the regulations and
        laws that apply. It is further noted that the use of any photograph on the website, including any photograph of any
        educational institute/university, does not imply any link, partnership, or sponsorship between the company and the
        aforementioned educational institute/university. Any such use is solely for illustration reasons, and all intellectual
        property rights remain the property of their respective owners. To improve your experience, we use Google Analytics.
        There is no tracking of personal information.</p>
      </div>
    </div>

        <script>
          const faders = document.querySelectorAll(".fade")

          const appearOptions = {
            threshold: 0.2,
            rootMargin: "0px 0px -250px 0px"
          };

          const appearOnScroll = new IntersectionObserver(function (
            entries, appearOnScroll
          ) {
            entries.forEach(entry => {
              if (!entry.isIntersecting) {
                return;
              } else {
                entry.target.classList.add("appear");
                appearOnScroll.unobserve(entry.target);
              }
            });
          },
            appearOptions);

          faders.forEach(fader => {
            appearOnScroll.observe(fader);
          });
        </script>
       
    
</html>

</body> 
</html>
