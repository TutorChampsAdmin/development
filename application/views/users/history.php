<?php $this->load->view('users/head'); ?>
<div class="mainContent DashboardContent">
    <div class="live_session_content active_">

        <div class="head_content">
            <h2>Order Summary</h2>
        </div>

        <div class="filter_sec">
            <div class="filter_drop">
                <label for="order_dropdown"><i class="fa fa-filter"></i></label>
                <select id="order_dropdown">
                    <option selected>All</option>
                    <option>Ongoing</option>
                    <option>Pending</option>
                    <option>Delivered</option>
                    <option>Refunded</option>
                    <option>Cancelled</option>
                </select>
            </div>
            <div class="search_box">
                <label for="search"><i class="fa fa-search"></i> </label>
                <input class="search" id="search" type="search" placeholder="Search by Order Id Or Service">
            </div>
        </div>



        <div class="table_con" id="all">
            <table class="table table-striped" style="margin: 0;">
                <tr class="thead"
                    style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-top: 2px solid #43b97e;text-align: center;">
                    <td>Order ID</td>
                    <td>Assignment File</td>
                    <td>Deadline</td>
                    <td>Subject</td>
                    <td>Status</td>
                </tr>
                <?php
                foreach ($orders as $order) {
                    if ($order['duration'] == '') { ?>
                        <tr style="font-size: 15px; color: #000;width: 100%; border-top: 2px solid #43b97e;text-align: center;">
                            <td><a href="<?php echo base_url(); ?>dashboard/tracking/<?php echo $order['order_id']; ?>"><?php echo $order['order_id'] ?></a></td>
                            <?php if ($order['assignment'] != '') { ?>
                                <td><a href="<?php echo base_url() . $order['assignment']; ?>">Preview</a> </td>
                            <?php } else { ?>
                                <td>No File</td>
                            <?php } ?>
                            <td>
                                <?php echo $order['deadline']; ?>
                            </td>
                            <td>
                                <?php echo $order['subject']; ?>
                            </td>
                            <td>
                                <?php echo $order['status']; ?>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>





        <!-- ongoing orders -->
        <div class="table_con" style="display:none;" id="Ongoing">
            <table class="table table-striped" style="margin: 0;">
                <tr class="thead"
                    style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-top: 2px solid #43b97e;text-align: center;">
                    <td>Order ID</td>
                    <td>Description</td>
                    <td>Assignment File</td>
                    <td>Deadline</td>
                    <td>Subject</td>
                </tr>
                <?php
                foreach ($orders as $order) {
                    if ($order['duration'] == '' and $order['status']=='Assignment In progress') { ?>
                        <tr style="font-size: 15px; color: #000;width: 100%; border-top: 2px solid #43b97e;text-align: center;">
                            <td><a href="<?php echo base_url(); ?>dashboard/tracking/<?php echo $order['order_id']; ?>"><?php echo $order['order_id'] ?></a></td>
                            <td>
                                <?php echo $order['description']; ?>
                            </td>
                            <?php if ($order['assignment'] != '') { ?>
                                <td><a href="<?php echo base_url() . $order['assignment']; ?>">Preview</a> </td>
                            <?php } else { ?>
                                <td>No File</td>
                            <?php } ?>
                            <td>
                                <?php echo $order['deadline']; ?>
                            </td>
                            <td>
                                <?php echo $order['subject']; ?>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>


        <!-- pendings orders -->

        <div class="table_con" style="display:none;" id="Pending">
            <table class="table table-striped" style="margin: 0;">
                <tr class="thead"
                    style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-top: 2px solid #43b97e;text-align: center;">
                    <td>Order ID</td>
                    <td>Description</td>
                    <td>Assignment File</td>
                    <td>Deadline</td>
                    <td>Reason</td>
                </tr>
                <?php
                foreach ($orders as $order) {
                    if ($order['duration'] == '' and $order['status']=='Awaiting Confirmation') { ?>
                        <tr style="font-size: 15px; color: #000;width: 100%; border-top: 2px solid #43b97e;text-align: center;">
                            <td><a href="<?php echo base_url(); ?>dashboard/tracking/<?php echo $order['order_id']; ?>"><?php echo $order['order_id'] ?></a></td>
                            <td>
                                <?php echo $order['description']; ?>
                            </td>
                            <?php if ($order['assignment'] != '') { ?>
                                <td><a href="<?php echo base_url() . $order['assignment']; ?>">Preview</a> </td>
                            <?php } else { ?>
                                <td>No File</td>
                            <?php } ?>
                            <td>
                                <?php echo $order['deadline']; ?>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>







        <!-- completed orders -->
        <div class="table_con"  style="display:none;" id="Delivered">
            <table class="table table-striped" style="margin: 0;">
                <tr class="thead"
                    style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-top: 2px solid #43b97e;text-align: center;">
                    <td>Order ID</td>
                    <td>Subject</td>
                    <td>Solution File</td>
                    <td>Feedback</td>

                </tr>
                <?php
                foreach ($orders as $order) {
                    if ($order['duration'] == '' and $order['status']=='Assignment Completed') { ?>
                        <tr style="font-size: 15px; color: #000;width: 100%; border-top: 2px solid #43b97e;text-align: center;">
                            <td><a href="<?php echo base_url(); ?>dashboard/tracking/<?php echo $order['order_id']; ?>"><?php echo $order['order_id'] ?></a></td>
                            <td>
                                <?php echo $order['subject']; ?>
                            </td>
                            <?php if ($order['assignment'] != '') { ?>
                                <td><a href="<?php echo base_url() . $order['assignment']; ?>">Preview</a> </td>
                            <?php } else { ?>
                                <td>No File</td>
                            <?php } ?>
                            <td>
                                Feedback
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>





        <!-- cancelled -->



        <div class="table_con"  style="display:none;" id="Cancelled">
            <table class="table table-striped" style="margin: 0;">
                <tr class="thead"
                    style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-top: 2px solid #43b97e;text-align: center;">
                    <td>Order ID</td>
                    <td>Description</td>
                    <td>Assignment File</td>
                    <td>Deadline</td>
                    <td>Reason</td>
                </tr>
                <?php
                foreach ($orders as $order) {
                    if ($order['duration'] == '' and $order['status']=='Order Rejected') { ?>
                        <tr style="font-size: 15px; color: #000;width: 100%; border-top: 2px solid #43b97e;text-align: center;">
                            <td><a href="<?php echo base_url(); ?>dashboard/tracking/<?php echo $order['order_id']; ?>"><?php echo $order['order_id'] ?></a></td>
                            <td>
                                <?php echo $order['description']; ?>
                            </td>
                            <?php if ($order['assignment'] != '') { ?>
                                <td><a href="<?php echo base_url() . $order['assignment']; ?>">Preview</a> </td>
                            <?php } else { ?>
                                <td>No File</td>
                            <?php } ?>
                            <td>
                                <?php echo $order['deadline']; ?>
                            </td>
                            <td>
                                Reason
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>




        <!-- refunded -->


        <div class="table_con"  style="display:none;" id="Refunded">
            <table class="table table-striped" style="margin: 0;">
                <tr class="thead"
                    style="font-size: 15px;font-weight: 500;color: #000;border-top: none;width: 100%;background: #47bf7f;border-top: 2px solid #43b97e;text-align: center;">
                    <td>Order ID</td>
                    <td>Assignment File</td>
                    <td>Deadline</td>
                    <td>Subject</td>
                </tr>
                <?php
                foreach ($orders as $order) {
                    if ($order['duration'] == '') { ?>
                        <tr style="font-size: 15px; color: #000;width: 100%; border-top: 2px solid #43b97e;text-align: center;">
                            <td><a href="<?php echo base_url(); ?>dashboard/tracking/<?php echo $order['order_id']; ?>"><?php echo $order['order_id'] ?></a></td>
                            <?php if ($order['assignment'] != '') { ?>
                                <td><a href="<?php echo base_url() . $order['assignment']; ?>">Preview</a> </td>
                            <?php } else { ?>
                                <td>No File</td>
                            <?php } ?>
                            <td>
                                <?php echo $order['deadline']; ?>
                            </td>
                            <td>
                                <?php echo $order['subject']; ?>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>



    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $("#live_session").addClass('active');
</script>
<script>
    $("#order_dropdown").on('change',function(){
        var content = $("#order_dropdown option:selected").text();
        $("#Ongoing").css({'display':'none'});
        $("#all").css({'display':'none'});
        $("#Pending").css({'display':'none'});
        $("#Cancelled").css({'display':'none'});
        $("#Refunded").css({'display':'none'});
        $("#Delivered").css({'display':'none'});
        $("#"+content).css({'display':'block'});
    })

</script>
<?php $this->load->view('users/footer'); ?>