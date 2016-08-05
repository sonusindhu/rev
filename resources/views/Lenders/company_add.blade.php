
<!--createnewlender-->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <input type="hidden" value="<?php echo rand(10, 100000); ?>">
            <form id="addLenderForm" ng-submit="addLender('<?php echo $this->webroot; ?>company/lenders/add')">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
                    <h4 class="modal-title" >Create New Lender</h4>
                </div>
                <div class="modal-body clearfix form_fields  createnew_len ">

                    <div class="form-group">
                        <label class="col-sm-4 spc  control-label">Lender Name</label>
                        <div class="col-sm-8 res_spc1">
                            <input name="data[Lender][name]" type="text" placeholder="Enter Lender Name" class="form-control">
                            <input name="data[Lender][user_id]" type="hidden" class="form-control" value="<?php echo $_SESSION['Auth']['User']['id']; ?>">
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <div class="col-md-12 text-center spc btm_btns ">

                        <button class="btm_btns " type="submit">Save </button>
                        <a class=" cncel_btn" data-dismiss="modal" aria-label="Close">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

<!--createnewlender end-->   
