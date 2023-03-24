<section class="deadline-sec">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-sub">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="manage-deadline">
                            <h2>Students</h2>
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
                                    <th>Student ID</th>
                                    <th>Email </th>
                                    <th>Phone</th>
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
        url         : "<?php echo base_url(BACKEND_FOLDER.'/users?get_list=1');?>",
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

                   //
                    var created_date = custom_date(users[i].date_joined);
                    page_list += `<tr>
                            <td>`+sr+`</td>
                            <td>S`+users[i].id+`</td>
                            <td>`+users[i].email+`</td>
                            <td>`+users[i].phone+`</td>
                            <td>`+created_date+`</td>
                            <td>
                                <a title="Delete User" style="cursor:pointer;color:red" onclick="delete_user(`+users[i].id+`)"> Delete</a>
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
                alert('User deleted successfuly.');
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
