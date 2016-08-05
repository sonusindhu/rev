<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" /><div class="col-md-12 general_dv  clearfix employe_link  ">
    <form id="idforForm" method="post" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')" >
        <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
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

        <div class="col-md-12 form_fields spc emp_title mar20 ">
            <h4 class="res_pdng"><span class="title_spn1">Manage Licenses</span></h4>
            <div class="row">
                <div class="col-md-12 NMLSinputfield spc">
                    <div class="form-group ">

                        <label class="col-sm-3 res_spc1 control-label">NMLS ID#</label>
                        <div class="col-sm-8 res_spc1 high_width">
                            <input name="data[EmployeeDetail][nmls_id]" value="<?php echo @$employeeDetail['EmployeeDetail']['nmls_id']; ?>" type="text" placeholder="" class="form-control">
                        </div>
                    </div>
                    <div class="checkbox"> <label>
                            <?php
                            $licenseStatus = '';
                            if (!empty($employeeDetail['EmployeeDetail']['license_status']) and $employeeDetail['EmployeeDetail']['license_status'] == 'yes') {
                                $licenseStatus = 'checked';
                            }
                            ?>
                            <input <?php echo $licenseStatus; ?> class="licenseStatus" type="checkbox">Active <small>If unchecked, employee can not create, view or edit Client Profiles</small></label> </div>

                </div> 
                <p class="AddStateLicense">
                    <a ng-click="addMoreLicence()" class="com_admin_btns " href="javascript:void(0);">Add State License</a>
                </p>
                <div class="col-md-12">
                    <div class="table-responsive manage_licsn_tabl  employeeuser-license lender_access ">
                        <?php if (!empty($employeeDetail['EmployeeLicense'])) {
                            ?>
                            <table  id="" class="table">
                                <?php
                            } else {
                                ?>
                                <table   id="" style="display:none;" class="table">
                                <?php }
                                ?>
                                <thead>
                                    <tr class="bg_white">
                                        <th class=" thwidth">State <span class="flt_ryt">
                                                <!--<img src="<?php // echo $this->webroot; ?>images/updown.png" alt=""/>-->
                                            </span></th>

                                        <th class=" thwidth">License#</th>
                                        <th class=" thwidth">Status <span class="flt_ryt">
                                                <!--<img src="<?php //echo $this->webroot; ?>images/updown.png" alt=""/>-->
                                            </span></th>

                                        <th class="thwidth">Through 
                                            <!--<span class="flt_ryt"><img src="<?php // echo $this->webroot; ?>images/updown.png" alt=""/></span>-->
                                        </th>
                                        <th class=" chkwidth">Approve</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="addLicenseMore"  addpopup>
                                <input type="hidden" value="<?php echo count(@$employeeDetail['EmployeeLicense']); ?>" id="LicenseValues" ng-model="LicenseValue"/>
                                <?php
                                if (!empty($employeeDetail['EmployeeLicense'])) {
                                    foreach ($employeeDetail['EmployeeLicense'] as $keyss => $val) {
                                        ?>
                                        <tr> 
                                            <td class="send_msg">
                                                <select name="data[<?php echo $keyss; ?>][EmployeeLicense][state]" class="selectpicker col-md-8 spc">

                                                    <option></option>
                                                    <?php
                                                    if (!empty($state)) {
                                                        foreach ($state as $key => $value) {
                                                            $select = "";
                                                            if ($key == $val['state']) {
                                                                $select = "selected";
                                                            }
                                                            ?>
                                                            <option <?php echo $select; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </select></td>
                                                <td>   <input type="text" value="<?php echo @$val['license']; ?>"   name="data[<?php echo $keyss; ?>][EmployeeLicense][license]"  placeholder="" class="form-control"></td>
                                            <td class="send_msg">
                                                <select name="data[<?php echo $keyss; ?>][EmployeeLicense][license_status]"  class="selectpicker col-md-8 spc">
                                                    <option>Active</option>
                                                    <option>Inactive</option>

                                                </select>
                                            </td>
                                            <td>   
                                                <input  name="data[<?php echo $keyss; ?>][EmployeeLicense][through]"  value="<?php echo @$val['through']; ?>" type="text"  placeholder="" class="form-control datepicker2">
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox"> 
                                                    <label>
                                                        <?php
                                                        $checked = "";
                                                        if (isset($val['approve']) and ! empty($val['approve'])) {
                                                            $checked = "checked";
                                                        }
                                                        ?>
                                                        <input <?php echo $checked; ?> value="1" name="data[<?php echo $keyss; ?>][EmployeeLicense][approve]"  type="checkbox" >
                                                    </label>
                                                </div></td>
                                            <td class="cus_pro_td">
                                                <a href="javascript:void(0);" ng-click="deleteLicense($event, '<?php echo $val['id']; ?>')">
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





                    </div>

                </div>
            </div>







        </div>
        <div class="col-md-12 text-center spc btm_btns">

            <button type="submit">Save</button>
            <a class=" cncel_btn" href="#">Cancel</a>

        </div>
    </form>
</div>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
    <strong>Success!</strong> State licenses added successfully.
</div>
<script>
    $(document).on('ifChecked', '.licenseStatus', function (event) {
        var employee_id = $('.employee_id').val();
        $.ajax({
            type: "post",
            url: 'employee/add_license_status',
            dataType: 'json',
            data: {employee_id: employee_id, status: 'yes', type: 'license_status'},
            success: function (response) {
                if (response.status == 'true') {
                  console.log('Unchecked');
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
            data: {employee_id: employee_id, status: 'no', type: 'license_status'},
            success: function (response) {
                if (response.status == 'true') {
                console.log('ifUnchecked');
                }
            }
        });
    });
</script>