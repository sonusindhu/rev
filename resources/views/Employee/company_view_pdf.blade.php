<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
                <h4 class="modal-title" id="myModalLabel">View Pdf</h4>
            </div>
            <div class="modal-body clearfix">
                <iframe height="400px" width="100%" src="<?php echo $this->webroot.'upload/hiring_document/'.$filename; ?>">
                </ifame>
            
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center spc btm_btns">
                    <a data-dismiss="modal" aria-label="Close" href="javascript:void(0);" class=" cncel_btn">Cancel</a>
                </div>
            </div>
        </div>
    </div>
