<?php $this->load->view('users/head');?>
						<div class="mainContent DashboardContent">
							<div class="head_content">
								<h1>Order Tracking</h1>
							</div>
							
							<div class="live_session_content" style="height: auto;">

							<div class="order_form_con">
					            <div class="order_form_innCon">  
					            	<ul id="progressbar" class="progressbar">
						                <li class="active">Order Created</li>
										<li>Checking Tutor Availability</li>
						                <li>Awaiting Payment</li>
						                <li>Assignment In Progress</li>
						                <li>Give Feedback</li>
						            </ul>
									<div class="banner_form_con">
										<form class="order_form" >
											<div class="first_step opened_Box" style="display:none;">
												<div class="form_head">
													<span class="pending_step"></span>
													<i style="display: none;" class="completed_step fa fa-check"></i>
													<h3><?php echo $order[0]['order_id'];?> - Cost Accounting  <input type="button" id="next" class=" toogelBtn" value=""><i class="fa fa-chevron-down"></i> </h3>
												</div>
												<div class="form_innBox">
													<div class="form_fields">
														<label>Description:</label>
														<textarea class="textarea" id="description" placeholder="Description"><?php echo $order[0]['description'];?> </textarea>
													</div>
													<div class="form_fields">
														<label>Question Files</label>
														<div class="upload_MFile">
															<span class="fileinput-button" id="fileinput-button">
													            <span><i class="fas fa-cloud-upload-alt" aria-hidden="true"></i><br><span>Drop your file or Browse</span> </span>
													            <input type="file" name="files[]" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
													        </span>
													        <output id="Filelist"></output>
													    </div>
													</div>
													<!--<div class="form_fields">-->
													<!--	<label>Select subject</label>-->
													<!--	<input class="subject input" type="text" placeholder="Select subject">-->
													<!--</div>-->
													<div class="form_fields">
														<label>Set Deadline</label>
														<div class="deadline_con">
															<input type="radio" id="6hrs">
															<label for="6hrs">6 hrs</label>
															<input type="radio" id="12hrs">
															<label for="12hrs">12 hrs</label>
															<input type="radio" id="18hrs">
															<label for="18hrs">18 hrs</label>
															<input type="radio" id="24hrs">
															<label for="24hrs">24 hrs</label>
															<input type="radio" id="30hrs">
															<label for="30hrs">30 hrs</label>
															<input class="input" type="datetime-local">
														</div>
													</div>
													<div class="form_fields">
														<label>Reference Files</label>
														<div class="upload_MFile">
															<span class="fileinput-button" id="fileinput-button">
													            <span><i class="fas fa-cloud-upload-alt" aria-hidden="true"></i><br><span>Drop your file or Browse</span> </span>
													            <input type="file" name="files[]" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
													        </span>
													        <output id="Filelist"></output>
													    </div>
													</div>
													<div class="text-center mt-2">
														<button id="Submit"type="submit" class="r_btn">Submit</button>
													</div>
												</div>
											</div>

											<div class="Second_step" style="display:none;">
												<div class="form_head">
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
													<h3>Assignment In Progress <i class="fa fa-chevron-down"></i> <input type="button" id="third_stepNext_btn" class="toogelBtn" value=""></h3>
												</div>
												<div class="form_innBox">
													<div class="assignmentProgressBox">
														<h4><div class="assignmentProgress"></div> Assignment in Progress</h4>
														<p>Your payment has been received. Tutors have initiated the work on your assignment.</p>
													</div>
													<div class="assignmSolve">
														<div>
															<h4><i class="fas fa-check-circle"></i> Assignment Solved</h4>
															<p>Please download the solution. If you have any queries regarding the solution, please let us know through chat.</p>
														</div>
														<div>
															<a class="r_btn" href="#">Download solution</a>
														</div>
													</div>
												</div>
											</div>
											<div class="four_step" style="display:none;">
												<div class="form_head">
													<h3>Rate & Feedback <i class="fa fa-chevron-down"></i> <input type="button" id="FeedbackToggle" class="toogelBtn" value=""></h3>
												</div>

												<div class="form_innBox">
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
														<textarea class="textarea" placeholder="Write your feedback here"></textarea>
													</div>
													<div class="text-center mt-2">
														<button id="Submit"type="submit" class="r_btn">Submit</button>
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
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $("#live_session").addClass('active');
</script>
<?php $this->load->view('users/footer'); ?>

 
<?php if($order[0]['status']=='Awaiting Confirmation'){ ?>
<script>
    $(".first_step").css({'display':'block'});
</script>
<?php }?>
<?php if($order[0]['status']=='Order Confirmed'){ ?>
<script>
    $(".Second_step").css({'display':'block'});
    $("#second_stepNext_btn").click();
</script>
<?php }?>



<?php if($order[0]['status']=='Assignment In progress'){ ?>
<script>
    $(".third_step").css({'display':'block'});
    $("#third_stepNext_btn").click();
</script>
<?php }?>



<?php if($order[0]['status']=='Assignment Completed'){ ?>
<script>
   $(".four_step").css({'display':'block'});
    $("#FeedbackToggle").click();
</script>
<?php }?>



<?php if($order[0]['status']=='Checking Tutor Availability'){ ?>
<script>
   $(".mid_step").css({'display':'block'});
    // $("#FeedbackToggle").click();
</script>
<?php }?>