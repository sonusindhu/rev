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
    <div class="col-md-12 form_fields spc emp_title mar20 emp_acc">

        <h4 class="res_pdng"><span class="title_spn1">Account Management</span></h4>

        <div class="col-md-4 spc mailing_address  clearfix ">
            <div class="form-group ">

                <label class="col-sm-5 res_spc1 control-label">System ID</label>
                <div class="col-sm-5 res_spc1 high_width">
                    <p><?php echo $user['User']['company_id']; ?></p>
                </div>
            </div>
            <div class="form-group ">
                <label class="col-sm-5  res_spc1  control-label">Account Created</label>
                <div class="col-sm-5 res_spc1">
                    <p><?php echo date('m/d/Y', strtotime(@$employeeDetail['EmployeeDetail']['created'])); ?></p>
                </div>
            </div>



        </div>
        <div class="col-md-5 spc mailing_address clearfix">
            <div class="form-group ">
                <label class="col-sm-5 res_spc1 control-label">Role</label>
                <div class="col-sm-5 res_spc1 high_width">
                    <p>
                        <span class="loan_orgin"><?php echo @$findBranch['Role']['name']; ?></span>
                        <span class="chnge">

                            <a href="javascript:void(0)" ng-click="openPopUp('get', 'role/show_role', 'new_role_popup')" id="role_and_assignment">Change</a> 
                        </span>
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group chk_tip ">
                <label class="col-sm-7  res_spc1  control-label">
                    <div class="checkbox ">
                        <?php 
                        $setDisabled="";
                        if(isset($employeeDetail['EmployeeDetail']['business_email']) and empty($employeeDetail['EmployeeDetail']['business_email'])){ 
                            $setDisabled="disabled";
                            
                            ?>
                    <span class="chk_tooltip">Cannot activate this account until a business email address is entered as the login ID</span>
                        <?php } ?>
                        <label> 
                            <?php
                            $selected = "";
                            if (!empty($employeeDetail['EmployeeDetail']['paid_status'])) {
                                $selected = "checked";
                            }
                            ?>
                            <input <?php echo $setDisabled; ?> class="licenseStatus" <?php echo $selected; ?> value="1" type="checkbox" >
                            Account Active
                        </label> 
                    </div></label>
                <div class="col-sm-7 res_spc1 ">
                    <p>
                        <span class="ad_licnse">
                         <a href="javascript:void(0);" ng-click="openPopUp('get', 'employee/add_user_license/<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>', 'new_role_popup')">Add Licenses</a>
                        </span>
                    </p>
                     </div>
            </div>



        </div>


    </div>
    <div class="col-md-12 log_details spc mbtm20 clearfix">

        <p> <label>Login ID</label> <span><?php echo @$employeeDetail['EmployeeDetail']['business_email']; ?></span><span class="edit_login"><a ng-click="openPopUp('get', 'employee/edit_email/<?php echo @$employeeDetail['EmployeeDetail']['business_email']; ?>', '')" href="javascript:void(0)">Edit</a>
                <a href="javascript:void(0)" ng-click="virtualLogin('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>');">Login As</a>
                <!--<a href="<?php //echo BASE_URL;?>employee">Login As</a>-->
            
            </span></p>
        <p> <label>Password</label> <span class="anchr"> 
                <a  ng-click="openPopUp('get', 'employee/set_password/<?php echo @$employeeDetail['EmployeeDetail']['id'];?>', 'new_role_popup')" href="javascript:void(0)">Set Password</a>
                 <a ng-click="actual_set_password('<?php echo @$employeeDetail['EmployeeDetail']['id'];?>')" href="javascript:void(0)">Force Change</a>
            </span> </p>
    </div>    
    <div class="col-md-12 log_details spc mbtm20 clearfix">

        <p> <label>Other Option</label></p>
        <p> <span class="anchr">
                <a href="javascript:void(0);" id="activityNew" ng-click="addTabMenu('activity', 'employee/personel_info/<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>', 'activity')">View Activity</a> 
                <a href="#">Reassign Relationships</a>
                <a ng-click="openPopUp('get', 'employee/send_message/<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>', 'trms_services send_msg ')" href="javascript:void(0)">Send System Message</a>
                <a ng-click="deleteEmployeePermanently('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>');" href="javascript:void(0);">Delete Permanently</a>
            </span> </p>
    </div>    
</div>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:void(0);">&times;</a>
    <strong>Success! </strong>User Licenses added successfully.
</div>
<script>
    $(document).on('ifChecked', '.licenseStatus', function (event) {
        var employee_id = $('.employee_id').val();
        $.ajax({
            type: "post",
            url: 'employee/add_license_status',
            dataType: 'json',
            data: {employee_id: employee_id, status: '1', type: 'paid_status'},
            success: function (response) {
                if (response.status == 'true') {
                    return false;
                   // swal('Success', response.message, 'success');
                }
            }
        });
    });
    $(document).on('ifUnchecked', '.licenseStatus', function (event) {
        var employee_id = $('.employee_id').val();
        $.ajax({
            type: "post",
            url: 'employee/add_license_status',
            dataType: 'json',
            data: {employee_id: employee_id, status: '0', type: 'paid_status'},
            success: function (response) {
                if (response.status == 'true') {
                      return false;
                   // swal('Success', response.message, 'success');
                }
            }
        });
    });
</script>