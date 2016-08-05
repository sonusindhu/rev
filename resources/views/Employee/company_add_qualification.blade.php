<div role="document" class="modal-dialog adrequirement">
    <div class="modal-content clearfix">
        <form id="addQualifi" ng-submit="addQualification('addQualifi')">
        <div class="modal-header">
            <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                <span aria-hidden="true">
                    <img alt="" src="<?php echo $this->webroot;?>images/close_icon.png">
                </span></button>
            <h4 id="myModalLabel" class="modal-title">Add Requirement</h4>
        </div>
        <div class="modal-body  clearfix">
            <div class="col-md-12 spc form_fields add-requirement   ">
                
                    <div class="col-md-12 spc">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-4  control-label">Name</label>
                                <div class="col-sm-8 ">
                                    <input name="data[HiringRequirement][name]" type="text" class="form-control" placeholder="">
                                    <input name="data[HiringRequirement][type]" type="hidden" value="<?php echo $type; ?>" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

               </div>



        </div>
        <div class="clearfix"></div>
        <div class="modal-footer">
            <div class="col-md-12 text-center spc btm_btns clearfix">
                <button type="submit">Save</button>
                  <a ng-click="openPopUp('get', 'employee/qualification/<?php echo $type; ?>', 'hiring_popups')" class=" cncel_btn" href="javascript:void(0)">Close</a>
                </div>
        </div>
         </form>
    </div>

</div>