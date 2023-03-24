<section class="deadline-sec">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-sub">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="manage-deadline">
                            <h2>Enquiries</h2>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6" style="display: none;;"><br>
                        <a class=" btn button-deflt addForm" href="javascript:void(0)" style="float: right;">Add enquiry</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-sm-12">
                <form class="addConForm" action="" method="post" role="form" id="addEnquiry" style="display:none">
                    {% csrf_token %}
                    <fieldset class="universityP">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="manage-deadline">
                                    <h2 id="heading_id">Add enquiry</h2>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Name<span style="color:red;">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Please Enter Name">
                                <span id="name_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Email<span style="color:red;">*</span></label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Please Enter Email">
                                <span id="email_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Phone<span style="color:red;">*</span></label>
                                <input type="text" name="phone" class="form-control" id="phone" maxlength="10" placeholder="Please Enter Phone" onkeypress="return onlynumber(event);">
                                <span id="phone_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Study Destination<span style="color:red;">*</span></label>
                                <input type="text" name="destination" class="form-control" id="destination" placeholder="Please Enter Destination">
                                <span id="destination_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Study level<span style="color:red;">*</span></label>
                                <input type="text" name="study_level" class="form-control" id="study_level" placeholder="Please Enter Study level">
                                <span id="study_level_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            </div>
                            <div class="col-md-4 col-xs-4 chk">
                                <label for="dtp_input1">Status<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <label class="container"><input class="check_option" type="radio" name="status" id="status_active"  value="1" checked=""><span class="checkmark round"></span> Active </label>
                                    <label class="container"><input class="check_option" type="radio" name="status" id="status_inactive"  value="0"><span class="checkmark round"></span> Inactive</label>
                                </div>
                            <br>
                            <div class="col-md-12 col-xs-12">
                                <input type="hidden" name="enquiry_id" id="enquiry_id" value="0">
                                <button type="button" class="btn button-deflt enquiry Submit" name="submit" 
                                onclick="return validate_enquiry();" style="float: right;" id="submit_btn">Add</button>
                                <span id="success_msg" style="color: green; margin-left: -21px;text-align: center;float: right;margin-right: 38px;"></span>
                                <button type="button" class="btn btn-default cancelBtn">Cancel</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-2 col-xs-12 mt-auto text-left record">Number of Records: <strong><span id="total_records"></span></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12"> 
                    <div id="rslt"></div>
                    <div id="call_scrl" class="inpanel table-responsive">
                        <table class="table orderAdminP custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="hidden-xs hidden-sm">Name </th>
                                    <th class="hidden-xs hidden-sm">Email </th>
                                    <th class="hidden-xs hidden-sm">Phone</th>
                                    <th class="hidden-xs hidden-sm">Message</th>
                                    <th class="hidden-xs hidden-sm">Destination</th>
                                    <th class="hidden-xs hidden-sm">Study level</th>
                                    <th class="hidden-xs hidden-sm">University</th>
                                    <th class="hidden-xs hidden-sm">Enquiry Date</th>
                                </tr>
                            </thead>
                            <tbody id="enquiry_div">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
// Form Up/DOwn
$(document).ready(function(){
    
    $(".addForm").on('click', function()
    {
        $("#addEnquiry").slideToggle(); 
        $("#enquiry_id").val(0); 
        $("#name").val('');
        $("#status_active").prop("checked", true);
        $("#heading_id").html("Add Enquiry");  
        $("#submit_btn").html("Add");
    });
    $(".cancelBtn").on('click', function()
    {
        $("#addEnquiry").slideToggle(); 
        $("#enquiry_id").val(0); 
        $("#name").val('');
        $("#status_active").prop("checked", true);
        $("#heading_id").html("Add Enquiry");  
        $("#submit_btn").html("Add");
    });
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 9000);
}); 

const month_arr = new Array("Jan", "Feb", "Mar","Apr", "May", "June","July", "Aug", "Sept","Oct", "Nov", "Dec");

get_enquiry_list();

function get_enquiry_list()
{
	$.ajax({
		type        : 'GET',
		url         : "<?php echo base_url(BACKEND_FOLDER.'/get_enquiry_list');?>",
		dataType    : 'json',
		success     : function(data)
		{	
            response = JSON.parse(JSON.stringify(data));
           
			var enquiry_list ='';
			if(response.length > 0)
			{
				for (var i in response) 
				{	
					var sr = parseInt(i) + 1;

                    var status = 'Active';
                    if(response[i].status == 0)
                    {
                        status = 'Inactive';
                    }

                    if(response[i].message == null){
                        response[i].message = 'NA';
                    }

                    if(response[i].study_destination_name == null || response[i].study_destination_name == ''){
                        response[i].study_destination_name = 'NA';
                    }

                    if(response[i].study_level_name == null || response[i].study_level_name == ''){
                        response[i].study_level_name = 'NA';
                    } 
                    if(response[i].university_name == null || response[i].university_name == ''){
                        response[i].university_name = 'NA';
                    }

                    var created_on       = response[i].messaged_on;
                    if(created_on == null || created_on == ''){
                        show_created_on = 'NA';
                    }
                    else
                    {
                        created_on       = created_on.slice(0,-1)
                        created_on       = created_on.replace("T", " ");
                        created_on_arr   = created_on.split(" ");
                        date_arr       = created_on_arr[0].split("-");

                        var created_date_month_date = parseFloat(date_arr['1']) - 1;
                        show_created_on  = date_arr['2']+'-'+month_arr[created_date_month_date]+'-'+date_arr['0'];
                    }

					enquiry_list += `<tr>
						<td>${ sr }</td>
							<td>${ response[i].name  }</td>
                            <td>${ response[i].email  }</td>
                            <td>${ response[i].phone }</td>
                            <td>${ response[i].message }</td>
                            <td>${ response[i].study_destination_name }</td>
                            <td>${ response[i].study_level_name }</td>
                            <td>${ response[i].university_name }</td>
                            <td>${ show_created_on }</td>
						</tr>`
				}
			}
			else
			{
				enquiry_list += `<tr>
						<td colspan="9" style="text-align: center;">No Record is founds!</td>
					</tr>`
			} 
            $('#total_records').html(response.length) 
			$('#enquiry_div').html(enquiry_list) 
		}
	});
}

/*// Getting Single Detail using id
function get_enquiry_by_id(id)
{
    $.ajax({
        type        : 'GET',
        url         : "{{ WEBSITE_URL }}portal/get_enquiry_list/"+id,
        dataType    : 'json',
        success     : function(response)
        {	
            var id  = response.id;
            if(id > 0)
            {  
                var status          = response.status;

                $("#enquiry_id").val(id); 
                $("#name").val(response.name);
                $("#email").val(response.email);
                $("#phone").val(response.phone);
                $("#destination").val(response.study_destination);
                $("#study_level").val(response.study_level);
               
                if(status=='1'){
                    $("#status_active").prop("checked", true);
                }else{
                    $("#status_inactive").prop("checked", true);
                }
                $("#heading_id").html("Edit Enquiry");  
                $("#submit_btn").html("Update");
                $("#addEnquiry").slideDown();
        
            }
        }
    });
}*/

// Add / Edit Role
function validate_enquiry()
{
    $("#name_err").html("");
    $("#email_err").html("");
    $("#phone_err").html("");
    $("#destination_err").html("");
    $("#study_level_err").html("");
   
   
    var csrftoken             = " {{ csrf_token }}";
    var enquiry_id            = $.trim($("#enquiry_id").val());
    var name                  = $.trim($("#name").val());
    var email                 = $.trim($("#email").val());
    var phone                 = $.trim($("#phone").val());
    var destination           = $.trim($("#destination").val());
    var study_level           = $.trim($("#study_level").val());
    var status                = $('input[name="status"]:checked').val();
    var check                 = 0;

    if(name == ''){
        $("#name_err").html("Please enter  name");
        $("#name_err").css({"color": "red"});
        check = 1;
    }else{
        $("#name_err").html("");
    }
    if(email=="")
    {
        $("#email_err").html("Please enter email");
        check = 1;
    }
    else
    {
        $("#email_err").html("");
        var check_email =isEmail(email);
        if(check_email == false){
            $("#email_err").html("Please enter valid email");
            check = 1;
        }else{
            $("#email_err").html("");
        }
    }

    if (phone == ''){
        $("#phone_err").html("Please Enter Your Phone Number");
        check = 1;
    }
    else
    {
        $("#phone_err").html("");
    }

    if(destination == ''){
        $("#destination_err").html("Please enter  destination");
        $("#destination_err").css({"color": "red"});
        check = 1;
    }else{
        $("#destination_err").html("");
    }

    if(study_level == ''){
        $("#study_level_err").html("Please enter  study level");
        $("#study_level_err").css({"color": "red"});
        check = 1;
    }else{
        $("#study_level_err").html("");
    }
    
    if(check == 1)
    {
        return false;
    }
    else
    {
        var JSONObject = {
            "enquiry_id"            : enquiry_id,
            "name"                  : name, 
            "email"                 : email,
            "phone"                 : phone,
            "destination"           : destination, 
            "study_level"           : study_level,
            "status"                : status, 
            "created_by"            : 1
        };
        var jsonData = JSON.stringify(JSONObject);

        $.ajax({
            type        : 'POST',
            headers     : {'X-CSRFToken': csrftoken},
            url         : "{{ WEBSITE_URL }}portal/add_enquiry",
            data        : jsonData,
            contentType : "application/json",
            cache       : false,
            processData : false,
            dataType    : 'JSON',
            success     : function(response)
            {	
                if(response.status == 'success'){
                    $('#success_msg').show();
                    $("#success_msg").html('<b>'+response.message+'</b>');
                    $("#success_msg").css({"color": response.color});
                }

                if(response.status == 'enquiry_name_exist')
                {
                    $('#name_err').show();
                    $("#name_err").html(response.message);
                    $("#name_err").css({"color": response.color});
                }

                setTimeout(function() {
                    
                    if(response.status == 'success')
                    {
                        $('#addEnquiry')[0].reset();
                        $("#addEnquiry").slideUp(); 
                        $('#success_msg').fadeOut();
                        get_enquiry_list();
                    }else{
                        $('#name_err').fadeOut();
                        $('#name_err').fadeOut();
                    }
                }, 3000);
            }
        });
    }
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function onlynumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode < 48 || charCode > 57)) {
        return false;
    } else {
        return true;
    }      
}
</script>
