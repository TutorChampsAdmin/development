<form action="<?php echo base_url(); ?>order/" method="post" enctype="multipart/form-data" id="orderform">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
        value="<?php echo $this->security->get_csrf_hash(); ?>" />
    <div class="form_innBox">
        <div class="form_fields">
            <textarea class="textarea" name="Details" placeholder="Type your question here" required></textarea>
        </div>
        <div class="form_fields">
            <div class="upload_MFile">
                <span class="fileinput-button" id="fileinput-button">
                    <span><i class="fas fa-cloud-upload-alt" aria-hidden="true"></i><br><span>Drop your file or
                            Browse</span> </span>
                    <input type="file" name="files" id="files" multiple accept="image/jpeg, image/png, image/gif,"
                        required><br />
                </span>
                <output id="Filelist"></output>
            </div>
        </div>
    </div>
    <div class="text-center">
        <input type="submit" class="r_btn" value="Submit">
        <p class="p_text pt-3">Your desired grade is just a click away!</p>
    </div>
</form>