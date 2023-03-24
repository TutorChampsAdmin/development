<section class="deadline-sec">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="col-xs-12 col-md-12 col-sm-12">
                <form class="addConForm" action="" method="post" role="form" id="addUser">
                    <fieldset class="universityP">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="manage-deadline">
                                    <h2 id="heading_id">Profile</h2>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">First Name<span style="color:red;">*</span></label>
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" value="<?php echo $user_detail['first_name'];?>">
                                <span id="first_name_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Last Name<span style="color:red;">*</span></label>
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" value="<?php echo $user_detail['last_name'];?>">
                                <span id="last_name_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Email<span style="color:red;">*</span></label>
                                <input readonly type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $user_detail['email'];?>">
                                <span id="email_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-2 col-xs-2">
                                <label for="dtp_input1">Country Code<span style="color:red;">*</span></label>
                                <input type="text" name="country_code" class="form-control" id="country_code" value="+91" readonly>
                            </div>
                            <div class="col-md-2 col-xs-2">
                                <label for="dtp_input1">Phone<span style="color:red;">*</span></label>
                                <input readonly type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" 
                                maxlength="10" onkeypress="return isNumberKey(event);" value="<?php echo $user_detail['only_phone_number'] ;?>">
                                <span id="phone_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                           
                            <div class="col-md-4 col-xs-4 chk">
                                <label for="dtp_input1">Status<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <label class="container">
                                        <input class="check_option" type="radio" name="status" id="status_active" value="1" <?php if($user_detail['status'] == '1'){  echo 'checked';  } ?> >
                                        <span class="checkmark round"></span> Active </label>
                                    <label class="container">
                                        <input class="check_option" type="radio" name="status" id="status_inactive" value="0" <?php if($user_detail['status'] == '0'){  echo 'checked';  } ?>>
                                        <span class="checkmark round"></span> Inactive</label>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 col-xs-12" style="margin-top: 15px;">
                                <input type="hidden" name="hyd_user_id" id="hyd_user_id" value="<?php echo $user_detail['id'] ;?>">
                                <button type="button" class="btn button-deflt university Submit" name="submit" onclick="return validate_user_profile();" style="float: right;" id="submit_btn">Update Profile</button>
                                <span id="success_msg" style="color: green; margin-left: -21px;text-align: center;float: right;margin-right: 38px;"></span>
                                <button type="button" class="btn btn-default cancelBtn" onclick="history.back()">Back</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">

function validate_user_profile()
{
    $("#first_name_err").html("");
    $("#last_name_err").html("");
    $("#email_err").html("");
    $("#phone_err").html("");
    $("#role_err").html("");
    var first_name              = $.trim($("#first_name").val());
    var last_name               = $.trim($("#last_name").val());
    var phone                   = $.trim($("#phone").val());
    var country_code            = $.trim($("#country_code").val());
    var role                    = $.trim($("#role").val());
    var status                  = $('input[name="status"]:checked').val();
    var user_id                 = $.trim($("#hyd_user_id").val());
    var check                   = 0;
    
    if(first_name == '')
    {
        $("#first_name_err").html("Please enter first name");
        $("#first_name_err").css({"color": "red"});
        check = 1;
    }
    if(last_name == '')
    {
        $("#last_name_err").html("Please enter last name");
        $("#last_name_err").css({"color": "red"});
        check = 1;
    }
    if(phone == '')
    {
        $("#phone_err").html("Please enter phone number");
        $("#phone_err").css({"color": "red"});
        check = 1;
    }
    if(role == '')
    {
        $("#role_err").html("Please select Role");
        $("#role_err").css({"color": "red"});
        check = 1;
    }
    if(check == 1)
    {
        return false;
    }
    else
    {
        $('#submit_btn').prop('disabled', true);
        $('#submit_btn').html('Please Wait..');

       var form_data = new FormData($('#addUser')[0]);

        $.ajax({
            type        : 'POST',
			url         : "<?php echo base_url(BACKEND_FOLDER.'/profile');?>",
			data        : form_data,
            contentType : false,
            cache       : false,
            processData : false,
            success     : function(response)
            {	
                $('#success_msg').show();
                $("#success_msg").html('<b>'+response.messgae+'</b>');
                $("#success_msg").css({"color": response.color});

                $('#submit_btn').prop('disabled', false);
                $('#submit_btn').html('Update Profile');
                if(response.status == 'success')
                    {
                          $('#addUser')[0].reset();
                          location.href = "<?php echo base_url(BACKEND_FOLDER.'/dashboard');?>";
                    }

                setTimeout(function() 
                {
                    $('#success_msg').fadeOut();
                }, 2000);

            }
        });
    }
}
</script>

