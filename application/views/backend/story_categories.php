<section class="deadline-sec">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-sub">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="manage-deadline">
                            <h2>Story Categories</h2>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6"><br>
                         <a class=" btn button-deflt addForm" href="javascript:void(0)" style="float: right;">Add New Category</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-sm-12">
                <form class="addConForm" action="" method="post" id="addboardForm" style="display:none">
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />  
                    
                    <fieldset class="universityP">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="manage-deadline">
                                    <h2 id="heading_id">Add Category</h2>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Name<span style="color:red;">*</span></label>
                                <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter Category Name">
                                <span id="category_name_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-4 col-xs-4 chk">
                                <label for="dtp_input1">Status<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <label class="container"><input class="check_option" type="radio" name="status" id="status_active"  value="1" checked=""><span class="checkmark round"></span> Active </label>
                                    <label class="container"><input class="check_option" type="radio" name="status" id="status_inactive"  value="0"><span class="checkmark round"></span> Inactive</label>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <input type="hidden" name="category_id" id="category_id" value="0">
                                <button type="button" class="btn button-deflt university Submit" name="submit" 
                                onclick="return validate_category();" style="float: right;" id="submit_btn">Add</button>
                                <span id="success_msg" style="color: green; margin-left: -21px;text-align: center;float: right;margin-right: 38px;"></span>
                                <button type="button" class="btn btn-default cancelBtn">Cancel</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6"></div>
                <div class="col-lg-5 col-md-5 col-xs-12 mt-auto text-left record" style="padding:0">
                    <input type="search" name="search_string" id="search_string" placeholder="Search category.." class="form-control">
                </div>
                <div class="col-lg-1 col-md-1 col-xs-12 mt-auto text-left record" style="padding: 0 16px;">
                   <button type="button" class="btn button-deflt" onclick="get_category_list()" style="height: 37px;padding: 0 12px">Search</button>
                </div>
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
                                    <th>S.N</th>
                                    <th class="hidden-xs hidden-sm">Name</th>
                                    <th class="hidden-xs hidden-sm">Status</th>
                                    <th class="hidden-xs hidden-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody id="category_div">
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
        $("#addboardForm").slideToggle(); 
        $("#category_id").val(0); 
        $("#category_name").val('');
        $("#status_active").prop("checked", true);
        $("#heading_id").html("Add Category");  
        $("#submit_btn").html("Add");
    });
    $(".cancelBtn").on('click', function()
    {
        $("#addboardForm").slideToggle(); 
        $("#category_id").val(0); 
        $("#category_name").val('');
        $("#status_active").prop("checked", true);
        $("#heading_id").html("Add Category");  
        $("#submit_btn").html("Add");
    });
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 2000);
}); 

// Getting Board List
setTimeout(function() {
    get_category_list();
}, 2000 );

function get_category_list()
{
    var search_string = $('#search_string').val();
    var postData = 
                {
                   "search_string":search_string
                }
    var dataString = JSON.stringify(postData);
    $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/blog-stories/categories?get_list=1');?>",
        dataType    : 'json',
        data        : {data:dataString},
        success     : function(response)
        {   
            response = JSON.parse(JSON.stringify(response));
            var category_list ='';
            var base_url = '<?php echo base_url();?>';
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

                    category_list += `<tr>
                        <td>`+sr+`</td>
                            <td>`+response[i].name+`</td>
                            <td>`+status+`</td>
                            <td>
                                <a title="Update Category" style="cursor:pointer;" onclick="get_category_by_id(`+response[i].id+`)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>`
                }
            }
            else
            {
                category_list += `<tr>
                        <td colspan="5" style="text-align: center;">No Record is founds!</td>
                    </tr>`
            } 
            $('#total_records').html(response.length) 
            $('#category_div').html(category_list) 
        }
    });
}

// Getting Single Role using id
function get_category_by_id(id)
{
    $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/blog-stories/categories/');?>"+id+"?get_list=1",
        dataType    : 'json',
        success     : function(response)
        {   
            var id  = response.id;
            if(id > 0)
            {  
                var status          = response.status;

                $("#category_id").val(id); 
                $("#category_name").val(response.name);
               
                if(status=='1'){
                    $("#status_active").prop("checked", true);
                }else{
                    $("#status_inactive").prop("checked", true);
                }
                $("#heading_id").html("Edit Category");  
                $("#submit_btn").html("Update");
                $("#addboardForm").slideDown();
        
            }
        }
    });
}

// Add / Edit Role
function validate_category()
{
    $("#category_name_err").html("");
    var category_id         = $.trim($("#category_id").val());
    var category_name       = $.trim($("#category_name").val());
    var status           = $('input[name="status"]:checked').val();
    var check            = 0;
    
    if(category_name == ''){
        $("#category_name_err").html("Please enter category name");
        $("#category_name_err").css({"color": "red"});
        check = 1;
    }


    if(check == 1)
    {
        return false;
    }
    else
    {
    
         var form_data = new FormData($('#addboardForm')[0]);
         
        $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url(BACKEND_FOLDER.'/blog-stories/add-categories');?>",
             data       : form_data,
            contentType : false,
            cache       : false,
            processData : false,
            success     : function(response)
            {   
                console.log("Story category added");
                response = JSON.parse(response);
                if(response.status == 'success'){
                    $('#success_msg').show();
                    $("#success_msg").html('<b>'+response.message+'</b>');
                    $("#success_msg").css({"color": response.color});
                }

                setTimeout(function() {
                    
                    if(response.status == 'success' && response.color == 'green')
                    {
                        $('#addboardForm')[0].reset();
                        $("#addboardForm").slideUp(); 
                        $('#success_msg').fadeOut();
                        get_category_list();
                    }else{
                        $('#degree_name_err').fadeOut();
                        $('#degree_name_err').fadeOut();
                    }
                }, 1000);
            }
        });
    }
}
</script>
