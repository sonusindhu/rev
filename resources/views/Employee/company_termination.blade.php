<div class="col-md-12 general_dv  clearfix employe_link  ">
    <input type="hidden" ng-model="emp_id" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
    <?php
        if (!empty($employeeDetail['EmployeeDetail']['id'])) {
            ?>
         <div class="row">
        <ul class="employe_li">
            <li class="active"><a  ng-click="addTabMenu('humanresourse_tab','employee/humanresourse_tab/<?php echo $employeeDetail['EmployeeDetail']['id'];?>','humanresourse_tab')" href="javascript:void(0)" >Hiring Decision</a></li>
            <li ><a href="javascript:void(0)" id="onboarding" ng-click="addTabMenu('onboarding','employee/onboarding/<?php echo $employeeDetail['EmployeeDetail']['id'];?>','onboarding')">Onboarding</a></li>
            <li ><a href="javascript:void(0)" id="compensation" ng-click="addTabMenu('compensation','employee/compensation/<?php echo $employeeDetail['EmployeeDetail']['id'];?>','compensation')">Compensation</a></li>
            <li><a href="javascript:void(0)" id="payroll" ng-click="addTabMenu('payroll','employee/payroll/<?php echo $employeeDetail['EmployeeDetail']['id'];?>','payroll')">Payroll </a></li>
            <!--<li><a href="javascript:void(0)" id="tenture"  ng-click="addTabMenu('tenture','employee/tenture','tenture')">Tenure Review </a></li>-->
            <li><a href="javascript:void(0)" id="notes" ng-click="addTabMenu('notes','employee/notes/<?php echo $employeeDetail['EmployeeDetail']['id'];?>','notes')">Notes </a></li>
            <li><a href="javascript:void(0)" id="termination" ng-click="addTabMenu('termination','employee/termination/<?php echo $employeeDetail['EmployeeDetail']['id'];?>','termination')">Termination </a></li>

        </ul>
    </div>
        <?php
        } else {
            echo $this->element('company_address_li');
        }
        ?>
    <div class="clearfix"></div>
    <h4><span class="title_spn1">Employee Termination</span> <span>
                <a class="com_admin_btns" href="javascript:void(0)" ng-click="openPopUp('get', 'employee/termination_policy', 'hiring_popups')">Termination Policy</a>
            </span></h4>
    
   <div class="col-md-6 spc mailing_address employee_roles  terminate  clearfix">
  <div class="form-group ">

    <label class="col-sm-4 res_spc1 control-label">Termination Date</label>
    <div class="col-sm-8 res_spc1 high_width">
  <div class="form-group">
    
    <div class="col-sm-12 spc">
        
            <div class="form-group">
                <div id="datetimepicker1" class="input-group date res_mar">
                    <input type="text" value="<?php echo @$employeeDetail['EmployeeDetail']['termination_date']; ?>" ng-blur="termination($event,emp_id);" placeholder="select date" class="form-control datepicker1">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                </div>
                </div>

  </div>  
    </div>
    </div>
   <div class="form-group ">

    <label class="col-sm-4 res_spc1  control-label">Reason for Termination</label>
    <div class="col-sm-8 res_spc1 ">
      <span class="terminate_btn"><a href="javascript:void(0)" ng-click="openPopUp('get', 'employee/new_notes/<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>', 'hiring_popups')" class="com_admin_btns ">Add Note</a></span>
    </div>
    </div>

  
  
  </div>
</div>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
    <strong>Success!</strong> Employee Detail added successfully.
</div>