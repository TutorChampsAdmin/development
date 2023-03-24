<section class="deadline-sec">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-sub">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="manage-deadline">
                            <h2>Tutors</h2>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6" style="display:"><br>
                       
                    </div>
                </div>
            </div> 
           
            <div class="row">
                <div class="col-md-6 col-lg-6"></div>
                <div class="col-lg-5 col-md-5 col-xs-12 mt-auto text-left record" style="padding:0">
                    <input type="search" name="search_string" id="search_string" placeholder="Search users.." class="form-control">
                </div>
                <div class="col-lg-1 col-md-1 col-xs-12 mt-auto text-left record" style="padding: 0 16px;">
                   <button type="button" class="btn button-deflt" onclick=" get_user_list(0, true); " style="height: 37px;padding: 0 12px">Search</button>
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
                                    <th>Tutor ID</th>
                                    <th>Name</th>
                                    <th>Email </th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Grade</th>
                                    <th>Added On</th>
                                    <th>Action</th>
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
 <!--<td style="text-align:center">
                                <a title="Update Page" style="cursor:pointer;" onclick="get_page_by_id(`+users[i].id+`)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a style="cursor:pointer;" href='`+base_url+urlPrefix+users[i].url_slug+`' title='`+base_url+urlPrefix+users[i].url_slug+`' target='_blank'><i class="fa fa fa-eye" aria-hidden="true"></i></a>
                            </td>-->
<script type="text/javascript">



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
         get_user_list(pagenumber, false);
         }
     });
 }
 
$(document).ready(function(){
    get_user_list(0, true);  
});


function get_user_list(rowno, create_page)
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
        url         : "<?php echo base_url(BACKEND_FOLDER.'/tutors?get_list=1');?>",
        dataType    : 'json',
        data        : {data:dataString},
        success     : function(response)
        {   
                
            response = JSON.parse(JSON.stringify(response));
            var page_list ='';
            var base_url = '<?php echo base_url();?>';
            var users    = response['userList']; 
            var total    = response['total_users']; 
            var perpage  = response['rowperpage']; 
            
            if(users.length > 0)
            {
                for (var i in users) 
                {   
                    if(rowno == '0'){
                        var sr = parseInt(i) + 1;
                    }else{
                        var sr = parseInt(i) + 1+parseInt(parseInt(perpage)*parseInt(rowno-1));
                    }
                    

                    var status = 'Active';
                    if(users[i].status == 0)
                    {
                        status = 'Inactive';
                    }
                    
                    var result = 'NA';
                    if(users[i].result != null)
                    {
                        result = users[i].result;
                    }
                    var passText = ``;
                    if(users[i].result != 'Pass' && users[i].result != null){
                        passText = `<a href="javascript:void(0)" title="Delete User" style="cursor:pointer;" onclick="pass_fail(`+users[i].tutor_id+`)"> Mark as Pass</a>`;
                    }
                    
                    var grade = 'NA';
                    if(users[i].grade != null)
                    {
                        grade = users[i].grade;
                    }

                   //
                    var created_date = custom_date(users[i].date_joined);
                    page_list += `<tr>
                            <td>`+sr+`</td>
                            <td>T`+users[i].tutor_id+`</td>
                            <td>`+users[i].name+`</td>
                            <td>`+users[i].email+`</td>
                            <td>`+users[i].phone+`</td>
                            <td>`+users[i].subject+`</td>
                            <td>`+result+`</td>
                            <td>`+grade+`</td>
                            <td>`+created_date+`</td>
                             <td>
                                <a href="javascript:void(0)" title="Delete User" style="cursor:pointer;color:red;" onclick="delete_user(`+users[i].tutor_id+`)"> Delete</a><br>
                                `+passText+`
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


function delete_user(id){
    if(confirm('Are you sure.')){
        $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url(BACKEND_FOLDER.'/tutors/delete-tutor');?>",
            data        : {uid:id},
            success     : function(response)
            {
                alert('Tutor deleted successfuly.');
            }
        });
    }
     
}

function pass_fail(id){
    if(confirm('Are you sure.')){
         $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url(BACKEND_FOLDER.'/tutors/make-tutor-pass');?>",
            data        : {uid:id},
            success     : function(response)
            {
                alert('Tutor mark as pass successfuly.');
            }
        });
    }
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
