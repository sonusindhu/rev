<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />

<form id="idforForm" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')" enctype="multipart/form-data">
    <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" /> <div class="col-md-12 general_dv  clearfix employe_link ">
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
        <div class="col-md-12 form_fields spc">
            <div class="table-responsive manage_licsn_tabl hiring_decision">
                <table class="table onbord_tabl">
                    <tr class="trbrdr">
                        <th>New Hire Onboarding</th>
                        <th class="text-left td-col-2" colspan="2"><div class="checkbox"> <label> Official Hire Date
                        </label> </div><div class="form-group send_msg dtepick">
                        <div id="datetimepicker13"  class="input-group date res_mar datetp">
                            <input type="hidden" name="data[0][EmployeeOnboarding][title]" value="New Hire Onboarding" />
                            <input value="<?php echo @$employeeDetail['EmployeeOnboarding'][0]['selected_date']; ?>" type="text" name="data[0][EmployeeOnboarding][selected_date]" placeholder="select date" class="form-control datepicker1">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div></th>
                    <th colspan="3"><span><a class="com_admin_btns" ng-click="openPopUp('get', 'employee/policy/<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>', 'hiring_popups')" href="javascript:void(0)" >View Policy</a></span></th>
                    </tr>
                    <tbody>
                        <tr class="inner_th">
                            <th>Required Legal Documentation</th>
                            <th  colspan="2" class="td-col-2">Completed</th>
                            <th class="wdth_110">Upload</th>
                            <th>View</th>
                            <th class="wdth_50"></th>

                        </tr>

                        <?php
                        if (!empty($qualification)) {
                            $key = 1;
                            foreach ($qualification as $keys => $value) {
                                if ($value['HiringRequirement']['type'] == 'legal') {
                                    ?>
                                    <tr>
                                        <td class="file_view"><?php echo $value['HiringRequirement']['name']; ?></td>
                                        <td colspan="2" class="td-col-2">
                                            <div class="checkbox">


                                                <label>
                                                    <input type="hidden" name="data[<?php echo $key; ?>][EmployeeOnboarding][title]" value="<?php echo $value['HiringRequirement']['name']; ?>" />
                                                    <input type="hidden" name="data[<?php echo $key; ?>][EmployeeOnboarding][hiring_id]" value="<?php echo $value['HiringRequirement']['id']; ?>" />
                                                    <?php
                                                    if (isset($employeeDetail['EmployeeOnboarding'][$key]['completed_status']) and ! empty($employeeDetail['EmployeeOnboarding'][$key]['completed_status'])) {
                                                        $Cchecked = "checked";
                                                    } else {
                                                        $Cchecked = "";
                                                    }
                                                    ?>


                                                    <input <?php echo $Cchecked; ?> type="checkbox" value="1" name="data[<?php echo $key; ?>][EmployeeOnboarding][completed_status]">

                                                </label> </div>
                                            <div class="form-group send_msg dtepick">
                                                <div id="datetimepicker13"  class="input-group date res_mar datetp">
                                                    <input name="data[<?php echo $key; ?>][EmployeeOnboarding][selected_date]" value="<?php echo @$employeeDetail['EmployeeOnboarding'][$key]['selected_date']; ?>" type="text" placeholder="select date" class="form-control datepicker1">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fileUpload btn btn-primary  fileupicon">
                                                <span><img src="<?php echo $this->webroot; ?>images/upload_icon.png" alt=""/></span>
                                                <input type="file" name="data[<?php echo $key; ?>][EmployeeOnboarding][upload_file]" class="upload uploadPdf" style="">
                                                <?php if(!empty($employeeDetail['EmployeeOnboarding'][$key]['upload_file'])){ ?>
                                         <input type="hidden" name="data[<?php echo $key; ?>][EmployeeOnboarding][new_upload_file]" class="" style="">        

                                                <?php
                                                    
                                                }?>
                                            </div>   
                                        </td>
                                        <td>
                                          <?php if(!empty($employeeDetail['EmployeeOnboarding'][$key]['upload_file'])){
                                             ?>    <a  ng-click="openPopUp('get', 'employee/view_pdf/<?php echo @$employeeDetail['EmployeeOnboarding'][$key]['upload_file']; ?>', 'new_role_popup')" href="javascript:void(0);"><img src="<?php echo $this->webroot; ?>images/pdficon.png" alt=""/></a>
                                        
                                        <?php
                                        }else{
                                            ?>
                                                  
                                              <a ng-click="showAlert(); "  href="javascript:void(0)"><img src="<?php echo $this->webroot; ?>images/pdficon.png" alt=""/></a>
                                        <?php
                                        }?>    
                                            
                                            
                                           
                                        </td>
<!--                                        <td>
                                            <a href="javascript:void(0);" ng-click="deleteOnboarding($event,'<?php //echo @$employeeDetail['EmployeeOnboarding'][$key]['id']; ?>');"><img src="<?php //echo $this->webroot; ?>images/trash.png" alt=""/></a></td>-->



                                    </tr>

                                    <?php
                                    $key++;
                                }
                            }
                            $finalCount = $key;
                        } else {
                            $finalCount = 1;
                        }
                        ?>




                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 form_fields spc">
            <div class="table-responsive manage_licsn_tabl  hiring_decision">
                <table class="table  onborad_table_width">
                    <tbody >
                        <tr class="inner_th">
                            <th>New Employee Transition Checklist</th>
                            <th  colspan="2" class="td-col-2">Completed</th>
                        </tr>

                        <?php
                        $newKey = $finalCount;
                        if (!empty($qualification)) {

                            foreach ($qualification as $keys => $value) {
                                if ($value['HiringRequirement']['type'] == 'checklist') {
                                    ?>
                                    <tr >
                                        <td class="file_view"><?php echo $value['HiringRequirement']['name']; ?></td>
                                        <td colspan="2" class="td-col-2">
                                            <div class="checkbox"> <label>
                                                    <input type="hidden" name="data[<?php echo $newKey; ?>][EmployeeOnboarding][title]" value="<?php echo $value['HiringRequirement']['name']; ?>" />   <input type="hidden" name="data[<?php echo $newKey; ?>][EmployeeOnboarding][hiring_id]" value="<?php echo $value['HiringRequirement']['id']; ?>" />
                                                    <?php
                                                    $Cchecked1 = "";
                                                    if (isset($employeeDetail['EmployeeOnboarding'][$newKey]['completed_status']) and !empty($employeeDetail['EmployeeOnboarding'][$newKey]['completed_status'])) {
                                                        $Cchecked1 = "checked";
                                                    } 
                                                    ?>
                                                    <input  <?php echo $Cchecked1;  ?> type="checkbox" value="1" name="data[<?php echo $newKey; ?>][EmployeeOnboarding][completed_status]">
                                                </label> </div>
                                            <div class="form-group send_msg dtepick">
                                                <div id="datetimepicker13"  class="input-group date res_mar datetp">
                                                    <input name="data[<?php echo $newKey; ?>][EmployeeOnboarding][selected_date]" value="<?php echo @$employeeDetail['EmployeeOnboarding'][$newKey]['selected_date']; ?>" type="text" placeholder="select date" class="form-control datepicker1">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $newKey++;
                                }
                            }
                        }
                        ?>

                    </tbody>
                </table>

            </div>      
        </div>  
    </div>
    <div class="col-md-12 text-center spc btm_btns">
        <button class="btm_btns" type="submit">Save</button><a class=" cncel_btn" href="javascript:void(0)">Cancel</a>
    </div>
</form>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:void(0);">&times;</a>
    <strong>Success!</strong> Onboarding Details added successfully.
</div>