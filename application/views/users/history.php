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
                    <option selected>Ongoing</option>
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

        <div class="table_con">
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
<?php $this->load->view('users/footer'); ?>