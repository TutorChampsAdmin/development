<?php //$this->load->view('users/head');?>
<div class="mainContent DashboardContent">
<div class="head_content">
<h1>Order Tracking</h1>
</div>

<div class="live_session_content" style="height: auto;">

<div class="order_form_con">
<div class="order_form_innCon">  
<ul id="progressbar" class="progressbar">
<li class="active current">Order Created</li>
<li>Checking Tutor Availability</li>
<li>Awaiting Payment</li>
<li>Assignment In Progress</li>
<li>Give Feedback</li>
</ul>
<form class="order_form" id="order_form" action="" method="post"  enctype="multipart/form-data"  novalidate>
<div class="banner_form_con">
	<input type="hidden" name="order_id" value="<?php echo $order[0]['order_id'];?>" />
	<input type="hidden" name="current_status" value="<?php echo $order[0]['status'];?>" />
	<div class="first_step">
		<div class="form_head">
			<span class="pending_step"></span>
			<i style="display: none;" class="completed_step fa fa-check"></i>
			<h3><?php echo $order[0]['order_id'];?> - Cost Accounting  <input type="button" id="next" class=" toogelBtn" value=""><i class="fa fa-chevron-down"></i> </h3>
		</div>
		<div class="form_innBox">
			<div class="form_fields">
				<label>Description:</label>
				<textarea class="textarea readonlyControler" name="description" id="description" placeholder="Description"><?php echo $order[0]['description'];?> </textarea>
			</div>
			<div class="form_fields">
				<label>Question Files</label>
				<div class="upload_MFile">
					<span class="fileinput-button" id="fileinput-button">
			            <span><i class="fas fa-cloud-upload-alt" aria-hidden="true"></i><br><span>Drop your file or Browse</span> </span>
			            <input type="file" name="files" id="files" class="files" data-list="Filelist" multiple accept="image/jpeg, image/png, image/gif,"><br />
			        </span>
			        <output id="Filelist">
			        	 <?php 
							if($order[0]['assignment'])
							{
							   echo '<ul class="thumb-Images" id="imgList"><li>
							   <div class="img-wrap"> 
							   <span class="close">×</span>
							   <img class="thumb" src="'.base_url().$order[0]['assignment'].'" title="TicketCancle.PNG" data-id="TicketCancle.PNG">
							   </div>
							   <div class="FileNameCaptionStyle">TicketCancle.PNG
							   </div>
							   </li>
							   </ul>';
							}
			        	 ?>
			        </output>
			    </div>
			</div>
			<!--<div class="form_fields">-->
			<!--	<label>Select subject</label>-->
			<!--	<input class="subject input" type="text" placeholder="Select subject">-->
			<!--</div>-->
			<div class="form_fields">
				<label>Set Deadline</label>
				<div class="deadline_con">
    <input type="radio" id="6hrs" >
    <label for="6hrs" name="deadlineOption">6 hrs</label>
    <input type="radio" id="12hrs" >
    <label for="12hrs" name="deadlineOption">12 hrs</label>
    <input type="radio" id="18hrs" >
    <label for="18hrs" name="deadlineOption">18 hrs</label>
    <input type="radio" id="24hrs" >
    <label for="24hrs" name="deadlineOption">24 hrs</label>
    <input type="radio" id="30hrs" >
    <label for="30hrs" name="deadlineOption">30 hrs</label>
    <?php
        $dateVal = date('Y-m-d H:i:s');
        if ($order[0]['deadline'] != "1970-01-01 05:30:00" && $order[0]['deadline'] !="")
            $dateVal = date('Y-m-d H:i:s', strtotime($order[0]['deadline'])); 
    ?>
    <input class="input" type="datetime-local" data-val="<?php echo $dateVal ?>" value="<?php echo $dateVal; ?>" name="deadline" id="deadlineInput">
</div>
			</div>
			<div class="form_fields">
				<label>Reference Files</label>
				<div class="upload_MFile">
					<span class="fileinput-button" id="fileinput-button">
			            <span>
			            	<i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
			            	<br>
			            	<span>Drop your file or Browse</span> 
			             </span>
			            <input type="file" name="refFiles" id="refFiles" multiple accept="image/jpeg, image/png, image/gif,">
			            <br />
			        </span>
			        <output id="FilelistRef">
			        	<?php 
							if($order[0]['ref_files'])
							{
							   echo '<ul class="thumb-Images" id="imgList"><li>
							   <div class="img-wrap"> 
							   <span class="close">×</span>
							   <img class="thumb" src="'.base_url().$order[0]['ref_files'].'" title="TicketCancle.PNG" data-id="TicketCancle.PNG">
							   </div>
							   <div class="FileNameCaptionStyle">TicketCancle.PNG
							   </div>
							   </li>
							   </ul>';
							}
			        	 ?>
			        </output>
			    </div>
			</div>
			<div class="text-center mt-2">
				<?php if($order[0]['status']=='Awaiting Confirmation' || $order[0]['status']=='Checking Tutor Availability'){ ?>
				<button id="Submit"type="submit" class="r_btn">Submit</button>
			<?php } ?>
			</div>
		</div>
	</div> 
<!-- </form> -->
	<div class="Availability_step" style="display:none;">
		<div class="form_head">
			<span class="pending_step"></span>
			<i style="display: none;" class="completed_step fa fa-check"></i>
			<h3>Checking Tutor Availability <i class="fa fa-chevron-down"></i> <input type="button" id="availability_stepNext_btn" class="toogelBtn" value=""></h3>
		</div>
		<div class="form_innBox">
			<div class="assignmentProgressBox">
				<h4><div class="assignmentProgress"></div>We Checking Tutor Availability</h4>
				<p>Please Be Patient.</p>
			</div>			 
		</div>
	</div>

	<div class="Second_step" style="display:none;">
		<div class="form_head">
			<span class="pending_step"></span>
			<i style="display: none;" class="completed_step fa fa-check"></i>
			<h3>Payments <i class="fa fa-chevron-down"></i> <input type="button" id="second_stepNext_btn" class="toogelBtn" value=""></h3>
		</div>
		<div class="form_innBox">
			<div class="paymentInnBox">
				<h4>Make the Payment</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do consectetur adipisicing elit, sed do eiusmod. </p>
				
			</div>
			<div class="payment_done">
				<h4><i class="fas fa-check-circle"></i> Payment</h4>
				<p>Your payment has been received. Tutors have initiated the work on your assignment.</p>
			</div>
		</div>
	</div>
	<div class="third_step" style="display:none;">
		<div class="form_head">
			<span class="pending_step"></span>
			<i style="display: none;" class="completed_step fa fa-check"></i>
			<h3><?php echo ($order[0]['summited_assignment'] == "" || $order[0]['summited_assignment'] == null) ? "Assignment In Progress" : "Review Your Assignment"; ?>
			 <i class="fa fa-chevron-down"></i> <input type="button" id="third_stepNext_btn" class="toogelBtn" value=""></h3>
		</div>
		<div class="form_innBox">
           <?php 
           if($order[0]['summited_assignment']=="" || $order[0]['summited_assignment']==null)//reference_material
           { ?>
			<div class="assignmentProgressBox">
				<h4><div class="assignmentProgress"></div> Assignment in Progress</h4>
				<p>Your payment has been received. Tutors have initiated the work on your assignment.</p>
			</div>
		<?php } else { ?>
           <div class="assignmSolve1">
				<div>
					<h4><i class="fas fa-check-circle"></i> Assignment Solved</h4>
					<p>Please download the solution. If you have any queries regarding the solution, please let us know through chat.</p>
				</div>
				<div>
					<a class="r_btn"  href="<?php echo base_url().$order[0]['summited_assignment'] ?>" target="_blnak">Download solution</a>
					<?php if($order[0]['status']!=='Assignment Completed'){ ?>
					<span 
					id="countdown" 
					data-id=<?php echo $order[0]['id']; ?> 
					data-orderId=<?php echo $order[0]['order_id'] ; ?> 
					data-cstatus="<?php echo $order[0]['status']; ?>"
					></span>
					<button id="ok_btn" type="button" class="r_btn" onclick="updateStatus()">Accept</button>
				    <?php } ?>
					
				</div>
			</div>
		<?php } ?>

			
		</div>
	</div>
	<div class="four_step" style="display:none;">
		<div class="form_head">
			<span class="pending_step"></span>
			<i style="display: none;" class="completed_step fa fa-check"></i>
			<h3>Rate & Feedback <i class="fa fa-chevron-down"></i> <input type="button" id="FeedbackToggle" class="toogelBtn" value=""></h3>
		</div>
		<div class="form_innBox">
			<?php if($order[0]['review']=="" && $order[0]['rate']==null) {?>
		<h4>Rate us now</h4>
		<p>Thank you for taking help from us. Please write feedback that will help to improve our process.</p>
          <div class="star-rating star_rating">
            <input type="radio" id="5-stars" name="rating" value="5" />
            <label for="5-stars" class="star">&#9733;</label>
            <input type="radio" id="4-stars" name="rating" value="4" />
            <label for="4-stars" class="star">&#9733;</label>
            <input type="radio" id="3-stars" name="rating" value="3" />
            <label for="3-stars" class="star">&#9733;</label>
            <input type="radio" id="2-stars" name="rating" value="2" />
            <label for="2-stars" class="star">&#9733;</label>
            <input type="radio" id="1-star" name="rating" value="1" />
            <label for="1-star" class="star">&#9733;</label>
          </div>
			<div class="form_fields">
				<label>Your review *</label>
				<textarea class="textarea" name="review" placeholder="Write your feedback here"></textarea>
			</div>
			<div class="text-center mt-2">
				<button id="Submit"type="submit" onclick="submitFeedback()" class="r_btn">Submit</button>
			</div>
			<?php } else{ ?>
				<h4>Thanks For Your Valuable Feedback</h4>
			<?php }  ?>
		</div>
	</div>

</div>
</form>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

<?php $this->load->view('users/footer'); ?>
<script>
    $("#live_session").addClass('active');
</script>

<!--  
<?php if($order[0]['status']=='Awaiting Confirmation'){ ?>
<script>
    $(".first_step").css({'display':'block'});
</script>
<?php }?> -->
<?php if($order[0]['status']=='Order Confirmed'){ ?>
<script>
    $(".Second_step").css({'display':'block'});
    $(".Availability_step").css({'display':'block'});
    $("#second_stepNext_btn").click();

    $('.form_innBox').addClass('hide');

    $("#progressbar li:nth-child(1)").addClass("active");
	$("#progressbar li:nth-child(2)").addClass("active");
	$("#progressbar li:nth-child(3)").addClass("active");
</script>
<?php }?>



<?php if($order[0]['status']=='Assignment In progress' || $order[0]['status']=='Review Your Assignment'){ ?>
<script>
    $(".third_step").css({'display':'block'});
    $(".Availability_step").css({'display':'block'});
    $('.Second_step').css({'display':'block'});

    $("#third_stepNext_btn").click();

    $('.form_innBox').addClass('hide');

    $("#progressbar li:nth-child(1)").addClass("active");
	$("#progressbar li:nth-child(2)").addClass("active");
	$("#progressbar li:nth-child(3)").addClass("active");
	$("#progressbar li:nth-child(4)").addClass("active");
</script>
<?php }?>



<?php if($order[0]['status']=='Assignment Completed'){ ?>
<script>
	$(".four_step").css({'display':'block'});
	$(".Availability_step").css({'display':'block'});
	$('.Second_step').css({'display':'block'});
	$('.third_step').css({'display':'block'});	



    $("#FeedbackToggle").click();

    $('.form_innBox').addClass('hide');
	$("#progressbar li:nth-child(1)").addClass("active");
	$("#progressbar li:nth-child(2)").addClass("active");
	$("#progressbar li:nth-child(3)").addClass("active");
	$("#progressbar li:nth-child(4)").addClass("active");
</script>
<?php }?>



<?php if($order[0]['status']=='Checking Tutor Availability'){ ?>
<script>
	$(".Availability_step").css({'display':'block'});
   $(".first_step").css({'display':'block'});
   
   $("#availability_stepNext_btn").click();
    $("#next").click();
    $("#live_session").addClass('active');

		$("#progressbar li").removeClass("active");
		$("#progressbar li:nth-child(1)").addClass("active");
		$("#progressbar li:nth-child(2)").addClass("active");
</script>
<?php }?>

<?php if($order[0]['status']!='Awaiting Confirmation' && $order[0]['status']!='Checking Tutor Availability'){ ?>
<script> 
  const formElements = document.querySelectorAll('#order_form .readonlyControler');
  for (const element of formElements) {
    element.setAttribute('readonly', '');
  }
</script>
<?php }?>
<script>
// Add a click event listener to the "OK" button
$(document).ready(function()
{
  // Start the 6-hour countdown
  var countDownDate = new Date("<?php echo $order[0]['completion_date'] ?>").getTime() + (6 * 60 * 60 * 1000); // 6 hours from now
    var x = setInterval(function() {//data('H:m:s',strtotime()
    var now = new Date().getTime(); 
    var distance = countDownDate - now;
    // console.log('distance=>',distance);    

    // Calculate hours, minutes, and seconds
    var hours = Math.floor(distance / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // Update the countdown element with the remaining time
    var countdownElem = document.getElementById("countdown");
    if(countdownElem) countdownElem.innerHTML = "Time remaining: " + hours + "h " + minutes + "m " + seconds + "s ";

    // If the countdown is finished, display a message
    if (distance < 0) {
      clearInterval(x);
       $('#ok_btn').addClass('d-none')
       updateStatus();
      countdownElem.innerHTML = "Time's up!";
    }
  }, 1000);
});

const updateStatus=()=>{
	const id = $('#countdown').attr('data-id');
	const order_id = $('#countdown').attr('data-orderId');
	const currentStatus = $('#countdown').attr('data-cstatus');
	if(currentStatus =="Assignment Completed") return; 
	const status ="Assignment Completed";	 
	      $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url(BACKEND_FOLDER.'/orders/order-status-change/');?>"+id,
            dataType    : 'json',
            data        : {'status' :`${status}`,'orderID' : `${order_id}`},
            success     : function(response)
            {
               
            }
        });
}

</script>