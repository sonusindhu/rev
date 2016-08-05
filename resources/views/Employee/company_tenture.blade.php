<div class="col-md-12 general_dv  clearfix employe_link  ">
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
    Pending.....
</div>