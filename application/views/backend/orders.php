<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: -20px;
  background-color: #ced4da;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 10px 5px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown-content p {
    font-size: 12px;
    color: #000;;
    text-align: left;
    line-height: 10px;
    cursor:pointer;
}

.multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#orderExpert {
  display: none;
  border: 1px #dadada solid;
  max-height: 250px;
  overflow: auto;
  padding: 10px 5px;
  width: 270px;
}

#orderExpert label {
  display: block;
}

#orderExpert label:hover {
  background-color: #1e90ff;
}
table.table.orderAdminP.custom-table p {
    font-size: 13px;
    cursor:pointer;
}
</style>
<video id="notification_Audio" name="media" style="display: none;">
    <source src="<?php echo base_url();?>assets/front/notification.mp3" type="audio/mpeg">
</video>
<section class="deadline-sec">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-sub">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="manage-deadline">
                            <h2>Orders</h2>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6" style="display:"><br>
                       
                    </div>
                </div>
            </div> 
           
            <div class="row">
                <div class="col-md-6 col-lg-6"></div>
                <div class="col-lg-5 col-md-5 col-xs-12 mt-auto text-left record" style="padding:0">
                    <input type="search" name="search_string" id="search_string" placeholder="Search orders.." class="form-control">
                </div>
                <div class="col-lg-1 col-md-1 col-xs-12 mt-auto text-left record" style="padding: 0 16px;">
                   <button type="button" class="btn button-deflt" onclick=" get_order_list(0, true); " style="height: 37px;padding: 0 12px">Search</button>
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
                                    <th style="width:100px;">Order Id</th>
                                    <th>Student Message</th>
                                    <th>Assignment File</th>
                                    <th>Subject</th>
                                    <th style="width:130px;">Deadlin</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Float</th>
                                    <th style="width:110px;">Assigned</th>
                                    <!--<th>Added On</th>-->
                                    <th>Chat</th>
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

<div class="modal" id="floatModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="padding: 0.5rem 1rem;">
                <h4 class="modal-title" id="float_order_code"></h4>
                <button type="button" class="close" data-dismiss="modal" style="font-size: 30px;">&times;</button>
            </div>

            <div class="modal-body">
                <form id="floatForm" method="post" style="width: 95%;height: auto;" enctype="multipart/form-data">
                    <input type="hidden" name="lmsLeadId" id="lmsfloatLeadId">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tutors <span style="color:red;">*</span></label>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes()">
                                      <select class="form-control">
                                        <option>Select an option</option>
                                      </select>
                                      <div class="overSelect"></div>
                                    </div>
                                    <div id="orderExpert">
                                    </div>
                                  </div>
                              
                                <span class="err" style="color: #f00;display: block;" id="orderExpert_err"></span>
                            </div>




                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Expert Amount <span style="color:red;">*</span></label>
                                <input type="number" min="0" class="form-control" name="expert_amount" id="expert_amount">
                                <span class="err" style="color: #f00;display: block;" id="expert_amount_err"></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Comments <span style="color:red;">*</span></label>
                                <textarea class="form-control" name="floatcomments" id="floatcomments" rows="4" placeholder="Type your comment here.."></textarea>
                                <span class="err" style="color: #f00;" id="floatcomments_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                                <button type="button" class="btn button-deflt" style=" height: 37px;padding: 0 40px;float: right;background: #0f7643;" id="asgnPostBtn" onclick="check_float_form()">Float</button>
                        </div>
                      
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                
            </div>

        </div>
    </div>
</div>

<div class="modal" id="confirmModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="padding: 0.5rem 1rem;">
                <h4 class="modal-title" id="float_order_code">Available Tutors</h4>
                <button type="button" class="close" data-dismiss="modal" style="font-size: 30px;">&times;</button>
            </div>

            <div class="modal-body">
                    <input type="hidden" name="lmsLeadId" id="lmsConfirmLeadId">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                               
                                 <table class="table orderAdminP custom-table">
                                     <thead>
                                         <tr>
                                             <th>S.n</th>
                                             <th>Tutor Name / ID</th>
                                             <!--<th>Message</th>-->
                                             <th>Interested</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody id="confrimedTutorsList">
                                         
                                     </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>
                    
            </div>

            <div class="modal-footer">
                
            </div>

        </div>
    </div>
</div>
<input type="hidden" id="preOrderCount" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    function showCheckboxes() {
        $('#orderExpert').toggle();
    }

    function check_float_form(){
            var floatcomments  = $.trim($('#floatcomments').val());
            var expert_amount   = $.trim($('#expert_amount').val());
            var orderExpert     =  $('input[type="checkbox"]:checked').length; 
          
            $('#expert_amount_err,#floatcomments_err,#orderExpert_err').html('');
          
            var errors = false;

            if(orderExpert == '' || parseInt(orderExpert) == 0){
                $('#orderExpert_err').html('Please select expert.');
                errors = true; 
            }

            if(expert_amount == '' || parseInt(expert_amount) < 1){
                $('#expert_amount_err').html('Please enter amount.');
                errors = true; 
            }
          
            if(floatcomments == ''){
                $('#floatcomments_err').html('Please enter your message.');
                errors = true; 
            }
           

            if(errors){
                return false;
            }else{
                var lead_id = $('#lmsfloatLeadId').val();
                $('.loader').show();
                $('#asgnPostBtn').html('Please wait...');
                var form_data = new FormData($('#floatForm')[0]);
                $.ajax({
                    type        : 'POST',
                    url         : "<?php echo base_url(BACKEND_FOLDER.'/post_float_data');?>",
                    data        : form_data,
                    contentType : false,
                    cache       : false,
                    processData : false,
                    success     : function(response)
                    {   
                        $('#asgnPostBtn').html('float');
                        $('#floatForm')[0].reset();
                        $('#floatModal').modal('hide');
                        $('.loader').hide();
                        $('#floate_Option'+lead_id).html('Floated');
                        $('+floate_Option'+lead_id).attr('onclick','');
                         alert('Floated successfuly.');
                    }
                });
                
            }
        }
</script>

            
<script type="text/javascript">

function checkOrderSubject(id,subject){
    var subArrayObj = { Physics: 'Physics', Maths: 'Maths', Chemistry: 'Chemistry', Finance: 'Finance & Account', Botony: 'Botony', Zoology : 'Zoology', Nursing : 'Nursing', Economics : 'Economics',  Mechanical: 'Mechanical Engineering', 'Civil Engineering' : 'Civil Engineering', Electrical : 'Electrical Engineering' ,'Computer Science' : 'Computer Science'};
    
    var orderSubject = ``;
    var options = ``;
               
   $.each(subArrayObj, function( k, v ) {
      
      var selectedSubject = '';
      if(subject == k){
          selectedSubject = 'selected'; 
      }
      
      options += `<option value="`+k+`" `+selectedSubject+`>`+v+`</option>`;
    });
    orderSubject = `<select id="ordSubject_`+id+`" onchange="change_order_subject(`+id+`)" style="border:none"><option value="">-Select-</option>`+options+`</select>`;
    return orderSubject;            
}


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
         get_order_list(pagenumber, false);
         }
     });
 }
 
$(document).ready(function(){
    get_order_list(0, true);  
});


function get_order_list(rowno, create_page)
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
        url         : "<?php echo base_url(BACKEND_FOLDER.'/orders?get_list=1');?>",
        dataType    : 'json',
        data        : {data:dataString},
        success     : function(response)
        {   
                
            response = JSON.parse(JSON.stringify(response));
            var page_list ='';
            var base_url = '<?php echo base_url();?>';
            var orders    = response['orderList']; 
            var total    = response['total_orders']; 
            var perpage  = response['rowperpage']; 
            
            if(orders.length > 0)
            {
                for (var i in orders) 
                {   
                    if(rowno == '0'){
                        var sr = parseInt(i) + 1;
                    }else{
                        var sr = parseInt(i) + 1+parseInt(parseInt(perpage)*parseInt(rowno-1));
                    }
                    

                    var status = 'Active';
                    if(orders[i].status == 0)
                    {
                        status = 'Inactive';
                    }

                    var created_date = custom_date(orders[i].submission_date);
                    var deadline     = custom_date(orders[i].deadline);

                    var file = 'javscript:void(0)';
                    var preview = 'NA';
                    if(orders[i].assignment != '' && orders[i].assignment != null){
                        file = base_url+orders[i].assignment;
                        preview = 'Preview';
                    }
                    var country = 'NA';
                    if(orders[i].country != '' && orders[i].country != null){
                        country =orders[i].country;
                        
                    }

                    var floatMenu = '';
                    var oc_selected = '';
                    var acon_selected = '';
                    var aip_selected = '';
                    var or_selected = '';
                    var rya_selected = '';
                    var ac_selected = '';
                    var check = '';
                    var refund = '';
                    var assigned = 'NA';
                  

                    if(orders[i].status == 'Order Confirmed'){
                        floatMenu = `<p onclick="show_float_popup(`+orders[i].id+`,'`+orders[i].subject+`')" style="cursor:pointer" id="floate_Option`+orders[i].id+`">Float</p>`;
                        var oc_selected = 'selected';
                        if(orders[i].float_ids != '' && orders[i].float_ids != null){
                            floatMenu = `<p>Floated</p>`;
                            
                            assigned = `<p onclick="show_conformation_popup(`+orders[i].id+`)">Interested Tutors</p>`;
                        }
                    }
                    
                    if(orders[i].tutor_id != '0'){
                        floatMenu = `<p>Floated</p>`;
                    }
                    
                    if(orders[i].status == 'Awaiting Confirmation'){
                        var acon_selected = 'selected';
                    }
                    
                    if(orders[i].status == 'Assignment In progress'){
                        var aip_selected = 'selected';
                        
                    }
                    
                    if(orders[i].status == 'Order Rejected'){
                        var or_selected = 'selected';
                    }
                    
                    if(orders[i].status == 'Review Your Assignment'){
                        var rya_selected = 'selected';
                    }
                    
                    if(orders[i].status == 'Assignment Completed'){
                        var ac_selected = 'selected';
                    }
                    if(orders[i].status=='Checking Tutor Availability'){
                        var check='selected';
                    }
                    if(orders[i].status=='Refunded'){
                        var refund='selected';
                    }
                    
                    if(orders[i].tutor_id != '' && orders[i].tutor_id != null && orders[i].tutor_id != '0'){
                        assigned = orders[i].assinged_to;
                    }
                    var regX = /(<([^>]+)>)/ig;
                    var des = orders[i].description.replace(regX, "").substr(0,35);
                    var description = `<span title="`+orders[i].description+`">`+des+`...</span>`;
                    page_list += `<tr>
                             <td>`+sr+`</td>
                            <td>`+orders[i].order_id+`</td>
                            <td>`+description+`</td>
                            <td><a href="`+file+`" target="_blank">`+preview+`</a> </td>
                            <td>`+checkOrderSubject(orders[i].id,orders[i].subject)+`</td>
                            <td>`+orders[i].deadline+`</td>
                            <td>`+country+`</td>
                            <td><select id="orderStatus`+orders[i].id+`" onchange="change_order_status(`+orders[i].id+`,'`+orders[i].first_name+`','`+orders[i].email+`','`+orders[i].order_id+`')" style="border:none">
                                <option value="Awaiting Confirmation" `+acon_selected+`>Awaiting Confirmation</option>
                                <option value="Checking Tutor Availability" `+check+`>Checking Tutor Availability</option>
                                <option value="Order Confirmed" `+oc_selected+`>Order Confirmed</option>
                                <option value="Assignment In progress" `+aip_selected+`>Assignment In progress</option>
                                <option value="Order Rejected" `+or_selected+`>Order Rejected</option>
                                <option value="Review Your Assignment" `+rya_selected+`>Review Your Assignment</option>
                                <option value="Assignment Completed" `+ac_selected+`>Assignment Completed</option>
                                <option value="Refunded" `+refund+`>Refunded</option>
                            </select></td>
                            <td id="floatOption`+orders[i].id+`">`+floatMenu+`</td>
                            <td id="tutotName`+orders[i].id+`">`+assigned+`</td>
                            <td><img src="<?php echo base_url('assets/front/dashboard/images/chat.png')?>" style="width: 35px;" onclick="show_order_details(`+orders[i].id+`,'`+orders[i].order_id+`','`+orders[i].subject+`')"></td>
                            
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


function change_order_status(id,name,email,orderID,subject){
    if(confirm('Are you sure to change the order status.')){
        var status = $('#orderStatus'+id).val();
        console.log(status);
        $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url(BACKEND_FOLDER.'/orders/order-status-change/');?>"+id,
            dataType    : 'json',
            data        : {'name' : name, 'email' : email,'status' : status,'orderID' : orderID},
            success     : function(response)
            {   
                alert('Status Changed successfuly.');
                $('#statusChangeTxt').html('Status Changed successfuly.');
                
            }
        });
        alert('Status Changed successfuly.');
        $('#statusChangeTxt').html('Status Changed successfuly.');
       var floatMenu = '';
        if(status == 'Order Confirmed'){
            floatMenu = `<p onclick="show_float_popup(`+id+`,'`+subject+`')" style="cursor:pointer" id="floate_Option`+id+`">Float</p>`;
        }
        $('#floatOption'+id).html(floatMenu);
    }
}


function change_order_subject(id){
    if(confirm('Are you sure to change the order subject.')){
        var subject = $('#ordSubject_'+id).val();
        $.ajax({
            type        : 'POST',
            url         : "<?php echo base_url(BACKEND_FOLDER.'/orders/change-order-subject');?>",
            dataType    : 'json',
            data        : {id : id,subject:subject },
            success     : function(response)
            {   
                alert('Subject Changed successfuly.');

            }
        });
        alert('Subject Changed successfuly.');
    }
}



function show_float_popup(oid){
    var subject = $('#ordSubject_'+oid).val();
    if(subject == ''){
        alert('Please select order subject');
        return false;
    }
     $('#floatModal').modal('show'); 
     $('#lmsfloatLeadId').val(oid); 
     $('#orderExpert').html('');
     $('.loader').show();
     $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/orders/get_tutors_s/');?>"+subject,
        dataType    : 'json',
        data        : {},
        success     : function(response)
        {   
           response = JSON.parse(JSON.stringify(response));
            var page_list ='';
            var base_url  = '<?php echo base_url();?>';
            var tutors    = response['tutorList']; 
            var total     = response['total_tutors']; 
            var perpage   = response['rowperpage']; 
            var options   = `<option value="">--Select Expert--</option>`;
            if(tutors.length > 0)
            {
                for (var i in tutors) 
                {  
                    var unique_id = tutors[i].unique_id;
                    var subject   = tutors[i].subject;
                    var tutor_id  = tutors[i].tutor_id;
                    var name      = tutors[i].name;
                    options += `<label for="`+tutor_id+`"><input type="checkbox" id="`+tutor_id+`" name="tutorsId[]" value="`+tutor_id+`" /> `+name+`( `+unique_id+` )</label>`;
                }

                $('#orderExpert').html(options);
                $('.loader').hide();
            }
        }
    });
}


function show_conformation_popup(oid){
   
     $('#confirmModal').modal('show'); 
     $('#lmsConfirmLeadId').val(oid); 
     $('#confrimedTutorsList').html(''); 
     $('.loader').show();
     $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/orders/get_confirm_tutors_s/');?>"+oid,
        dataType    : 'json',
        data        : {},
        success     : function(response)
        {   
           response = JSON.parse(JSON.stringify(response));
            var rows ='';
            var base_url  = '<?php echo base_url();?>';
            var tutors    = response['tutorList']; 
           
            for (var i in tutors) 
            {   var sr = parseInt(i) + 1;
                var name            = tutors[i].first_name;
                var email           = tutors[i].email;
                var message         = tutors[i].message;
                var confirmed_on    = tutors[i].confirmed_on;
                var task_id         = tutors[i].task_id ;
                var interested      = tutors[i].interested  ;
                var tutor_id        = tutors[i].tutor_id  ;
                
                if(interested == '1'){
                    var interested = 'Yes';
                    var assignOption = `<button type="button" class="btn button-deflt" onclick="assignToTutor(`+task_id+`,`+tutor_id+`,'`+name+`')">Assign</button>`;
                }else{
                     var interested = 'No';
                     var assignOption = `NA`;
                }
                rows += `<tr>`;
                rows += `<td>`+sr+`</td>`;
                rows += `<td>`+name+` <b>T`+tutor_id+`</b></td>`;
             /*   rows += `<td>`+message+`</td>`;*/
                rows += `<td>`+interested+`</td>`;
                rows += `<td>`+assignOption+`</td>`;
                rows += `</tr>`;
            }

            $('#confrimedTutorsList').html(rows);
            $('.loader').hide();
            
        }
    });
}


function custom_date(d){
    const months =["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
    const weekdays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    let formattedDate = new Date(d);
    let day   = weekdays[formattedDate.getDay()];
    let month = months[formattedDate.getMonth()];
    let date  = formattedDate.getDate();
    let year  = formattedDate.getFullYear();
    let created_date = day + ", "+date + "-" + month + "-" + year;
    return created_date;
}


function assignToTutor(oid,tid,name){
    if(confirm('Are you sure')){
        $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/orders/assign_to/');?>"+oid+'/'+tid,
        success     : function(response)
        {   
            alert('Order assigned to '+ name+ ' successfuly.');
            $('#tutotName'+oid).html(name);
            $('#confirmModal').modal('hide'); 
        }
    });
    }
     
}

function get_order_counts(){
    
    $.ajax({
        type        : 'GET',
        url         : "<?php echo base_url(BACKEND_FOLDER.'/orders/get_order_counts');?>",
        dataType    : 'json',
        data        : {},
        success     : function(response)
        {   
            var preOrderCount = parseInt($('#preOrderCount').val());
            var newOrderCount = parseInt(response);
            if(newOrderCount > preOrderCount ){
                $('#notification_Audio')[0].play();
                get_order_list(0, true); 
                $('#preOrderCount').val(newOrderCount);
            }
        }
    });
    
}

function setcount(){
    $('#preOrderCount').val($('#total_records').html());
}
 $(document).ready(function(){
        setTimeout(setcount, 5000);

        setInterval(function(){ get_order_counts();}, 10000);
});
</script>

<?php $this->load->view('includes/order_detail_popup'); ?>

