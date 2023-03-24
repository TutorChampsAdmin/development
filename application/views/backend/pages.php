<section class="deadline-sec">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-sub">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="manage-deadline">
                            <h2>Pages</h2>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6" style="display:"><br>
                        <a class=" btn button-deflt addForm" href="javascript:void(0)" style="float: right;">Add New Page</a>
                    </div>
                </div>
            </div> 
            <div class="col-xs-12 col-md-12 col-sm-12">
                <form class="addConForm" action="" method="post" role="form" id="addPage" style="display:none" enctype="multipart/form-data">
                    
                    <fieldset class="PageP">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="manage-deadline">
                                    <h2 id="heading_id">Add Page</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-4">
                                <label for="dtp_input1">Title<span style="color:red;">*</span></label>
                                <input type="text" name="page_name" class="form-control" id="page_name" placeholder="Page Name" onblur="return slug()" onkeyup="disable_btn()">
                                <span id="page_name_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                           <div class="col-md-4 col-xs-4">
                                <label for="dtp_input1">Url Slug<span style="color:red;">*</span></label>
                                <input type="text" name="url_slug" class="form-control" id="url_slug" placeholder="Slug" onkeyup="disable_btn('1')"> <i class="menu-icon fa fa fa-check" id="urlVerified" style="float: right;margin-top: -29px;font-size: 20px;color: green;margin-right: 4px;display:none"></i>
                                <span id="url_slug_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-2 col-xs-2">
                                <label for="dtp_input1"></label>
                                <button type="button" class="btn button-deflt" id="verifyBtn" onclick="verify_url()" style="height: 37px;padding: 0 12px;margin-top: 35px;display:none;">Verify URL</button>
                            </div>
                            <div class="col-md-6 col-xs-4">
                                <label for="dtp_input1">Meta Title<span style="color:red;">*</span></label>
                                <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title">
                                <span id="meta_title_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-6 col-xs-4">
                                <label for="dtp_input1">Meta Keywords<span style="color:red;">*</span></label>
                                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Meta Keywords">
                                <span id="meta_keywords_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-6 col-xs-4">
                                <label for="dtp_input1">Meta Description<span style="color:red;">*</span></label>
                                <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Meta Description"></textarea>
                                <span id="meta_description_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-12 col-xs-12">
                                <label for="dtp_input1">Description (HTML)<span style="color:red;">*</span></label>
                                <textarea name="description" rows="10" class="form-control" id="description" placeholder="Description"></textarea>
                                <span id="description_err" style="color: #F00; font-weight: bold;"></span>
                            </div>

                            <div class="col-md-6 col-xs-6">
                                <label for="dtp_input1">Banner Title (HTML)<span style="color:red;"></span></label>
                                <textarea name="banner_title" rows="5" class="form-control" id="banner_title" placeholder="Banner Title"></textarea>
                                <span id="banner_title_err" style="color: #F00; font-weight: bold;"></span>
                            </div>

                            <div class="col-md-6 col-xs-6">
                                <label for="dtp_input1">Banner Text (HTML)<span style="color:red;"></span></label>
                                <textarea name="banner_text" rows="5" class="form-control" id="banner_text" placeholder="Banner Text"></textarea>
                                <span id="banner_text_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                           
                            <div class="col-md-3 col-xs-3 chk">
                                <label for="dtp_input1">Index Follow<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <label class="container"><input class="check_option" type="radio" name="index_follow" id="index_follow_yes"  value="1" checked=""><span class="checkmark round"></span> Yes </label>
                                    <label class="container"><input class="check_option" type="radio" name="index_follow" id="index_follow_no"  value="0"><span class="checkmark round"></span> No</label>
                                </div>
                            </div>
                           <div class="col-md-3 col-xs-3 chk">
                                <label for="dtp_input1">Status<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <label class="container"><input class="check_option" type="radio" name="status" id="status_active"  value="1" checked=""><span class="checkmark round"></span> Active </label>
                                    <label class="container"><input class="check_option" type="radio" name="status" id="status_inactive"  value="0"><span class="checkmark round"></span> Inactive</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-3 chk">
                                <label for="dtp_input1">Service Or Subject<span style="color:red;">*</span></label>
                                <div class="form-group">
                                    <label class="container"><input class="check_option" type="radio" name="subject_service" id="subject_service_active"  value="2" ><span class="checkmark round"></span> Subject </label>
                                    <label class="container"><input class="check_option" type="radio" name="subject_service" id="subject_service_inactive"  value="1" checked><span class="checkmark round"></span> Service</label>
                                </div>
                            </div>
                             <div class="col-md-3 col-xs-3">
                                <label for="dtp_input1" class="mb-2">Banner Image <span style="color: red;"></span></label>
                                <input type="file" name="banner_image" class="form-control" id="banner_image" value="Upload"/>
                                <span id="featured_image_err" style="color: #f00; font-weight: bold;"></span>
                                <img width="70px;" id="show_image" style="display:none;">
                            </div>
                            <br>
                            <br>
                            <div class="col-md-12 col-xs-12" style="margin-top: 20px;">
                                <input type="hidden" name="page_id" id="page_id" value="">
                                  <input type="hidden" name="hyd_banner_image" id="hyd_banner_image" value="">
                                <button type="button" class="btn button-deflt Page Submit" name="submit" 
                                onclick="return validate_page();" style="float: right;" id="submit_btn">Add</button>
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
                    <input type="search" name="search_string" id="search_string" placeholder="Search page.." class="form-control">
                </div>
                <div class="col-lg-1 col-md-1 col-xs-12 mt-auto text-left record" style="padding: 0 16px;">
                   <button type="button" class="btn button-deflt" onclick=" get_post_list(0, true); " style="height: 37px;padding: 0 12px">Search</button>
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
                                    <th class="hidden-xs hidden-sm">Title</th>
                                    <th class="hidden-xs hidden-sm">Description </th>
                                    <th class="hidden-xs hidden-sm">Added By</th>
                                    <th class="hidden-xs hidden-sm">Added On</th>
                                    <th class="hidden-xs hidden-sm">Status</th>
                                    <th class="hidden-xs hidden-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody id="page_div">
                            </tbody>
                        </table>
                        <div id="pagination"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

$(document).ready(function(){
    
    $(".addForm").on('click', function()
    {
        $("#addPage").slideToggle(); 
        $("#page_id").val(''); 
        $("#page_name").val('');
        $("#status_active").prop("checked", true);
        $("#heading_id").html("Add Page");  
        $("#submit_btn").html("Add");
        $("#show_image").hide();
        $('#addPage')[0].reset();
    });
    $(".cancelBtn").on('click', function()
    {
        $("#addPage").slideToggle(); 
        $("#page_id").val(''); 
        $("#page_name").val('');
        $("#status_active").prop("checked", true);
        $("#heading_id").html("Add Page");  
        $("#submit_btn").html("Add");
        $("#show_image").hide();
        $('#addPage')[0].reset();
    });
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 5000);
}); 


function create_pagination(total,maxbtn){ 
$("#pagination").pxpaginate({
         currentpage: 1,
         totalPageCount: total,
         maxBtnCount: maxbtn,
         align: 'center',
         nextPrevBtnShow: true,
         firstLastBtnShow: true,
         prevPageName: '<',
         nextPageName: '>',
         lastPageName: '<<',
         firstPageName: '>>',
         callback: function(pagenumber){
         get_post_list(pagenumber, false);
         }
     });
 }
 
$(document).ready(function(){
    get_post_list(0, true);  
});


function get_post_list(rowno, create_page)
{   
    $('.loader').show();
    var search_string = $('#search_string').val();
    
    var postData = 
                {
                   "search_string":search_string, 
                   "rowno":rowno
                }
    var dataString = JSON.stringify(postData);

    $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/pages?get_list=1');?>",
        dataType    : 'json',
        data        : {data:dataString},
        success     : function(response)
        {   
                
            response = JSON.parse(JSON.stringify(response));
            var page_list ='';
            var base_url = '<?php echo base_url();?>';
            var posts    = response['postList']; 
            var total    = response['total_posts']; 
            var perpage  = response['rowperpage']; 
            
            if(posts.length > 0)
            {
                for (var i in posts) 
                {   
                    if(rowno == '0'){
                        var sr = parseInt(i) + 1;
                    }else{
                        var sr = parseInt(i) + 1+parseInt(parseInt(perpage)*parseInt(rowno-1));
                    }
                    

                    var status = 'Active';
                    if(posts[i].status == 0)
                    {
                        status = 'Inactive';
                    }

                    var urlPrefix = '';
                    if($.trim(posts[i].type) == 'exam')
                    {
                        urlPrefix = 'exams/';
                    }else if($.trim(posts[i].type) == 'policy'){
                        urlPrefix = 'policies/';
                    }

                    var regX = /(<([^>]+)>)/ig;
                    var description = $.trim(posts[i].description.replace(regX, "").substr(0,60))+'...';
                   
                    var created_date = custom_date(posts[i].created_date);
                    page_list += `<tr>
                             <td>`+sr+`</td>
                            <td>`+posts[i].title+`</td>
                            <td>`+description+`</td>
                            <td>`+posts[i].first_name+' '+posts[i].last_name+`</td>
                            <td>`+created_date+`</td>
                            <td>`+status+`</td>
                            <td style="text-align:center">
                                <a title="Update Page" style="cursor:pointer;" onclick="get_page_by_id(`+posts[i].id+`)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a style="cursor:pointer;" href='`+base_url+urlPrefix+posts[i].url_slug+`' title='`+base_url+urlPrefix+posts[i].url_slug+`' target='_blank'><i class="fa fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                        </tr>`;
                } 
                if(create_page && total > perpage){
                    $('#pagination').show(); 
                    create_pagination((total/perpage),5);
                }
                
            }
            else
            {
                page_list += `<tr>
                        <td colspan="8" style="text-align: center;">No Record is founds!</td>
                    </tr>`;
                $('#pagination').hide(); 

            
            }

            $('#total_records').html(total); 
            $('#page_div').html(page_list); 

            $('.loader').hide();

        }
    });
}


// Getting Single Role using id
function get_page_by_id(id)
{   $('.loader').show();
    $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/pages/');?>"+id+"?get_list=1",
        dataType    : 'json',
        success     : function(response)
        {	
            var posts    = response['postList'];
            var id  = posts.id;
            var base_url  = '<?php echo base_url();?>';
            if(id > 0)
            {   
                var status          = posts.status;
                var index_follow    = posts.index_follow;
                var subject_service = posts.subject_service;

                $("#page_id").val(id); 
                $("#page_name").val(posts.title);
                $("#url_slug").val(posts.url_slug);
                $("#meta_title").val(posts.meta_title);
                $("#meta_keywords").val(posts.meta_keywords);
                $("#meta_description").val(posts.meta_description);
                $("#banner_title").val(posts.banner_title);
                $("#banner_text").val(posts.banner_text);
                $("#description").val(posts.description);
                $("#hyd_banner_image").val(posts.hyd_banner_image);
                $("#show_image").show();
                $("#show_image").attr('src', base_url+posts.banner_image);
                if(status=='1'){
                    $("#status_active").prop("checked", true);
                }else{
                    $("#status_inactive").prop("checked", true);
                }
                if(index_follow=='1'){
                    $("#index_follow_yes").prop("checked", true);
                }else{
                    $("#index_follow_no").prop("checked", true);
                }
                if(subject_service=='2'){
                    $("#subject_service_active").prop("checked", true);
                }else{
                    $("#subject_service_inactive").prop("checked", true);
                }
                $("#heading_id").html("Edit Page");  
                $("#submit_btn").html("Update");
                $("#addPage").slideDown();
        
            }
            $('.loader').hide();
        }
    });
}


function validate_page()
{
    $("#page_name_err, #meta_title_err, #meta_keywords_err, #meta_description_err, #description").html("");
   
   
    var page_name       = $.trim($('#page_name').val());
    var url_slug        = $.trim($('#url_slug').val());
    var meta_title      = $.trim($('#meta_title').val());
    var meta_keywords   = $.trim($('#meta_keywords').val());
    var meta_description = $.trim($('#meta_description').val());
    var description     = $.trim($('#description').val());
    var page_id         = $.trim($("#page_id").val());
    
    var status          = $('input[name="status"]:checked').val();
    var check           = 0;

    if(page_name == ''){
        $("#page_name_err").html("Please enter Page name");
        check = 1;
    }

    if(meta_title == ''){
        $("#meta_title_err").html("Please enter Meta Title");
        check = 1;
    }

    if(meta_keywords == ''){
        $("#meta_keywords_err").html("Please enter Meta Keywords");
        check = 1;
    }

    if(meta_description == ''){
        $("#meta_description_err").html("Please enter Meta Description");
        check = 1;
    }

    if(description == ''){
        $("#description_err").html("Please enter Description");
        check = 1;
    }

   
    if(check == 1)
    {
        return false;
    }
    else
    {
        

        var form_data = new FormData($('#addPage')[0]);
        var method = 'add';
        if(page_id == ''){
            method =  'add';
        }else{
            method = 'edit'; 
        }
        $('.loader').show();
        $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url(BACKEND_FOLDER.'/pages/');?>"+method,
            data        : form_data,
            contentType : false,
            cache       : false,
            processData : false,
            success     : function(response)
            {	
                console.log(response);
                response = JSON.parse(response);
                if(response.status == 'success'){
                    $('#success_msg').show();
                    $("#success_msg").html('<b>'+response.message+'</b>');
                    $("#success_msg").css({"color": response.color});
                }

                setTimeout(function() {
                    
                    if(response.status == 'success')
                    {
                        $('#addPage')[0].reset();
                        $("#addPage").slideUp(); 
                        $('#success_msg').fadeOut();
                       var page_number = $('#pagination .selected').attr('data-page');
                        if(page_id == ''){
                            get_post_list(0,true);
                        }else{
                            get_post_list(page_number,false);
                        }
                    }else{
                        $('#page_name_err').fadeOut();
                        $('#page_name_err').fadeOut();
                    }
                }, 2000);
                $('.loader').hide();
            }
        });
    }
}

function verify_url(){
    $('.loader').show();
    $('#url_slug_err').html('');
    if($.trim($('#url_slug').val()) == ''){
        $('#url_slug_err').html('Please enter the URL');
    }else{
        slug(1);
    }
}

var error_found = false;
function slug(check = '') {
    var page_id = $.trim($('#page_id').val());
    if(check == '' && page_id != ''){
        return false;
    }
    $('#urlVerified').hide();
    $('#submit_btn').attr('disabled', true);
    $('#url_slug_err').html('');
    var slug = '';
    var trimmed = '';
    if(check == '1'){
        trimmed = $.trim($('#url_slug').val());
    }else{
        trimmed = $.trim($('#page_name').val());
    }

    slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');

    slug = slug.toLowerCase();
   
    $('#url_slug').val(slug);
    
     $.ajax({
        url: '<?php echo base_url(BACKEND_FOLDER.'/pages/get_slug');?>',
        data: {'slug': slug, 'id' : page_id}, 
        type: "post",
        success: function(data){
           if(data.trim() == 'Yes'){
             $('#url_slug').css('border','1px solid red');
             $('#url_slug_err').html('Url already exists. Try anoter Name');
             $('#submit_btn').attr('disabled', true);
             $('#urlVerified').hide();
             error_found = true;
           }
           else{
             $('#url_slug').css('border','');
             $('#url_slug_err').html('');
             $('#submit_btn').attr('disabled', false);
             $('#verifyBtn').hide();
             $('#urlVerified').show();
             error_found = false;
           }
           $('.loader').hide();
        }
      });
}

function disable_btn(v = ''){
    if(v == '1'){
        $('#verifyBtn').show();
        $('#urlVerified').hide();
    }
    $('#submit_btn').attr('disabled', true);
}



function custom_date(d){
    const months =["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
    const weekdays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    let formattedDate = new Date(d);
    let day   = weekdays[formattedDate.getUTCDay()];
    let month = months[formattedDate.getUTCMonth()];
    let date  = formattedDate.getDate();
    let year  = formattedDate.getFullYear();
    let created_date = day + ", "+date + "-" + month + "-" + year;
    return created_date;
}
</script>
