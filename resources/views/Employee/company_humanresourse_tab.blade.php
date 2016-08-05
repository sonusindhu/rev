<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />

<form id="idforForm" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')" enctype="multipart/form-data">
    <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" /> 
    <div class="col-md-12 general_dv  clearfix employe_link ">

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

            <div class="table-responsive hiring_decision">
                <table class="table ">

                    <tr class="trbrdr">
                        <th>Hiring Committee Interview</th>
                        <th class="text-left td-col-2" colspan="1">
                    <div class="checkbox"> 
                        <label> 

                            <input type="hidden" name="data[0][EmployeeHiring][title]" value="Hiring Committee Interview" />
                            <?php
                            if (isset($employeeDetail['EmployeeHiring'][0]['completed_status']) and ! empty($employeeDetail['EmployeeHiring'][0]['completed_status'])) {
                                $checked = "checked";
                            } else {
                                $checked = "";
                            }
                            ?>
                            <input type="checkbox" <?php echo $checked; ?> value="1" name="data[0][EmployeeHiring][completed_status]" >
                            <input type="hidden" value="<?php echo @$employeeDetail['EmployeeHiring'][0]['description']; ?>" name="data[0][EmployeeHiring][description]" class="committee_desc" />
                        </label> 
                    </div>
                    <div class="form-group send_msg dtepick">
                        <div id="datetimepicker13"  class="input-group date res_mar datetp">
                            <input value="<?php echo @$employeeDetail['EmployeeHiring'][0]['selected_date']; ?>" type="text" name="data[0][EmployeeHiring][selected_date]" placeholder="select date" class="form-control datepicker1">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div></th>
                    <th></th>


                    <th colspan="3" class="text-left"><div class="checkbox mayproced"> <label> 
                            <?php
                            if (isset($employeeDetail['EmployeeHiring'][0]['eligible']) and ! empty($employeeDetail['EmployeeHiring'][0]['eligible'])) {
                                $Echecked = "checked";
                            } else {
                                $Echecked = "";
                            }
                            ?>


                            <input <?php echo $Echecked; ?> value="1" name="data[0][EmployeeHiring][eligible]" type="checkbox" >May proceed
                        </label> </div></th>

                    <th><span> <a href="javascript:void(0)" class="com_admin_btns" ng-click="openPopUp('get', 'employee/committee_recomendation/<?php echo @$employeeDetail['EmployeeHiring'][0]['id']; ?>', 'hiring_popups')"> Recommendation</a></span></th>

                    </tr>



                    <tbody >
                        <tr class="inner_th">
                            <th>Candidate Qualification Review</th>
                            <th  colspan="1" class="td-col-2">Completed</th>
                            <th class="res_td">Upload</td>
                            <th class="res_td">View</td>
                            <th  class="res_td">Eligible</th>
                            <th></th>
                            <th >Exception</th>

                        </tr>

                        <?php
                      
                        if (!empty($qualification)) {
                            $key = 1;
                            foreach ($qualification as $keys => $value) {
                                ?>
                                <tr>
                                    <td class="file_view"><a href="javascript:void(0)" data-toggle="modal" data-target="#edit_qualification"></a><?php echo $value['HiringRequirement']['name']; ?></td>
                                    <td colspan="1" class="td-col-2">
                                        <div class="checkbox"> 
                                            <label> 
                                                <input type="hidden" name="data[<?php echo $key; ?>][EmployeeHiring][hiring_id]" value="<?php echo $value['HiringRequirement']['id']; ?>" />
                                                <input type="hidden" name="data[<?php echo $key; ?>][EmployeeHiring][title]" value="<?php echo $value['HiringRequirement']['name']; ?>" />
                                                <?php
                                                if (isset($employeeDetail['EmployeeHiring'][$key]['completed_status']) and ! empty($employeeDetail['EmployeeHiring'][$key]['completed_status'])) {
                                                    $Echecked = "checked";
                                                } else {
                                                    $Echecked = "";
                                                }
                                                ?>
                                                <input type="checkbox"  <?php echo $Echecked; ?> value="1" name="data[<?php echo $key; ?>][EmployeeHiring][completed_status]">
                                                <input type="hidden" value="<?php echo @$employeeDetail['EmployeeHiring'][$key]['description']; ?>" name="data[<?php echo $key; ?>][EmployeeHiring][description]" class="committee_desc<?php echo $key; ?>" />
                                            </label> </div>
                                        <div class="form-group send_msg dtepick">
                                            <div id="datetimepicker13"  class="input-group date res_mar datetp">
                                                <input name="data[<?php echo $key; ?>][EmployeeHiring][selected_date]"  value="<?php echo @$employeeDetail['EmployeeHiring'][$key]['selected_date']; ?>" type="text" placeholder="select date" class="form-control datepicker1">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="width_50">
                                        <div class="fileUpload btn btn-primary  fileupicon">
                                            <span><img src="<?php echo $this->webroot; ?>images/upload_icon.png" alt=""/></span>
                                            
                                            <input type="file" name="data[<?php echo $key; ?>][EmployeeHiring][upload_file]" class="upload uploadPdf" style="">
                                           <?php 
                                           if(!empty($employeeDetail['EmployeeHiring'][$key]['upload_file'])){
                                               ?>
                                           <input type="hidden" name="data[<?php echo $key; ?>][EmployeeHiring][new_upload_file]" value="<?php echo @$employeeDetail['EmployeeHiring'][$key]['upload_file'];?>" style="">
                                            <?php
                                               
                                           }
                                           ?>
                                        </div>   
                                    </td>
                                    <td class="text-center">
                                        <?php if (!empty($employeeDetail['EmployeeHiring'][$key]['upload_file'])) {
                                            ?>    <a  ng-click="openPopUp('get', 'employee/view_pdf/<?php echo @$employeeDetail['EmployeeHiring'][$key]['upload_file']; ?>', 'new_role_popup')" href="javascript:void(0);"><img src="<?php echo $this->webroot; ?>images/pdficon.png" alt=""/></a>

                                            <?php
                                        } else {
                                            ?>
                                            <a ng-click="showAlert();
                                                " href="javascript:void(0);"><img src="<?php echo $this->webroot; ?>images/pdficon.png" alt=""/></a>                                        
                                            <?php }
                                        ?>

                                    </td>
                                    <td class="check_mar">
                                        <div class="checkbox" ng-click="test()">
                                            <?php
                                            if (isset($employeeDetail['EmployeeHiring'][$key]['eligible']) and ! empty($employeeDetail['EmployeeHiring'][$key]['eligible'])) {
                                                $checkedData = "checked";
                                            } else {
                                                $checkedData = "";
                                            }
                                            if (isset($employeeDetail['EmployeeHiring'][$key]['exception']) and ! empty($employeeDetail['EmployeeHiring'][$key]['exception'])) {
                                                $checkedexception = "checked";
                                            } else {
                                                $checkedexception = "";
                                            }
                                            ?>

                                            <label> 
                                                <input <?php echo $checkedData; ?> customcheck value="1" type="checkbox" name="data[<?php echo $key; ?>][EmployeeHiring][eligible]" >
                                            </label> </div>
                                    </td>

                                    <td class="excption_chk">
                                        <div class="checkbox"> <label> 
                                                <input <?php echo $checkedexception; ?> data-id="<?php echo $key; ?>" value="1" type="checkbox" class="checking"  name="data[<?php echo $key; ?>][EmployeeHiring][exception]" >

                                            </label> </div></td>
                                    <td> <span> 
                                            <?php if(isset($employeeDetail['EmployeeHiring'][$key]['exception']) and !empty($employeeDetail['EmployeeHiring'][$key]['exception'])){
                                                $class="show";
                                                $firstClass="hide ";
                                            }else{
                                               $class="hide btn_bck"; 
                                                 $firstClass="show";
                                            }?>
                                            <a href="javascript:void(0);"  class="com_admin_btns btn_bck unchecked <?php echo $firstClass;?>  customUnchecked<?php echo $key; ?>">Document Exception</a>
                                            <a  ng-click="openPopUp('get', 'employee/document_exception/<?php echo $key.'/'.@$employeeDetail['EmployeeHiring'][$key]['id']; ?>/', 'hiring_popups')" href="javascript:void(0);"  class="com_admin_btns  checked <?php echo $class; ?> customChecked<?php echo $key; ?>">Document Exception</a>



                                        </span>
                                    </td>

                                </tr>
                                <?php
                                $key++;
                            }

                            $finalCount = $key;
                        } else {
                            $finalCount = 1;
                        }
                        ?>



                        <tr class="trbrdr">
                            <th>Hiring Committee Recommendation</th>
                            <th class="text-left td-col-2" colspan="1"><div class="checkbox">
                        <label> 
                            <?php
                            if (isset($employeeDetail['EmployeeHiring'][$finalCount]['completed_status']) and ! empty($employeeDetail['EmployeeHiring'][$finalCount]['completed_status'])) {
                                $Cchecked = "checked";
                            } else {
                                $Cchecked = "";
                            }
                            ?>
                            <input <?php echo $Cchecked; ?> type="checkbox" value="1" name="data[<?php echo $finalCount; ?>][EmployeeHiring][completed_status]" >
                            <input type="hidden" name="data[<?php echo $finalCount; ?>][EmployeeHiring][title]" value="Hiring Committee Recommendation" />
                        </label> </div><div class="form-group send_msg dtepick">
                        <div id="datetimepicker13"  class="input-group date res_mar datetp">
                            <input name="data[<?php echo $finalCount; ?>][EmployeeHiring][selected_date]" type="text" value="<?php echo @$employeeDetail['EmployeeHiring'][$finalCount]['selected_date']; ?>" placeholder="Select date" class="form-control datepicker1">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div></th>
                    <th></th>
                    <th></th>

                    <th  class="text-left"><div class="checkbox mayproced"> <label> 
                            <input value="<?php echo @$employeeDetail['EmployeeHiring'][$finalCount]['description']; ?>" type="hidden" name="data[<?php echo $finalCount; ?>][EmployeeHiring][description]" class="committee_desc<?php echo $finalCount; ?>" />
                            <?php
                            if (isset($employeeDetail['EmployeeHiring'][$finalCount]['eligible']) and ! empty($employeeDetail['EmployeeHiring'][$finalCount]['eligible'])) {
                                $Echecked = "checked";
                            } else {
                                $Echecked = "";
                            }
                            ?>
                            <input <?php echo $Echecked; ?> value="1"  name="data[<?php echo $finalCount; ?>][EmployeeHiring][eligible]" type="checkbox" >May proceed
                        </label> </div></th>
                    <th></th><th><span>
                            <a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/final_recomendation/<?php echo @$employeeDetail['EmployeeHiring'][$finalCount]['id']; ?>', 'hiring_popups')" class="com_admin_btns">Final Recommendation</a>
                        </span></th>

                    </tr>

                    <tr class="inner_th">
                        <th>Founding Partners Review</th>
                        <th  colspan="1" class="td-col-2 text-left">Completed</th>
                        <th></th>
                        <th></th>

                    </tr>

                    <tr >
                        <td class="file_view">In Person Interview</td>
                        <td colspan="1" class="td-col-2">
                            <div class="checkbox"> <label> 
                                    <?php
                                    if (isset($employeeDetail['EmployeeHiring'][$finalCount + 1]['completed_status']) and ! empty($employeeDetail['EmployeeHiring'][$finalCount + 1]['completed_status'])) {
                                        $Echecked = "checked";
                                    } else {
                                        $Echecked = "";
                                    }
                                    ?>     
                                    <input name="data[<?php echo $finalCount + 1; ?>][EmployeeHiring][completed_status]" <?php echo $Echecked; ?> value="1" type="checkbox" >
                                </label> </div>
                            <div class="form-group send_msg dtepick">
                                <div id="datetimepicker13"  class="input-group date res_mar datetp">
                                    <input type="hidden" name="data[<?php echo $finalCount + 1; ?>][EmployeeHiring][title]" value="In Person Interview" />
                                    <input  name="data[<?php echo $finalCount + 1; ?>][EmployeeHiring][selected_date]" value="<?php echo @$employeeDetail['EmployeeHiring'][$finalCount + 1]['selected_date']; ?>" type="text" placeholder="select date" class="form-control datepicker1">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </td>


                    </tr>
                    <tr >
                        <td class="file_view">In Person Meeting with Spouse</td>
                        <td colspan="1" class="td-col-2">
                            <div class="checkbox"> <label> 
                                    <?php
                                    if (isset($employeeDetail['EmployeeHiring'][$finalCount + 2]['completed_status']) and ! empty($employeeDetail['EmployeeHiring'][$finalCount + 2]['completed_status'])) {
                                        $Exchecked = "checked";
                                    } else {
                                        $Exchecked = "";
                                    }
                                    ?>  


                                    <input  <?php echo $Exchecked; ?> value="1" name="data[<?php echo $finalCount + 2; ?>][EmployeeHiring][completed_status]" type="checkbox" >
                                    <input type="hidden" name="data[<?php echo $finalCount + 2; ?>][EmployeeHiring][title]" value="In Person Meeting with Spouse" />
                                </label> </div>
                            <div class="form-group send_msg dtepick">
                                <div id="datetimepicker13"  class="input-group date res_mar datetp">  <input  value="<?php echo @$employeeDetail['EmployeeHiring'][$finalCount + 1]['selected_date']; ?>"  type="text"  name="data[<?php echo $finalCount + 2; ?>][EmployeeHiring][selected_date]" placeholder="select date" class="form-control datepicker1">

                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </td>


                    </tr>



                    </tbody>


                </table>
            </div>
            <div class="table-responsive manage_licsn_tabl  hiring_decision hiringtdwidth">
                <table class="table ">

                    <tr class="">
                        <th>Official Decision</th>
                        <th class="text-left td-col-2" colspan="1"></th>

                        <th ></th>
                        <th><span> 


                                <a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/decision_notes/<?php echo @$employeeDetail['EmployeeHiring'][$finalCount + 3]['id']; ?>', 'hiring_popups')" class="com_admin_btns">Decision Notes</a></span></th>

                    </tr>
                    <tr>
                        <td class="oficial_decision">  
                            <div class="checkbox">
                                <input type="hidden" name="data[<?php echo $finalCount + 3; ?>][EmployeeHiring][title]" value="Decision Notes" />
                                <input value="<?php echo @$employeeDetail['EmployeeHiring'][$finalCount + 3]['description']; ?>" type="hidden" name="data[<?php echo $finalCount + 3; ?>][EmployeeHiring][description]" class="committee_descNew" />
                                <label> 
                                    <?php
                                    $requirements = explode(',', @$employeeDetail['EmployeeHiring'][$finalCount + 3]['requirements']);
                                    $meets = "";
                                    $deny = "";
                                    $provision = "";
                                    foreach ($requirements as $key => $value) {
                                        if ($value == 'Meets Requirements') {
                                            $meets = "checked";
                                        }
                                        if ($value == 'Provisional Approval') {
                                            $provision = "checked";
                                        }
                                        if ($value == 'Deny') {
                                            $deny = "checked";
                                        }
                                    }
                                    ?>

                                    <input  name="data[<?php echo $finalCount + 3; ?>][EmployeeHiring][requirements]"  <?php echo $meets; ?> value="Meets Requirements" type="radio" >Meets Requirements
                                </label>
                                <label> <input <?php echo $provision; ?> value="Provisional Approval" name="data[<?php echo $finalCount + 3; ?>][EmployeeHiring][requirements]" type="radio">Provisional Approval
                                </label> 
                                <label>
                                    <input <?php echo $deny; ?> value="Deny" name="data[<?php echo $finalCount + 3; ?>][EmployeeHiring][requirements]" type="radio" >Deny
                                </label> 
                            </div>
                        </td>
                    </tr>
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
    <strong>Success! </strong>Hiring details added successfully.
</div>
<style>
    .fileupicon{
        background-color: transparent;
        padding: 0px; 
        width: auto;
    }
</style>
<script>
    $(document).on('ifChecked', '.checking', function (event) {
        var id = $(this).attr('data-id');
        $('.customUnchecked' + id).removeClass('show').addClass('hide');
        $('.customChecked' + id).removeClass('hide btn_bck').addClass('show');
    });
    $(document).on('ifUnchecked', '.checking', function (event) {
        var id = $(this).attr('data-id');
        $('.customUnchecked' + id).removeClass('hide').addClass('show btn_bck');
        $('.customChecked' + id).removeClass('show btn_bck').addClass('hide');
    });
</script>