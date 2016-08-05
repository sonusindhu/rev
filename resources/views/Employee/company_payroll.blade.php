<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
<form id="idforForm" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')">
    <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
    <div class="col-md-12 general_dv  clearfix employe_link  ">
        <?php
        if (!empty($employeeDetail['EmployeeDetail']['id'])) {
            ?>
            <div class="row">
                <ul class="employe_li">
                    <li class="active"><a  ng-click="addTabMenu('humanresourse_tab', 'employee/humanresourse_tab/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'humanresourse_tab')" href="javascript:void(0)" >Hiring Decision</a></li>
                    <li ><a href="javascript:void(0)" id="onboarding" ng-click="addTabMenu('onboarding', 'employee/onboarding/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'onboarding')">Onboarding</a></li>
                    <li ><a href="javascript:void(0)" id="compensation" ng-click="addTabMenu('compensation', 'employee/compensation/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'compensation')">Compensation</a></li>
                    <li><a href="javascript:void(0)" id="payroll" ng-click="addTabMenu('payroll', 'employee/payroll/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'payroll')">Payroll </a></li>
                    <!--<li><a href="javascript:void(0)" id="tenture"  ng-click="addTabMenu('tenture','employee/tenture','tenture')">Tenure Review </a></li>-->
                    <li><a href="javascript:void(0)" id="notes" ng-click="addTabMenu('notes', 'employee/notes/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'notes')">Notes </a></li>
                    <li><a href="javascript:void(0)" id="termination" ng-click="addTabMenu('termination', 'employee/termination/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'termination')">Termination </a></li>

                </ul>
            </div>
            <?php
        } else {
            echo $this->element('company_address_li');
        }
        ?>
        <div class="clearfix"></div>
        <div class="col-md-12 form_fields spc emp_title mar20">

            <h4 class="res_pdng"><span class="title_spn1">Payroll Direct Deposit</span></h4>

            <div class="col-md-6 spc mailing_address employee_roles clearfix">
                <div class="form-group ">

                    <label class="col-sm-4 res_spc1 control-label">Bank Name</label>
                    <div class="col-sm-8 res_spc1 high_width">
                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['bank_name']; ?>" type="text" name="data[EmployeeDetail][bank_name]" placeholder="Enter Bank Name" class="form-control">
                    </div>
                </div>
                <div class="form-group ">

                    <label class="col-sm-4  res_spc1  control-label">Account Name</label>
                    <div class="col-sm-8 res_spc1 ">
                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['account_name']; ?>" type="text" name="data[EmployeeDetail][account_name]"  placeholder="Enter Account Name" class="form-control">
                    </div>
                </div>
                <div class="form-group ">

                    <label class="col-sm-4 res_spc1 control-label">Routing #</label>
                    <div class="col-sm-8 res_spc1 act_cls ">
                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['routing']; ?>"  type="text" name="data[EmployeeDetail][routing]"  placeholder="Enter Routing" class="form-control">
                    </div>
                </div>
                <div class="form-group ">

                    <label class="col-sm-4 res_spc1  control-label">Account #</label>
                    <div class="col-sm-8 res_spc1 ">
                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['account']; ?>" type="text" name="data[EmployeeDetail][account]"  placeholder="Enter Account" class="form-control">
                    </div>
                </div>

                <div class="form-group ">

                    <label class="col-sm-4 res_spc1  control-label">Checking/Savings</label>
                    <div class="col-sm-8 res_spc1 send_msg">
                        <?php $array = array('Checking', 'Savings'); ?>
                        <select name="data[EmployeeDetail][account_type]"  class="selectpicker col-md-8 spc">
                            <?php
                            foreach ($array as $k => $v) {
                                $select = "";
                                if ($v == $employeeDetail['EmployeeDetail']['account_type']) {
                                    $select = "selected";
                                }
                                ?>
                            <option <?php echo $select; ?> value="<?php echo $v; ?>"><?php echo $v; ?></option>
    <?php }
?>


                        </select>
                    </div>
                </div>


            </div>

        </div>








    </div>
    <div class="col-md-12 text-center spc btm_btns">

        <button type="submit">Save</button><a class="cncel_btn" href="#">Cancel</a>

    </div>
</form>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:void(0);">&times;</a>
    <strong>Success!</strong> Payroll Detail added successfully.
</div>