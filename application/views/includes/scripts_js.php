<script src="<?php echo base_url('assets/front/js/jquery-3.5.1.min.js').CSS_JS_VER;?>"></script>
<script src="<?php echo base_url('assets/front/js/owl.carousel.min.js').CSS_JS_VER;?>"></script>
<script src="<?php echo base_url('assets/front/js/bootstrap.bundle.min.js').CSS_JS_VER;?>"></script>
<script src="<?php echo base_url('assets/front/js/script.js').CSS_JS_VER;?>"></script>
<script>
    function GenerateCaptcha(captcha_id) {  
        var chr1 = Math.ceil(Math.random() * 10) + '';  
        var chr2 = Math.ceil(Math.random() * 10) + '';  
        var chr3 = Math.ceil(Math.random() * 10) + '';  
        var str = new Array(4).join().replace(/(.|$)/g, function () { return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"](); });  
        var captchaCode = str + chr1 + '' + chr2 + '' + chr3;  
        $('#captcha_hidden_value_'+captcha_id).val(captchaCode);   
    }  

    GenerateCaptcha(1);
    GenerateCaptcha(2);

</script>
<script>
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        return true;
    }      
}
//VALIDATION FOR EMAIL
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
</script>  

<script type="text/javascript">
function enquiry(){
    var check = 0;
  
    var name         = $.trim($("#feedback_name").val());
    var email        = $.trim($("#feedback_email").val());
    var message      = $.trim($("#feedback_message").val());
    

    if(name=="")
    {
        $("#feedback_name_err").html("Please enter name");
        $("#feedback_name").addClass("error_field");
        check = 1;
    }else{
        $("#feedback_name_err").html("");
        $("#feedback_name").removeClass("error_field");
    }

    if(email=="")
    {
        $("#feedback_email_err").html("Please enter email");
        $("#feedback_email").addClass("error_field");
        check = 1;
    }else{
        $("#feedback_email_err").html("");
        var check_email =isEmail(email);
        if(check_email == false){
            $("#feedback_email_err").html("Please enter valid email");
            $("#feedback_email").addClass("error_field");
            check = 1;
        }else{
            $("#feedback_email_err").html("");
            $("#feedback_email").removeClass("error_field");
        }
    }

    if(message=="")
    {
        $("#feedback_message_err").html("Please enter message");
        $("#feedback_message").addClass("error_field");
        check = 1;
    }else{
        $("#feedback_message_err").html("");
        $("#feedback_message").removeClass("error_field");
    }
    
     if($('#captcha_2').val() == "") {
        $("#captcha_2").addClass("error_field");
        $('#captcha_err2').html('Please enter captcha.');
        check = 1;
    } else {
        if($('#captcha_2').val() != $('#captcha_hidden_value_2').val()) {
           $("#captcha_2").addClass("error_field");
            $('#captcha_err2').html('Please enter valid captcha.');
            check = 1;
        }else{
             $('#captcha_err2').html('');
             $("#captcha_2").removeClass("error_field");
            
        }
    }

    if(check == 1)
    {
        return false; 
    }else{
        var form = $('#contact_form_1')[0];
        var formData = new FormData(form);
        $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url('get_book_free_consultants_details');?>",
            data        : formData,
            contentType : false,
            cache       : false,
            processData : false,
            beforeSend:function()
            {
                
            },
            success       : function(response)   
            {
                if(response == 'success')
                {
                    $('#contact_form_1')[0].reset();
                    $("#exampleModal").modal('show');
                }
            }
        });
    }
}

</script>

<?php if($page_name == 'blog'){ ?>
    <script type="text/javascript">
        function got_to_category(slug){
            window.location = '<?php echo base_url();?>blog/'+slug;
        }
    </script>
<?php } ?>