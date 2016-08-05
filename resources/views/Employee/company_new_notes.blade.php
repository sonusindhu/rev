<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
<form id="addNote" ng-submit="addNote('employee/new_notes/<?php echo @$employeeDetail['EmployeeDetail']['id'];?>','addNote','EmployeeNote')">
    <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button>
                <h4 class="modal-title" id="myModalLabel">New Employee Note</h4>
            </div>
            <div class="modal-body clearfix">

                <div class="col-md-12 spc  form_fields">

                    <div class="form-group ">

                        <label class="col-sm-12 spc control-label">Subject</label>
                        <div class="col-sm-12 spc high_width">
                            <input type="text" name="data[EmployeeNote][subject]" placeholder="" class="form-control">
                         
                        </div>
                    </div>
                    <div class="form-group ">

                        <label class="col-sm-12 spc control-label">Notes</label>
                        <div class="col-sm-12 spc high_width">
                            <textarea  name="data[EmployeeNote][notes]"></textarea>
                        </div>
                    </div>
                    <small>Notes cannot be deleted or edited once saved to the employee record</small>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center spc btm_btns">

                    <button class="btm_btns" type="submit">Save</button><a data-dismiss="modal" aria-label="Close" href="javascript:void(0);" class=" cncel_btn">Cancel</a>

                </div>
            </div>
        </div>
    </div>
</form>