<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot;?>images/close_icon.png" alt=""/></span></button>
            <h4 class="modal-title" id="myModalLabel">View Company Policy</h4>
        </div>
        <div class="modal-body clearfix">
            <h5>View Company Policy</h5>
            <div class="col-md-12 spc ">
                <textarea rows="5" id="popupDesc">
                   <?php echo @$employeeDetail['EmployeeDetail']['company_policy']; ?>
                </textarea>
            </div>

        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center spc btm_btns">
                <button ng-click="addCompanyPolicy('committee_desc')" class="btm_btns" type="button">Save</button>
                <a data-dismiss="modal" aria-label="Close" class="cncel_btn" href="javascript:void(0)">Cancel</a>
            </div>
        </div>
    </div>
</div>