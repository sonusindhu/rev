<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
<form id="idforForm" method="post" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')" >
    <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
    <div class="col-md-12 general_dv  clearfix employe_link  ">
        <?php
        if (!empty($employeeDetail['EmployeeDetail']['id'])) {
            ?>
            <div class="row">
                <ul class="employe_li">
                    <li class="active">   <a id="admin_tab" ng-click="addTabMenu('admin_tab', 'employee/admin_tab/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'admin_tab')" href="javascript:void(0)">Account </a></li>
                    <li class="active" >
                    <li ><a id="role_and_assignment" ng-click="addTabMenu('role_and_assignment', 'employee/role_and_assignment/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'role_and_assignment')" href="javascript:void(0)">Role & Assignments</a></li>
                    <li ><a id="licenses" ng-click="addTabMenu('licenses', 'employee/licenses/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'licenses')" href="javascript:void(0)">Licenses</a></li>
                    <li ><a id="lenders" ng-click="addTabMenu('lenders', 'employee/lenders/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'lenders')" href="javascript:void(0)">Lenders </a></li>
                    <li><a id="credit_bureas" ng-click="addTabMenu('credit_bureas', 'employee/credit_bureas/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'credit_bureas')" href="javascript:void(0)">Credit Bureaus  </a></li>
                </ul>
            </div>
            <?php
        } else {
            echo $this->element('company_admin_li');
        }
        ?>
        <div class="clearfix"></div>

        <div class="col-md-12 form_fields spc emp_title mar20 roles_asigns">

            <h4 class="res_pdng"><span class="title_spn1">Manage Roles & Assignments</span></h4>

            <div class="col-md-6 spc mailing_address  clearfix">
                <div class="form-group ">

                    <label class="col-sm-4 res_spc1 control-label">Title</label>
                    <div class="col-sm-8 res_spc1 high_width">
                        <input value="<?php echo @$employeeDetail['EmployeeAssignment'][0]['title']; ?>" name="data[EmployeeAssignment][title]"  type="text" placeholder="Enter Title" class="form-control">
                    </div>
                </div>
                <div class="form-group ">

                    <label class="col-sm-4 res_spc1  control-label">Employee User Type</label>
                    <div class="col-sm-8 res_spc1 send_msg">
                        <?php $userType = array('Administrator','Loan Officer', 'Loan Coordinator', 'Loan Processor', 'Underwriter'); ?>
                        <select name="data[EmployeeAssignment][user_type]" class="selectpicker col-md-8 spc">

                            <?php
                            if (!isset($employeeDetail['EmployeeAssignment'][0]['user_type'])) {
                                ?>
                                <option value="">--Select-- </option>
                                <?php
                            }
                            foreach ($userType as $key => $value) {
                                $select = "";
                                if (@$employeeDetail['EmployeeAssignment'][0]['user_type'] == $value) {
                                    $select = "selected";
                                }
                                ?>
                                <option <?php echo $select; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php
                            }
                            ?>



                        </select>
                    </div>
                </div>

                <div class="form-group ">

                    <label class="col-sm-4 res_spc1 control-label">Role</label>
                    <div class="col-sm-8 res_spc1 send_msg">
                        <div class="col-lg-12 spc"> 
                            <div class="input-group">
                                <input type="text" value="<?php echo @$branchDetail['Role']['name'];?>" placeholder="" name="data[EmployeeAssignment][role_id]" class="form-control role_name"> 
                                <input type="hidden" class="role_id" name="data[EmployeeAssignment][role_id]" placeholder="" value="<?php echo @$branchDetail['Role']['id'];?>" class="form-control"> 
                                <span class="input-group-btn"> 
                                    <button ng-click="openPopUp('get', 'role/show_role', 'new_role_popup')" type="button" class="btn btn-default"><img src="<?php echo $this->webroot; ?>images/searchicon.png" alt=""/></button>
                                </span> 
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-4 res_spc1  control-label">Branch</label>
                    <div class="col-sm-8 res_spc1 send_msg">
                        <div class="col-lg-12 spc"> 
                            <div class="input-group">
                                <input type="text" value="<?php echo @$branchDetail['Branch']['office'];?>" name="data[EmployeeAssignment][branch_id]" placeholder="" class="form-control branch_name"> 
                                <input type="hidden" class="branch_id" name="data[EmployeeAssignment][branch_id]" placeholder="" value="<?php echo @$branchDetail['Branch']['id'];?>" class="form-control">                 <span class="input-group-btn"> 
                                    <button ng-click="openPopUp('get', 'employee/all_lookup_branch', 'lookup-branch')" type="button" class="btn btn-default"><img src="<?php echo $this->webroot; ?>images/searchicon.png" alt=""/></button>
                                </span> 
                            </div> 
                        </div>
                    </div>
                </div>

            </div>

        </div>








    </div>
    <div class="col-md-12 text-center spc btm_btns">

        <button type='submit'>Save</button>
        <a class=" cncel_btn" href="javascript:void(0);">Cancel</a>

    </div>
</form>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:void(0);">&times;</a>
    <strong>Success!</strong> Role assigned successfully.
</div>