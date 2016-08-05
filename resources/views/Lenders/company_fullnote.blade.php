<!---------------Note Popup----------->
<div class="modal-dialog" role="document">
    <div class="modal-content notice_dv">
        <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img alt="" src="<?php echo $this->webroot; ?>images/close_icon.png"></button>
            <h4 class="modal-title" id="myModalLabel">Lender Note</h4>
        </div>
        <div class="modal-body  clearfix">
            <div class="col-md-12 general_dv popup_inner full_note">
                <?php echo $notes['LenderNote']['tips']; ?>
            </div>
        </div>

        <div class="modal-footer">
            <div class="col-md-12 text-center spc btm_btns">
                <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Close</a>
            </div>
        </div>

    </div>
</div>
<!---------------Note Popup end----------->  