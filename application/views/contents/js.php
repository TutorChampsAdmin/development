<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function save_country_data(country_id){
    var check        = 0;
    var csrftoken    = "{{csrf_token}}";
    var name         = $.trim($("#name").val());
    var email        = $.trim($("#email").val());
    var phone        = $.trim($("#phone").val());

    if(name=="")
    {
        $("#name_err").html("Please enter name");
        check = 1;
    }else{
        $("#name_err").html("");
    }

    if(email=="")
    {
        $("#email_err").html("Please enter email");
        check = 1;
    }else{
        $("#email_err").html("");
        var check_email =isEmail(email);
        if(check_email == false){
            $("#email_err").html("Please enter valid email");
            check = 1;
        }else{
            $("#email_err").html("");
        }
    }

    if(phone=="")
    {
        $("#phone_err").html("Please enter Phone Number");
        check = 1;
    }else{
        $("#phone_err").html("");
    }

    if(check == 1)
    {
        return false; 
    }else{
        var JSONObject = {
            "name":name,
            "email":email,
            "phone":phone,
            "country_id": country_id
        };
        var jsonData = JSON.stringify(JSONObject);
        $.ajax({
            headers       : {"X-CSRFToken":csrftoken},
            url           : "{{WEBSITE_URL}}message_us_country",
            type          : "POST",
            data          : jsonData,
            success       : function(response)   
            {
                if(response.status == 'success')
                {
                    $('#contact-form')[0].reset();
                    $('#done').html("Successfully Booked the Consultation");
                    setTimeout(function()
                    {
                        $('#done').fadeOut();
                    },2000);
                    

                }
            }
        });
    }
}
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
</script>