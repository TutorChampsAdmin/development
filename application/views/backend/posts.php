<section class="deadline-sec">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-sub">
                <div class="row"> 
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="manage-deadline">
                            <h2>Blog Posts</h2>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6" style="display:"><br>
                        <a class=" btn button-deflt addForm" href="javascript:void(0)" style="float: right;">Add New Post</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-sm-12">
                <form class="addConForm" action="" method="post" role="form" id="addPost" style="display:none" enctype="multipart/form-data">
                    
                    <fieldset class="PageP">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="manage-deadline">
                                    <h2 id="heading_id">Add Post</h2>
                                </div>
                            </div>
                             <div class="col-md-6 col-xs-4">
                                <label for="dtp_input1">Category<span style="color:red;">*</span></label>
                                <select name="category_id" class="form-control" id="category_id">
                                    <option value='0'>Select post category</option>
                                    <?php 
                                        $this->db->select(array('*'));
                                        $this->db->from('post_categories');
                                        $this->db->where('status', '1');
                                        $query = $this->db->get();
                                        $categories =  $query->result_array();
                                        foreach($categories as $cat){ ?>
                                            <option value='<?php echo $cat['id']?>'><?php echo $cat['name'];?></option>
                                        <?php } ?>
                                </select>
                                <span id="category_id_err" style="color: #F00; font-weight: bold;"></span>
                            </div>
                            <div class="col-md-6 col-xs-4">
                                <label for="dtp_input1">Title<span style="color:red;">*</span></label>
                                <input type="text" name="post_name" class="form-control" id="post_name" placeholder="Page Name" onblur="return slug()" onkeyup="disable_btn()">
                                <span id="post_name_err" style="color: #F00; font-weight: bold;"></span>
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
                             <div class="col-md-3 col-xs-3">
                                <label for="dtp_input1" class="mb-2">List Page Image <span style="color: red;">*</span></label>
                                <input type="file" name="list_image" class="form-control" id="list_image" value="Upload"/>
                                <span id="list_image_err" style="color: #f00; font-weight: bold;"></span>
                                <img width="70px;" id="show_image2" style="display:none;">
                            </div>
                            <div class="col-md-3 col-xs-3">
                                <label for="dtp_input1" class="mb-2">Upload Logo <span style="color: red;">*</span></label>
                                <input type="file" name="featured_image" class="form-control" id="featured_image" value="Upload"/>
                                <span id="featured_image_err" style="color: #f00; font-weight: bold;"></span>
                                <img width="70px;" id="show_image" style="display:none;">
                            </div>
                            <br>
                            <br>
                            <div class="col-md-12 col-xs-12" style="margin-top: 20px;">
                                <input type="hidden" name="post_id" id="post_id" value="">
                                <input type="hidden" name="hyd_featured_image" id="hyd_featured_image" value="">
                                <input type="hidden" name="hyd_hyd_list_image" id="hyd_hyd_list_image" value="">
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
                    <input type="search" name="search_string" id="search_string" placeholder="Search post.." class="form-control">
                </div>
                <div class="col-lg-1 col-md-1 col-xs-12 mt-auto text-left record" style="padding: 0 16px;">
                   <button type="button" class="btn button-deflt" onclick="get_post_list(0, true);" style="height: 37px;padding: 0 12px">Search</button>
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
                                    <th>Featured Image</th>
                                    <th>Category</th>
                                    <th class="hidden-xs hidden-sm">Title</th>
                                    <th class="hidden-xs hidden-sm">Description </th>
                                    <th class="hidden-xs hidden-sm">Url </th>
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
        $("#addPost").slideToggle(); 
        $("#post_id").val(''); 
        $("#post_name").val('');
        $("#status_active").prop("checked", true);
        $("#heading_id").html("Add Post");  
        $("#submit_btn").html("Add");
        $("#show_image").hide();
        $("#show_image").attr('src', '');
        $('#addPost')[0].reset();
    });
    $(".cancelBtn").on('click', function()
    {
        $("#addPost").slideToggle(); 
        $("#post_id").val(''); 
        $("#post_name").val('');
        $("#status_active").prop("checked", true);
        $("#heading_id").html("Add Post");  
        $("#submit_btn").html("Add");
        $("#show_image").hide();
        $("#show_image").attr('src', '');
        $('#addPost')[0].reset();
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
    get_post_list(0,true);    
});



function get_post_list(rowno, create_page)
{    $('.loader').show();
	var search_string = $('#search_string').val();
    var postData = 
                {
                   "search_string":search_string,
                    "rowno":rowno
                }
    var dataString = JSON.stringify(postData);
	$.ajax({
		type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/blog-posts?get_list=1');?>",
		dataType    : 'json',
        data        : {data:dataString},
		success     : function(response)
		{	
            response = JSON.parse(JSON.stringify(response));
            var posts    = response['postList']; 
            var total    = response['total_posts']; 
            var perpage  = response['rowperpage']; 
			var page_list ='';
            var base_url = '<?php echo base_url();?>';
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
                    var index_follow = 'Yes';
                    if(posts[i].index_follow == 0)
                    {
                        index_follow = 'No';
                    }
                    var regX = /(<([^>]+)>)/ig;
                    var description = posts[i].description.replace(regX, "").substr(0,60)+'...';
                   
                    var created_date = custom_date(posts[i].created_date);
					page_list += `<tr>
                            <td>`+sr+`</td>
                            <td><img src='`+base_url+posts[i].featured_image+`' style="width: 100px;"></td>
                            <td>`+posts[i].category_name+`</td>
                            <td>`+posts[i].title+`</td>
                            <td>`+description+`</td>
                            <td><a href='`+base_url+`blog/`+posts[i].url_slug+`/' title='`+base_url+posts[i].url_slug+`/' target='_blank'>`+posts[i].url_slug.substr(0,40)+`</a></td>
                            <td>`+posts[i].first_name+' '+posts[i].last_name+`</td>
                            <td>`+created_date+`</td>
							<td>`+status+`</td>
							<td>
                                <a title="Update Page" style="cursor:pointer;" onclick="get_post_by_id(`+posts[i].id+`)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							</td>
						</tr>`
				}
                 if(create_page && total > perpage){
                    $('#pagination').show(); 
                    create_pagination((total/perpage),5);
                }
			}
			else
			{
				page_list += `<tr>
						<td colspan="9" style="text-align: center;">No Record is founds!</td>
					</tr>`;
                 $('#pagination').hide(); 
			} 
            $('#total_records').html(total); 
            $('#page_div').html(page_list); 

            $('.loader').hide();
		}
	});
}


function get_post_by_id(id)
{   
    $("#show_image").hide();
    $("#show_image").attr('src', '');
    $('.loader').show();
    $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/blog-posts/');?>"+id+"?get_list=1",
        dataType    : 'json',
        success     : function(response)
        {	
            var posts    = response['postList'];
            var id  = posts.id; 
            var base_url = '<?php echo base_url();?>';
            if(id > 0)
            {   
                var status          = posts.status;
                var index_follow          = posts.index_follow;  

                $("#post_id").val(id); 
                $("#post_name").val(posts.title);
                $("#url_slug").val(posts.url_slug);
                $("#meta_title").val(posts.meta_title);
                $("#meta_keywords").val(posts.meta_keywords);
                $("#meta_description").val(posts.meta_description);
                $("#category_id").val(posts.category_id);
                $("#description").val(posts.description);
                $("#hyd_featured_image").val(posts.featured_image);
                $("#hyd_hyd_list_image").val(posts.hyd_list_image);
                $("#show_image").show();
                $("#show_image").attr('src', base_url+posts.featured_image);

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
                $("#heading_id").html("Edit Page");  
                $("#submit_btn").html("Update");
                $("#addPost").slideDown();
        
            }

            $('.loader').hide();
        }
    });
}


function validate_page()
{
    $("#post_name_err, #meta_title_err, #meta_keywords_err, #meta_description_err, #description, #featured_image_err, #category_id_err").html("");
    $('.loader').show();
   
    var post_name       = $.trim($('#post_name').val());
    var url_slug        = $.trim($('#url_slug').val());
    var meta_title      = $.trim($('#meta_title').val());
    var meta_keywords   = $.trim($('#meta_keywords').val());
    var meta_description = $.trim($('#meta_description').val());
    var description     = $.trim($('#description').val());
    var featured_image  = $.trim($('#featured_image').val());
    var list_image  = $.trim($('#list_image').val());
    var hyd_featured_image  = $.trim($('#hyd_featured_image').val());
    var post_id         = $.trim($("#post_id").val());
    var category_id         = $.trim($("#category_id").val());
    
    var status          = $('input[name="status"]:checked').val();
    var check           = 0;
    
     if(category_id == '0'){
        $("#category_id_err").html("Please select post category.");
        check = 1;
    }

    if(post_name == ''){
        $("#post_name_err").html("Please enter post name.");
        check = 1;
    }

    if(meta_title == ''){
        $("#meta_title_err").html("Please enter meta title.");
        check = 1;
    }

    if(meta_keywords == ''){
        $("#meta_keywords_err").html("Please enter meta keywords.");
        check = 1;
    }

    if(meta_description == ''){
        $("#meta_description_err").html("Please enter meta description.");
        check = 1;
    }

    if(description == ''){
        $("#description_err").html("Please enter description.");
        check = 1;
    }

  /*  if(list_image == '' && hyd_list_image == ''){
        $("#list_image_err").html("Please select image");
        check = 1;
    }*/
    if(featured_image == '' && hyd_featured_image == ''){
        $("#featured_image_err").html("Please select image");
        check = 1;
    }

   
    if(check == 1)
    {
        return false;
    }
    else
    {
        $('.loader').show();
        $('#submit_btn').html('Please wait...'); 
        var form_data = new FormData($('#addPost')[0]);
        var method = 'add';
        if(post_id == ''){
            method =  'add';
        }else{
            method = 'edit'; 
        }
        $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url(BACKEND_FOLDER.'/blog-posts/');?>"+method,
            data        : form_data,
            contentType : false,
            cache       : false,
            processData : false,
            success     : function(response)
            {	

                response = JSON.parse(response);
                if(response.status == 'success'){
                    $('#success_msg').show();
                    $("#success_msg").html('<b>'+response.message+'</b>');
                    $("#success_msg").css({"color": response.color});
                }

                setTimeout(function() {
                    
                    if(response.status == 'success')
                    {
                        $('#addPost')[0].reset();
                        $("#addPost").slideUp(); 
                        $('#success_msg').fadeOut();
                       
                        var page_number = $('#pagination .selected').attr('data-page');
                        if(page_id == ''){
                            get_post_list(0,true);
                        }else{
                            get_post_list(page_number,false);
                        }
                    }else{
                        $('#post_name_err').fadeOut();
                        $('#post_name_err').fadeOut();
                    }
                }, 3000);

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
    var post_id = $.trim($('#post_id').val());
    if(check == '' && post_id != ''){
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
        trimmed = $.trim($('#post_name').val());
    }

    slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
    slug = slug.toLowerCase();
   
    $('#url_slug').val(slug);
    
     $.ajax({
        url: '<?php echo base_url(BACKEND_FOLDER.'/blog-posts/get_slug');?>',
        data: {'slug': slug, 'id' : post_id}, 
        type: "post",
        success: function(data){
           if(data.trim() == 'Yes'){
             $('#url_slug').css('border','1px solid red');
             $('#url_slug_err').html('Url already exists. Try anoter URL');
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
