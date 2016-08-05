<div class="modal-dialog" role="document" ng-app="autocompleteDemo">
    <form id="editEmail" ng-submit="editEmail('<?php echo $email; ?>')">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
                <h4 class="modal-title" >
                    Edit Email
                </h4>
            </div>
            <div class="modal-body form_fields  rolenew clearfix">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="<?php echo $email; ?>" name="data[EmployeeDetail][email]" class="form-control" placeholder="Email">
                </div>
           </div>
            <div class="modal-footer mar15">
                <div class="col-md-12 text-center spc btm_btns">
                    <button type="submit">Save</button>
                    <a class=" cncel_btn" data-dismiss="modal" aria-label="Close" href="javascript:void(0)">Cancel</a> 
                </div>
            </div>
        </div>
    </form>
</div>

