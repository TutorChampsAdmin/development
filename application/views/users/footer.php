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
									<textarea name="desc" id="desc" class="textarea" placeholder="Type your question here" required></textarea>
								</div>
								<div class="form_fields">
									<div class="upload_MFile">
										<span class="fileinput-button" id="fileinput-buttonFooter">
								            <span><i class="fas fa-cloud-upload-alt" aria-hidden="true"></i><br><span>Drop your file or Browse</span> </span>
								            <input type="file"  name="assignment" id="filesFooter" data-list="FilelistFooter" class="files" multiple accept="image/jpeg, image/png, image/gif," required><br />
								        </span>
								        <output id="FilelistFooter"></output>
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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
  <!-- <script src="<?php echo base_url();?>assets/main/js/custom.js"></script> -->
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>
  <script src="<?php echo base_url();?>assets/main/js/custom.js"></script>
<script>
	    $("#files").on('change', function () {
        var file = $('#files')[0].files[0].name;
        if (file.length > 0) {
			console.log("file uploaded");
            $("#desc").removeAttr('required');
        }
        if (file.length == 0) {
            $("#desc").attr('required',required);
        }
    })
	
    $("#desc").on('keyup', function () {
        var val = $("#desc").val();
        if (val.length > 0) {
            $("#files").removeAttr('required');
        }
        if (val.length == 0) {
            $("#files").attr('required',true);
        }
    })
</script>
  
	<script>
        if ('{{ ordered }}' == 'True'){
			$("#check").click()
		}
		console.log($("#checkbox").checked)


		$("#home").click(function () {
			$(".homeContant").addClass("active_");
			$(".profileContent").removeClass("active_");
			$(".live_session_content").removeClass("active_");
			$(".assignment_help_content").removeClass("active_");
			$(".project_lab_content").removeClass("active_");
		});
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
   		  // $("#progressbar li").removeClass("active");
   		  // $("#progressbar li:nth-child(1)").addClass("active");
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
				console.log("form submitted");
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
					    console.log("success submit");
						$("#loading").css({"display":"none"});
						$('#hwform').trigger('reset');
						var response = JSON.parse(data);
						var order_id = response.order_id; 
						order_id =order_id.toLocaleLowerCase();
						 window.location.href = '<?php echo base_url();?>dashboard/tracking/'+order_id;
					}
				})
			})


		function updateNotification(id)
		{
			const data={id}
			console.log('data=>',data)
			$.ajax({
				type:"POST",
				url:'<?php echo base_url("dashboard/update_notification"); ?>',
				data:data,
				// cache: false,
				// processData: false,
				// contentType: false,
				success:function(data){
				    console.log("success submit=>",data);				
					// var response = JSON.parse(data);
					// var order_id = response.order_id; 
					// order_id =order_id.toLocaleLowerCase();
					//  window.location.href = '<?php echo base_url();?>dashboard/tracking/'+order_id;
				}
			})
		}
		</script>
		
		
<?php $this->load->view('includes/order_detail_popup'); ?>

<?php  
$req_url2 = "https://" . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];

    if(strpos($req_url2, '/tracking') !== false) {
        $ordID =$order[0]['id'] ;
        $Order_Code = $order[0]['order_id']  ; ?>
        <script>
            var lead_id ='<?php echo $ordID ; ?>';
            var order_id ='<?php echo $Order_Code ; ?>';
            show_order_details(lead_id,order_id,subjectname='');
        </script>
<?php    } 
?>

</body>

</html>
