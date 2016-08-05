<div class="col-md-12 companyadmin_outer ">
    <div class="col-md-12 spc form_fields spc  ">
        <div class="col-md-12 spc  sep_div new_lender ">
            <div data-example-id="togglable-tabs" class="bs-example bs-example-tabs">
                <ul role="tablist" class="nav nav-tabs" id="myTabs1"> 
                    <li role="presentation"><a aria-controls="profile" data-toggle="tab" id="Humanresourse_tab" role="tab" ng-click="page.addTab('Settings', '/developer/company/employee/setting', 'settings');
                        activeStateCheck('settings');
                        showHide('showList', 'show_credits');" >Human Resourses</a></li>
                    <li role="presentation"> 
                        <a href="javascript:void(0)" id="admin_tab" ng-click="showHide('show_credits', 'showList');">Credit Bureaus</a></li>
                </ul>
                <div class="tab-content" id="myTabContent"> 
                    <div aria-labelledby="Generalinfo_tab" id="GeneralInfo" class="tab-pane fade active in title_head" role="tabpanel"> 
                        <div class="col-md-12 general_dv  clearfix employe_link showList">
                            <div class="row">
                                <ul class="employe_li">
                                    <li class="active">
                                        <a  id="qualification" ng-click="page.addTab('Settings', '/developer/company/employee/setting', 'settings');
                                            activeStateCheck('settings')"  href="javascript:void(0)" >Lists</a></li>

                                </ul>
                            </div>

                            <div class="clearfix"></div>


                            <!--  Add Html Code here -->
                            <div class="modal-body clearfix hiring_popups">







                                <!--<h2><a href="#">Add Requirement</a></h2>-->

                                <div class="col-md-10 form_fields spc editqualificate">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 spc  qualificate_sec1">

                                            <div class="form-group">

                                                <div class="col-sm-7 col-xs-10 res_spc1  ">
                                                    <label> Candidate Qualification review</label>
                                                </div>

                                                <div class=" col-sm-2 col-xs-2 del_icon  spc">

                                                    <span><a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/qualification/qualification', 'hiring_popups')"  >Edit</a></span>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-sm-7 col-xs-10 res_spc1  ">
                                                    <label> New Hire Onboarding Legal Documentation List</label>
                                                </div>

                                                <div class=" col-sm-2 col-xs-2 del_icon  spc">
                                                    <span><a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/qualification/legal', 'hiring_popups')"  >Edit</a></span>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-sm-7 col-xs-10 res_spc1  ">
                                                    <label>New Employee Transition Checklist</label>
                                                </div>

                                                <div class=" col-sm-2 col-xs-2 del_icon  spc">


                                                    <span><a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/qualification/checklist', 'hiring_popups')"  >Edit</a></span>
                                                </div>
                                            </div>
                                          

                                        </div>


                                    </div>
                                </div>

                            </div>    


                            <!--  Add Html Code here -->

                        </div>
                        <div class="col-md-12 general_dv  clearfix employe_link  show_credits" style="display: none;">
                            <div class="col-md-12 form_fields spc emp_title mar20 ">
                                <h4 class="res_pdng"><span class="title_spn1">Credit Bureaus</span></h4>
                                <div class="row">
                                    <div class="col-md-12 spc usecompanyacc">
                                        <p class="AddStateLicense">
                                            <a class="com_admin_btns" ng-click="addCreditBureausSetting()" href="javascript:void(0);">Add Credit Bureaus</a>   
                                        <div class="checkbox"> 
                                            <label> 
                                                <?php
                                                $cmpanyStatus = "";
                                                if (!empty($employeeDetail['EmployeeDetail']['company_account']) and $employeeDetail['EmployeeDetail']['company_account'] == 'yes') {
                                                    $cmpanyStatus = "checked";
                                                }
                                                ?>



<!--<input <?php //echo $cmpanyStatus;    ?> type="checkbox" class="licenseStatus" />Use Company Account-->
                                            </label> 
                                        </div></p>

                                    </div> 
                                    <div class="col-md-12  ">
                                        <div class="table-responsive manage_licsn_tabl license_user role_manage employeeuser-license lender_access credt_setting">
                                            <form id="creditSetting" ng-submit="addcreditSetting();">                                    

                                                <?php if (!empty($creditSetting)) {
                                                    ?>
                                                    <table class="table">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <table class="table"  style="display:none;">
                                                            <?php
                                                        }
                                                        ?>

                                                        <tbody>
                                                            <tr class="bg_white">
                                                                <th class=" thwidth">Credit Bureaus</th>
                                                                <th class="thwidth">Account</th>
                                                                <th class="thwidth">User Name</th>
                                                                <th class=" thwidth">Password </th>
                                                                <th class=" chkwidth">Active</th>
                                                                <th></th>



                                                            </tr>
                                                        </tbody>
                                                        <tbody class="addCredit" addpopup>
                                                        <input type="hidden" value="<?php echo count(@$creditSetting); ?>" id="CreditSettingVal" />
                                                        <?php
                                                        if (!empty($creditSetting)) {
                                                            foreach ($creditSetting as $key => $value) {
                                                                ?>
                                                                <tr> 
                                                                    <td class="send_msg">
                                                                        <input  name="data[<?php echo $key; ?>][EmployeeCreditSetting][credit]" value="<?php echo $value['EmployeeCreditSetting']['credit']; ?>" type="text" placeholder="" class="form-control">

                                                                    </td>

                                                                    <td>   <input  name="data[<?php echo $key; ?>][EmployeeCreditSetting][account]" value="<?php echo @$value['EmployeeCreditSetting']['account']; ?>" type="text" placeholder="" class="form-control"></td>
                                                                    <td>   <input  name="data[<?php echo $key; ?>][EmployeeCreditSetting][username]" value="<?php echo $value['EmployeeCreditSetting']['username']; ?>" type="text" placeholder="" class="form-control"></td>
                                                                    <td>   <input  name="data[<?php echo $key; ?>][EmployeeCreditSetting][password]" type="text" value="<?php echo $value['EmployeeCreditSetting']['enc_password']; ?>"  placeholder="" class="form-control"></td>


                                                                    <td>   
                                                                        <div class="checkbox"> 
                                                                            <label> 
                                                                                <?php
                                                                                $checked = "";
                                                                                if (!empty($value['EmployeeCreditSetting']['status'])) {
                                                                                    $checked = "checked";
                                                                                }
                                                                                ?>


                                                                                <input <?php echo $checked; ?> type="checkbox" value="1" name="data[<?php echo $key; ?>][EmployeeCreditSetting][status]" >
                                                                            </label> 
                                                                        </div>
                                                                    </td>
                                                                    <td class="cus_pro_td">
                                                                        <a href="javascript:void(0);" ng-click="deleteCreditSetting($event, '<?php echo $value['EmployeeCreditSetting']['id']; ?>')">
                                                                            <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
                                                                            <span class="icons_cls">Trash</span>
                                                                        </a>
                                                                    </td>


                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                        </tbody> 
                                                    </table>
                                                    <div class="col-md-12 text-center spc btm_btns  setting_btn">

                                                        <button type="submit">Save</button><a class=" cncel_btn" href="javascript:void(0)">Cancel</a>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div style="display:none;"  class="alert alert-success ResponseDiv">
                                                        <a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
                                                        <strong>Success!</strong>Employee Details added successfully.
                                                    </div>

                                            </form>  

                                        </div>

                                    </div>


                                </div>





                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div> 
</div>



