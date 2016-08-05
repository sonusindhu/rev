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
    <div class="col-md-12 form_fields spc emp_title">
        <h4><span class="title_spn1">Employee Notes</span> <span>
                <a ng-click="openPopUp('get', 'employee/new_notes/<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>', 'hiring_popups')" href="javascript:void(0)" class="com_admin_btns">New Note</a>
            </span></h4>
        <div class="table-responsive manage_licsn_tabl license_user role_manage lender_access human_notes">
            <table class="table table-striped table-hover  ">
                <tr class="bg_white">
                    <th class="padd_15lft">Created By</th>
                    
                    <th class="padd_15lft width" >Note</th>
                    <th class="padd_15lft" >Date</th>
                </tr>

                <tbody>
                    <?php
                    if (!empty($EmployeeNote)) {
                        foreach ($EmployeeNote as $key => $value) {
                            ?>
                            <tr style="cursor:pointer;" ng-click="openPopUp('get', 'employee/view_notes/<?php echo $value['EmployeeNote']['id']; ?>', 'hiring_popups')" > 
                                <td ><?php echo $user['User']['first_name'].' '.$user['User']['last_name'];?></td>
                                  <td><?php echo $value['EmployeeNote']['subject']?> </td>
                                <td><?php echo date("F d, Y",strtotime($value['EmployeeNote']['created']))." at ". date(" h:i A",strtotime($value['EmployeeNote']['created']));?></td>  
                              
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                            <tr><td style="text-align: center;" colspan="2">No Notes Found!</td></tr>
                            <?php
                    }
                    ?>

                </tbody> 
            </table>
        </div> 
    </div>
</div>
