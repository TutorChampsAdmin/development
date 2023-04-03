
<style type="text/css">
.modal-backdrop{
   display: none; 
}
#CommentsLists{
  margin: 0 auto;
  max-width: 800px;
}


.chat-list {
    padding: 0;
    font-size: .8rem;
}

.chat-list li {
    margin-bottom: 10px;
    overflow: auto;
    color: #ffffff;
}

.chat-list .chat-img {
    float: left;
    width: 48px;
}

.chat-list .chat-img img {
    -webkit-border-radius: 5;
    -moz-border-radius: 50px;
    border-radius: 50px;
    width: 100%;
}

.chat-list .chat-message {
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    background: #5a99ee;
    display: inline-block;
    padding: 7px 15px 8px;
    position: relative;
}

.chat-list .chat-message:before {
    /*content: "";
    position: absolute;
    top: 24px;
    width: 0;
    height: 0;*/
}

.chat-list .chat-message h5 {
    margin: 0 0 2px 0;
    font-size: 8px;
    font-weight: 300;
}

.chat-list .chat-message p {
    line-height: 18px;
    margin: 0;
    padding: 0;
    color:#fff;
}

.chat-list .chat-body {
    margin-left: 5px;
    float: left;
    width: 70%;
}

.chat-list .in .chat-message:before {
    left: -12px;
    border-bottom: 20px solid transparent;
    border-right: 20px solid #5a99ee;
}

.chat-list .out .chat-img {
    float: right;
}

.chat-list .out .chat-body {
    float: right;
    margin-right: 0px;
    text-align: right;
}
.chat-img{display: none;}
.chat-list .out .chat-message {
    background: #08b07b;
}

.chat-list .out .chat-message:before {
    right: -12px;
    border-bottom: 20px solid transparent;
    border-left: 20px solid #fc6d4c;
}

.msgcard .msgcard-header:first-child {
    -webkit-border-radius: 0.3rem 0.3rem 0 0;
    -moz-border-radius: 0.3rem 0.3rem 0 0;
    border-radius: 0.3rem 0.3rem 0 0;
}
.msgcard .msgcard-header {
    background: #17202b;
    border: 0;
    font-size: 1rem;
    padding: .65rem 1rem;
    position: relative;
    font-weight: 600;
    color: #ffffff;
}

.Chatcontent{
    margin-top:40px;    
}
.dateSection{
    font-size: 10px;
    margin-top: 9px;
    color: #777;
    width: 100%;
    text-align: left;
}
.cmt_att img {
    display: inline-block;
    width: 50px;
    margin: 15px 2px;
}

.cmt_att .fa-file {
    display: inline-block;
    font-size: 35px;
    margin: 15px 2px;
}

.chatPopup{
    bottom: 10px;
    top: auto;
    height: 520px;
    max-height: 100vh;
    max-width: 380px;
    width: 100%;
    right: 10px; padding: 0!important;
    left: auto;
}
.attach_file{    width: 24px;
    height: 24px;
    margin-right: 10px;
    overflow: hidden;}
.attach_file i{font-size: 20px;
    color: #a6a6a6;
    width: 24px;
    height: 24px;
    text-align: center;
    line-height: 26px;}
.msz_box{width: 100%; position: relative;}
.msz_box .err{    font-size: 10px;
    text-align: center;
    position: absolute;
    width: 100%;
    display: none;
    bottom: -14px;}
.chatPopup textarea{font-size: 13px; border-radius: 60px;
    line-height: 20px; padding: 4px 12px 6px;}
.send_btn button{padding: 0 8px; margin-top: -9px;}
.send_btn button i{transform: rotate(35deg); font-size: 18px;}
.chatPopup button:focus, .chatPopup textarea:focus{outline: none; box-shadow: none;}
.message_con{ flex-wrap: nowrap; align-items: center;}
.attach_file input{    margin-top: -27px;
    width: 24px;
    height: 24px;
    opacity: 0;}
.chatPopup .modal-title{font-size: 17px!important;}
.chatPopup .modal-body{padding: 0!important;     height: 410px;
    overflow: auto;}
.chatPopup > div{margin: 0!important;}
.chatPopup .card-body{padding: 15px 10px 10px;}
.chatPopup .close{    font-size: 18px;
    padding: 0;
    margin: 0;
    color: #fff;
    opacity: 1;}
</style>
</style>
<div class="modal chatPopup"  id="myModal">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <div class="modal-header" style="padding: 0.5rem 1rem; background: #08b07b; color: #fff;">
                <h4 class="modal-title" id="order_code"></h4>
              
                <button type="button" class="close" data-dismiss="modal" onclick="close_detail_popup()" style="font-size: 18px; padding: 0; margin: 0;">&times;</button>
            </div>

            <div class="modal-body">
                <div id="allDetail" style="border-bottom: 1px solid #ddd;"></div>
               
                <div class="msgcard" style="background:#08b07b0d; overflow: auto;">
                <div class="card-body height3 ">
                     
                    <ul class="chat-list" id="CommentsLists"></ul>
                </div>
                
            </div>
            </div>

            <div class="modal-footer">
                <form id="commentForm" method="post" style="width: 95%;" enctype="multipart/form-data">
                    <input type="hidden" name="lmsLeadId" id="lmsLeadId">
                    <input type="hidden" name="lmsLeadStatus" id="lmsLeadStatus">
                  
                    <input type="hidden" name="logged_in_id" value="<?php echo $this->session->userdata('logged_in_id');?>">
                    <input type="hidden" name="logged_in_role" value="<?php echo $this->session->userdata('logged_in_role');?>">
                    
                    <?php if($this->session->userdata('client_user_id') != ''){ ?>
                        <input type="hidden" name="post_comment" id="post_comment" value="yes">
                    <?php } ?>
                    <div class="row message_con">
                        <div class="attach_file">
                            <div class="form-group">
                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                                <input type="file" name="comments_att" class="form-control" multiple id="comments_att">
                                <span class="err" style="color: #f00;" id="comments_att_err"></span>
                            </div>
                        </div>
                        <?php if($this->session->userdata('logged_in_role') != '8'){ ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="checkbox" style="float: right;">
                                        <label>
                                            <input type="checkbox" name="to_writer" value="1"> For Tutor
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="checkbox" style="float: right;">
                                        <label>
                                            <input type="checkbox" name="to_customer" value="1"> For Student
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="msz_box">
                            <textarea class="form-control" name="sendcomments" id="sendcomments" rows="1" placeholder="Type a message.."></textarea>
                            <span class="err" style="color: #f00;" id="sendcomments_err"></span>
                        </div>
                        <div class="send_btn">
                            <button type="button" class="btn btn-submit me-2" id="cmtPostBtn" onclick="check_comment_form()"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
     function close_detail_popup(){
            $('#myModal').modal('hide');
        } 
        
        
        
         function show_order_details(lead_id,order_id,subjectname=''){
             $('.loader').show();
             $('#CommentsLists').html('');
             $('#allDetail').html('');
             $('#commentForm')[0].reset();
             $('#sendcomments_err').html('');
             $('#lmsLeadId').val('');
             $('#lmsAssignLeadId').val('');
             $('#order_code').html('<b>Order : </b>');
             $('#payment_order_code').html('<b>Order : </b>');
             $('#assign_order_code').html('<b>Order : </b>');
    
            /* $.ajax({
                    type        : 'GET',
                    url         : "<?php echo base_url(BACKEND_FOLDER.'/order_detials/');?>"+lead_id,
                    dataType    : 'json',
                    success     : function(response)
                    {   
                        response = JSON.parse(JSON.stringify(response));
                        var order_detail    = response['order_detail'];
                        var base_url = '<?php echo base_url(); ?>';
                        $('#myModal').modal('show');
                       alert(order_detail.order_id);
                        var order_code = order_detail.order_id;
                       
                        $('#order_code').html('<b>Order : </b>'+order_id);
                       
                        $('#lmsLeadId').val(lead_id);   
                         
                        get_order_comments(lead_id);
                    }
                });*/
                
                //$('#order_code').html('<b>Order : </b>'+order_id+' &nbsp;&nbsp;&nbsp;&nbsp;Subject: '+subjectname);
                $('#order_code').html('<b>Order : </b>'+order_id);
                $('#lmsLeadId').val(lead_id);   
                get_order_comments(lead_id);
                $('#myModal').modal('show');
            
        }


        function get_order_comments(lead_id){
            $('.loader').show();
             $.ajax({
                    type        : 'GET',
                    url         : "<?php echo base_url(BACKEND_FOLDER.'/get_comments/');?>"+lead_id,
                    dataType    : 'json',
                    success     : function(response)
                    {   
                        response = JSON.parse(JSON.stringify(response));
                        var total_comments  = response['total_comments'];
                        var order_comments  = response['order_comments'];
                        var commentsHtml    = '';
                        var base_url = '<?php echo base_url(); ?>';
                        var currentUser = '<?php echo $this->session->userdata('logged_in_id');?>';
                        
                        //date_format($date,"d M Y H:i A");
                        if(order_comments.length > 0){
                            for (var i in order_comments) {
                                
                                if(currentUser == order_comments[i].added_by){
                                    var fromToClass = 'out';
                                }else{
                                    var fromToClass = 'in';
                                }
                                    
                                  
                                var userName    = order_comments[i].username;

                                if(userName == null){
                                    userName = '';
                                }
                                var avatar = base_url+'assets/front/images/dummy-avatar.jpg';
                               
                                var noteAttachments = ``;
                                
                                if(order_comments[i].attachment_url != '' && order_comments[i].attachment_url != null) {
                                    var attachments = order_comments[i].attachment_url.split(",");
                                    var actual_file_name_array = order_comments[i].actual_file_name.split(",");
                                    var attachment_size  = attachments.length;
                                    
                                    for(var j = 0; j < attachment_size;j++){
                                        var attachment   = `<?php echo base_url();?>`+attachments[j];
                                        var actual_name  = actual_file_name_array[j];
                                        if(attachments[j].match(/\.(jpg|jpeg|png|gif)$/) ){
                                            noteAttachments += `<a href="`+attachment+`" target="_blank"><img src="`+attachment+`" data-bs-toggle="tooltip" title="`+actual_name+`" /></a>`;
                                        }else{
                                            noteAttachments += `<a href="`+attachment+`" target="_blank"><i class="fa fa-file" data-bs-toggle="tooltip" title="`+actual_name+`"></i></a>`;
                                        }
                                        
                                    }
                                }

                                
                              
                                var commented_on = custom_date2(order_comments[i].added_on);
                                commentsHtml += `<li class="`+fromToClass+`" `+currentUser+`22>
                                                        <div class="chat-img">
                                                            <img alt="Avtar" style="width: 30px;" src="`+avatar+`">
                                                        </div>
                                                        <div class="chat-body">
                                                            <div class="chat-message">
                                                                <h5>`+userName+`</h5>
                                                                <p>`+order_comments[i].message+`</p>
                                                                <div class="cmt_att">`+noteAttachments+`</div>
                                                            </div>
                                                            <p class="dateSection">`+commented_on+`</p>
                                                        </div>
                                                    </li>`;
                            }
                        }else{
                            commentsHtml = `<li style="text-align: center;color: #777;">No comments</li>`;
                        }
                                  
                        $('#CommentsLists').html(commentsHtml);
                        $('.loader').hide();

                    }
                });
        }    
        

        function check_comment_form(){
            var sendcomments      = $.trim($('#sendcomments').val());
            var comments_att      = $.trim($('#comments_att').val());
            $('#sendcomments_err').html('');
            $('#sendcomments_err').show();
            if(sendcomments == '' && comments_att == ''){
                $('#sendcomments_err').html('Please enter your message or select any file.');
                return false;
            }else{
                var lead_id = $('#lmsLeadId').val();
                $('.loader').show();
                $('#cmtPostBtn').html('Please wait...');
                var form_data = new FormData($('#commentForm')[0]);
                $.ajax({
                    type        : 'POST',
                    url         : "<?php echo base_url(BACKEND_FOLDER.'/post_order_comments');?>",
                    data        : form_data,
                    contentType : false,
                    cache       : false,
                    processData : false,
                    success     : function(response)
                    {   
                        $('#cmtPostBtn').html('Send');
                        $('#commentForm')[0].reset();
                        get_order_comments(lead_id);
                    }
                });
                
            }
        }
        
    function custom_date2(d){
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

    $(document).ready(function(){
        setInterval(function(){ var lead_id = $('#lmsLeadId').val(); if(lead_id != '0' && lead_id != ''){ get_order_comments(lead_id);} }, 5000);
    });

</script>






