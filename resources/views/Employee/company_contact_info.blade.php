<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
<form id="idforForm" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')">
    <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
    <div class="col-md-12 general_dv  clearfix employe_link contct-information">
        <?php
        if (!empty($employeeDetail['EmployeeDetail']['id'])) {
            ?>
            <div class="row" compile_template>
                <ul class="employe_li">
                    <li class="{{personel_info}} active"><a ng-click="addTabMenu('personel_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'personel_info');
                                                            <?php 
                                                            if(!empty($employeeDetail['EmployeeDetail']['spouse_first_name'])){
                                                                ?>
                                                                    addSpouse('<?php echo $employeeDetail['EmployeeDetail']['id']; ?>');
                                                                    <?php
                                                                
                                                            }?>" id="personel_info" href="javascript:void(0);">Personal info</a></li>
                    <li class="{{professional_info}}" ><a ng-click="addTabMenu('professional_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'professional_info')"  id="professional_info" href="javascript:void(0);">Professional Info</a></li>
                    <li class="{{contact_info}}" ><a ng-click="addTabMenu('contact_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'contact_info')" id="contact_info" href="javascript:void(0);">Contact Detail</a></li>
                    <li class="{{activity}}" ><a  ng-click="addTabMenu('activity', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'activity')" id="activity" href="javascript:void(0);">Activity</a></li>
                </ul>
            </div>
            <?php
        } else {
            echo $this->element('company_employee_tabs_li');
        }
        ?>

        <div class="col-md-12 spc cntactdetail_sec ">
            <div class="row">
                <div class="col-md-6">
                    <h4>Telephone Numbers</h4>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Business Direct </label>
                        <div class="col-sm-7 res_spc1 ">
                            <input value="<?php echo @$employeeDetail['EmployeeDetail']['business_direct']; ?>" type="text" name="data[EmployeeDetail][business_direct]" placeholder="" class="form-control phoneNo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Business Main</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input value="<?php echo @$employeeDetail['EmployeeDetail']['business_main']; ?>" type="text" name="data[EmployeeDetail][business_main]" placeholder="" class="form-control phoneNo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Cell</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input value="<?php echo @$employeeDetail['EmployeeDetail']['cell']; ?>"  type="text" name="data[EmployeeDetail][cell]" placeholder="" class="form-control phoneNo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Home</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input value="<?php echo @$employeeDetail['EmployeeDetail']['home']; ?>" type="text" name="data[EmployeeDetail][home]" placeholder="" class="form-control phoneNo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Spouse Cell</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input value="<?php echo @$employeeDetail['EmployeeDetail']['spouse_cell']; ?>" type="text" name="data[EmployeeDetail][spouse_cell]" placeholder="" class="form-control phoneNo">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Email Addresses</h4>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Business Email  </label>
                        <div class="col-sm-7 res_spc1 ">
                            <input value="<?php echo @$employeeDetail['EmployeeDetail']['business_email']; ?>" type="text" name="data[EmployeeDetail][business_email]" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Personal Email </label>
                        <div class="col-sm-7 res_spc1 ">
                            <input  value="<?php echo @$employeeDetail['EmployeeDetail']['personal_email']; ?>"  type="text" name="data[EmployeeDetail][personal_email]" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Spouse</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input  value="<?php echo @$employeeDetail['EmployeeDetail']['spouse']; ?>"  type="text" name="data[EmployeeDetail][spouse]" placeholder="" class="form-control">
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-12 spc cntactdetail_sec head_title ">
            <div class="row">
                <div class="col-md-6  ">
                    <h4> <span class="head_title" >Home Address</span>
                        <!--<span class="homeadres_btn"><a class="com_admin_btns" href="#">Clear</a></span>-->
                    </h4>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Address 1</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input  value="<?php echo @$employeeDetail['EmployeeDetail']['address']; ?>"  type="text" name="data[EmployeeDetail][address]"  placeholder="" class="form-control">
                            <input type="hidden" value="{{branch_id}}" name="data[EmployeeDetail][branch_id]"  placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Address 2</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input  value="<?php echo @$employeeDetail['EmployeeDetail']['address_more']; ?>"  type="text" name="data[EmployeeDetail][address_more]" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">City</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input  value="<?php echo @$employeeDetail['EmployeeDetail']['city']; ?>"  type="text" name="data[EmployeeDetail][city]" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">State</label>
                        <div class="col-sm-7 res_spc1 send_msg">

                            <select  name="data[EmployeeDetail][state]" class="selectpicker col-md-8 spc">

                                <?php
                                if (!empty($employeeDetail['EmployeeDetail']['state'])) {
                                    if (!empty($state)) {
                                        foreach ($state as $key => $value) {
                                            if ($employeeDetail['EmployeeDetail']['state'] == $value) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <option value="">Select State</option>
                                    <?php
                                    if (!empty($state)) {
                                        foreach ($state as $key => $value) {
                                            ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>

                            </select>




<!--<input type="text" name="data[EmployeeDetail][state]" placeholder="" class="form-control">-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 spc  control-label">Zip Code</label>
                        <div class="col-sm-7 res_spc1 ">
                            <input  value="<?php echo @$employeeDetail['EmployeeDetail']['code']; ?>" type="text" name="data[EmployeeDetail][code]" placeholder="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-md-offset-0 branch_assignment  ">
                    <h4> 
                        <span class="head_title" >Branch Assignment </span><span><a ng-click="openPopUp('get', 'employee/show_selected_branch/<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>', 'lookup-branch')" href="javascript:void(0)"  class="com_admin_btns" >Lookup Branch</a></span>
<!--                        <span class="head_title" >Branch Assignment </span><span><a ng-click="openPopUp('get', 'employee/lookup_branch', 'lookup-branch')" href="javascript:void(0)"  class="com_admin_btns" >Lookup Branch</a></span>-->
                    </h4>  
                    <h5><?php echo @$findBranch['Branch']['office']; ?></h5>
                    <ul>
                        <li><?php echo @$findBranch['Branch']['address']; ?></li>
                        <li><?php if(!empty($findBranch['Branch']['address_more'])){
                          echo @$findBranch['Branch']['address_more'].',';  
                        }
                         ?> <?php echo @$findBranch['Branch']['city']; ?>  <?php echo @$findBranch['Branch']['zipcode']; ?></li> 
                        <li> Branch NMLS ID <?php echo @$findBranch['Branch']['nmls_number']; ?></li>
                        <li><?php echo @$findBranch['Branch']['phone']; ?> </li>
                    </ul>
                </div>   

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-12 form_fields spc">
            <div class="table-responsive manage_licsn_tabl social_sites_table">
                <table class="table ">

                    <tr>
                        <th colspan="2">Personal Social Sites</th>
                        <th class="lft30" colspan="3">Approved for Business</th>

                    </tr>


                    <tbody>
                        <tr> 

                            <td>Linkedin</td>
                            <td>   <input type="text" value="<?php echo @$employeeDetail['EmployeeDetail']['linkedin']; ?>" name="data[EmployeeDetail][linkedin]" placeholder="Enter Url" class="form-control"></td>

                            <td class="text-center chcktd">
                                <div class="checkbox"> <label> 
                                        <?php
                                        if (!empty($employeeDetail['EmployeeDetail']['linkedin_status'])) {
                                            $checked = 'checked';
                                        } else {
                                            $checked = '';
                                        }
                                        ?>
                                        <input <?php echo $checked; ?> type="checkbox" name="data[EmployeeDetail][linkedin_status]" >
                                    </label> </div></td>
                            <td class="dtepick"> 
                                <div class="form-group send_msg">
                                    <div id="datetimepicker13"  class="input-group date res_mar datetp">
                                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['linkedin_date']; ?>" type="text" name="data[EmployeeDetail][linkedin_date]" placeholder="select date" class="form-control datepicker4">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>  </td>
                        </tr>
                        <tr> 

                            <td>Marketing Website</td>
                            <td>   <input type="text" value="<?php echo @$employeeDetail['EmployeeDetail']['marketing_website']; ?>" name="data[EmployeeDetail][marketing_website]" placeholder="Enter Url" class="form-control"></td>

                            <td class="text-center"><div class="checkbox"> <label> 
                                        <?php
                                        if (!empty($employeeDetail['EmployeeDetail']['marketing_website_status'])) {
                                            $checkedMar = 'checked';
                                        } else {
                                            $checkedMar = '';
                                        }
                                        ?>
                                        <input type="checkbox" <?php echo $checkedMar; ?> name="data[EmployeeDetail][marketing_website_status]" >
                                    </label> </div></td>
                            <td class="dtepick">    <div class="form-group send_msg">
                                    <div id="datetimepicker13" class="input-group date res_mar datetp">
                                        <input type="text" name="data[EmployeeDetail][marketing_website_date]" value="<?php echo @$employeeDetail['EmployeeDetail']['marketing_website_date']; ?>" placeholder="select date" class="form-control datepicker4">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>  </td>
                        </tr>
                        <tr> 

                            <td>Facebook Account</td>
                            <td>   <input type="text" name="data[EmployeeDetail][facebook]" placeholder="Enter Url" value="<?php echo @$employeeDetail['EmployeeDetail']['facebook']; ?>" class="form-control"></td>

                            <td class="text-center"><div class="checkbox"> <label> 
                                        <?php
                                        if (!empty($employeeDetail['EmployeeDetail']['facebook_status'])) {
                                            $checkedFace = 'checked';
                                        } else {
                                            $checkedFace = '';
                                        }
                                        ?>

                                        <input <?php echo $checkedFace; ?> type="checkbox" name="data[EmployeeDetail][facebook_status]" >
                                    </label> </div></td>
                            <td class="dtepick">    <div class="form-group send_msg">
                                    <div id="datetimepicker13" class="input-group date res_mar datetp">
                                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['facebook_date']; ?>" type="text" name="data[EmployeeDetail][facebook_date]" placeholder="select date" class="form-control datepicker4">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>  </td>
                        </tr>
                        <tr> 

                            <td>Twitter Account</td>
                            <td>   <input type="text" name="data[EmployeeDetail][twitter]"placeholder="Enter Url" value="<?php echo @$employeeDetail['EmployeeDetail']['twitter']; ?>" class="form-control"></td>

                            <td class="text-center"><div class="checkbox"> <label> 
                                        <?php
                                        if (!empty($employeeDetail['EmployeeDetail']['twitter_status'])) {
                                            $checkedTwitter = 'checked';
                                        } else {
                                            $checkedTwitter = '';
                                        }
                                        ?>

                                        <input <?php echo $checkedTwitter; ?> type="checkbox" name="data[EmployeeDetail][twitter_status]" >
                                    </label> </div></td>
                            <td class="dtepick">    <div class="form-group send_msg">
                                    <div id="datetimepicker13" class="input-group date res_mar datetp">
                                        <input type="text" value="<?php echo @$employeeDetail['EmployeeDetail']['twitter_date']; ?>" name="data[EmployeeDetail][twitter_date]"placeholder="select date" class="form-control datepicker4">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>  </td>
                        </tr>
                        <tr> 

                            <td>Pinterest</td>
                            <td>   <input type="text" name="data[EmployeeDetail][pintrest]" placeholder="Enter Url" value="<?php echo @$employeeDetail['EmployeeDetail']['pintrest']; ?>" class="form-control"></td>

                            <td class="text-center"><div class="checkbox"> <label>

                                        <?php
                                        if (!empty($employeeDetail['EmployeeDetail']['pintrest_status'])) {
                                            $checkedPintrest = 'checked';
                                        } else {
                                            $checkedPintrest = '';
                                        }
                                        ?>
                                        <input <?php echo $checkedPintrest; ?> type="checkbox" name="data[EmployeeDetail][pintrest_status]" >
                                    </label> </div></td>
                            <td class="dtepick">    <div class="form-group send_msg">
                                    <div id="datetimepicker13" class="input-group date res_mar datetp">
                                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['pintrest_date']; ?>" type="text" name="data[EmployeeDetail][pintrest_date]"placeholder="select date" class="form-control datepicker4">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>  </td>
                        </tr>

                    </tbody> 
                </table>
            </div>


        </div>








    </div>
    <div class="col-md-12 text-center spc btm_btns">
        <button type="submit">Save</button>
        <a class=" cncel_btn" href="#">Cancel</a>
    </div>
</form>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:void(0);">&times;</a>
    <strong>Success!</strong> Employee Contact details added successfully.
</div>