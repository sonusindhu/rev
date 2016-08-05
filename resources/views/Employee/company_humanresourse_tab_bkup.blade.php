<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />

<form id="idforForm" ng-submit="AddEmployee()" enctype="multipart/form-data">
     <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" /> 
    <div class="col-md-12 general_dv  clearfix employe_link ">
        <?php echo $this->element('company_address_li'); ?>
        <div class="clearfix"></div>
        <div class="col-md-12 form_fields spc">
            <div class="table-responsive social_sites_table hiring_decision">
                <table class="table ">
                    <tr class="trbrdr">
                        <th>Hiring Committee Interview</th>
                        <th class="text-left td-col-2" colspan="1">
                    <div class="checkbox"> 
                        <label> 
                            <input type="hidden" name="data[0][EmployeeHiring][title]" value="Hiring Committee Interview" />
                            <input type="checkbox" value="1" name="data[0][EmployeeHiring][completed_status]" >
                            <input type="hidden" name="data[0][EmployeeHiring][description]" class="committee_desc" />
                        </label>
                    </div>
                    <div class="form-group send_msg dtepick">
                        <div id="datetimepicker13"  class="input-group date res_mar datetp">
                            <input type="text" name="data[0][EmployeeHiring][selected_date]" placeholder="select date" class="form-control datepicker4">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div></th>
                    <td></td>
                    <td></td>
                    <th class="text-left"><div class="checkbox"> <label> <input name="data[0][EmployeeHiring][eligible_status]" type="checkbox" >May proceed
                        </label> </div></th>
                    <th><span>
                            <a href="javascript:void(0)" class="com_admin_btns" ng-click="openPopUp('get', 'employee/committee_recomendation', 'hiring_popups')">Committee Recommendation</a>
                        </span></th>

                    </tr>
                    <tbody >
                        <tr class="inner_th">
                            <th>Candidate Qualification Review</th>
                            <th  colspan="1" class="td-col-2">Completed</th>
                            <td class="res_td"></td>
                            <td class="res_td"></td>
                            <th>Eligible</th>
                            <th >Exception</th>
                        </tr>
                        <?php
                        $arrayVal = array(
                            '1' => 'Application & Fee',
                            '2' => 'Credit Report',
                            '3' => 'Background Check',
                            '4' => 'Personal Vision Statement',
                            '5' => 'Letters of Reference',
                            '6' => 'Verified Previous Employment',
                            '7' => 'Review Previous Years Tax Returns',
                            '8' => 'NMLS Licenses Reviewed',
                            '9' => 'CRMP Certified',
                        );
                        for ($count = 1; $count <= 9; $count++) {
                            ?>
                            <tr>
                                <td class="file_view"><a href="javascript:void(0)" data-toggle="modal" data-target="#edit_qualification"></a><?php echo $arrayVal[$count]; ?></td>
                                <td colspan="1" class="td-col-2">
                                    <div class="checkbox"> <label> 
                                            <input type="hidden" name="data[<?php echo $count; ?>][EmployeeHiring][title]" value="<?php echo $arrayVal[$count]?>" />
                                            <input type="checkbox" value="1" name="data[<?php echo $count; ?>][EmployeeHiring][completed_status]">
                                            <input type="hidden" name="data[<?php echo $count; ?>][EmployeeHiring][description]" class="committee_desc<?php echo $count; ?>" />
                                        </label> </div>
                                    <div class="form-group send_msg dtepick">
                                        <div id="datetimepicker13"  class="input-group date res_mar datetp">
                                            <input name="data[<?php echo $count; ?>][EmployeeHiring][selected_date]" type="text" placeholder="select date" class="form-control datepicker4">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="width_50">
                                    <div class="fileUpload btn btn-primary  fileupicon">
                                        <span><img src="<?php echo $this->webroot; ?>images/upload_icon.png" alt=""/></span>
                                        <input type="file" name="data[<?php echo $count; ?>][EmployeeHiring][upload_file]" class="upload" style="">
                                    </div>   
    <!--                                    <a href="javascript:void(0)"><img src="<?php //echo $this->webroot;  ?>images/upload_icon.png" alt=""/></a>-->
                                </td>
                                <td><a href="javascript:void(0)"><img src="<?php echo $this->webroot; ?>images/pdficon.png" alt=""/></a></td>
                                <td class="check_mar">
                                    <div class="checkbox"> <label> <input value="1" type="checkbox" name="data[<?php echo $count; ?>][EmployeeHiring][eligible]" >
                                        </label> </div>
                                </td>

                                <td class="excption_chk">
                                    <div class="checkbox"> <label> <input value="1" type="checkbox"  name="data[<?php echo $count; ?>][EmployeeHiring][exception]" >
                                        </label> </div>
                                    <span>
                                        <a href="javascript:void(0)" ng-click="openPopUp('get', 'employee/document_exception/<?php echo $count; ?>', 'hiring_popups')" class="com_admin_btns btn_bck">Document Exception</a></span>
                                </td>

                            </tr>
                        <?php } ?>



                        <tr class="trbrdr">
                            <th>Hiring Committee Recommendation</th>
                            <th class="text-left td-col-2" colspan="1">
                    
                       <input type="hidden" name="data[10][EmployeeHiring][title]" value="Hiring Committee Recommendation" />
                    <div class="checkbox"> <label> <input type="checkbox" value="1" name="data[10][EmployeeHiring][completed_status]" >
                        </label> </div><div class="form-group send_msg dtepick">
                        <div id="datetimepicker13"  class="input-group date res_mar datetp">
                            <input name="data[10][EmployeeHiring][selected_date]" type="text" placeholder="Select date" class="form-control datepicker4">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div></th>
                    <th></th>
                    <th></th>

                    <th class="text-left"><div class="checkbox"> <label> 
                            <input type="hidden" name="data[10][EmployeeHiring][description]" class="committee_desc10" />

                            <input  name="data[10][EmployeeHiring][eligible]" type="checkbox" >May proceed
                        </label> </div></th><th><span>
                            <a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/final_recomendation', 'hiring_popups')" class="com_admin_btns">Final Recommendation</a>
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
                                       <input type="hidden" name="data[11][EmployeeHiring][title]" value="In Person Interview" />
                                    <input name="data[11][EmployeeHiring][completed_status]" value="1" type="checkbox" >
                                </label> </div>
                            <div class="form-group send_msg dtepick">
                                <div id="datetimepicker13"  class="input-group date res_mar datetp">
                                    <input  name="data[11][EmployeeHiring][selected_date]" type="text" placeholder="select date" class="form-control datepicker4">
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
                            <div class="checkbox"> <label> <input  value="1" name="data[12][EmployeeHiring][completed_status]" type="checkbox" >
                                       <input type="hidden" name="data[12][EmployeeHiring][title]" value="In Person Meeting with Spouse" />
                                </label> </div>
                            <div class="form-group send_msg dtepick">
                                <div id="datetimepicker13"  class="input-group date res_mar datetp"> 
                                    <input type="text"  name="data[12][EmployeeHiring][selected_date]" placeholder="select date" class="form-control datepicker4">
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
            <div class="table-responsive manage_licsn_tabl social_sites_table hiring_decision hiringtdwidth">
                <table class="table ">

                    <tr class="trbrdr">
                        <th>Official Decision</th>
                        <th class="text-left td-col-2" colspan="1"></th>

                        <th ></th>
                        <th><span>
                                <a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/decision_notes', 'hiring_popups')" class="com_admin_btns">Decision Notes</a>
                            </span></th>
                    </tr>
                    <tr>
                        <td class="oficial_decision"> 
                            <div class="checkbox">
                                   <input type="hidden" name="data[14][EmployeeHiring][title]" value="Decision Notes" />
                                <input type="hidden" name="data[14][EmployeeHiring][description]" class="committee_desc11" />
                                <label> 
                                    <input  name="data[14][EmployeeHiring][requirements][]" value="Meets Requirements" type="checkbox" >Meets Requirements
                                </label>
                                <label> <input value="Provisional Approval" name="data[14][EmployeeHiring][requirements][]" type="checkbox">Provisional Approval
                                </label> 
                                <label>
                                    <input value="Deny" name="data[14][EmployeeHiring][requirements][]" type="checkbox" >Deny
                                </label> 
                            </div>
                        </td>
                    </tr>
                    <tbody >
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center spc btm_btns">
        <button class="btm_btns" type="submit">Save</button><a class=" cncel_btn" href="javascript:void(0)">Cancel</a>

    </div>
</form>
<style>
    .fileupicon{
        background-color: transparent;
        padding: 0px; 
        width: auto;
    }
</style>