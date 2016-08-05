<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" /><div class="col-md-12 general_dv  clearfix employe_link  ">
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
    <form id="idforForm" method="post" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')" >
        <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
        <div class="col-md-12 form_fields spc emp_title mar20 ">
            <h4 class="res_pdng"><span class="title_spn1">Manage Lender Access</span></h4>
            <div class="row">
                <div class="col-md-12 spc usecompanyacc">
                    <p class="AddStateLicense">
                        <a class="com_admin_btns " href="javascript:void(0);" ng-click="addMoreLender()">Add Lender</a> 
                    </p>
                </div>
                   <div class="col-md-12 marg_bot1"> 
                <div class="table-responsive manage_licsn_tabl license_user role_manage employeeuser-license lender_access">
                    <?php
                    if (!empty($employeeDetail['EmployeeLender'])) {
                        ?> <table class="table">
                        <?php
                    } else {
                        ?>
                            <table class="table " style="display: none">
                                <?php
                            }
                            ?>

                            <tbody>
                                <tr class="bg_white">
                                    <th class="thwidth">Lender 
<!--                                        <span class="flt_ryt">
                                            <img src="<?php echo $this->webroot; ?>images/updown.png" alt=""/>
                                        </span>-->
                                    </th>
                                    <th class=" thwidth">User Name</th>
                                    <th class=" thwidth">Password </th>
                                    <th class=" chkwidth">Active</th>
                                    <th></th>
                                </tr>
                            </tbody>
                            <tbody class="addLender" addpopup>
                            <input type="hidden" value="<?php
                            if(!empty($employeeDetail['EmployeeLender'])){
                                $count=count(@$employeeDetail['EmployeeLender']);
                            }else{
                                $count=0;
                            }
                            echo $count; ?>" id="LicenseValues" />
                            <?php
                            if (!empty($employeeDetail['EmployeeLender'])) {
                                foreach ($employeeDetail['EmployeeLender'] as $key => $value) {
                                    ?>
                                    <tr>
                                        <td class="send_msg">
                                            <select  name="data[<?php echo $key; ?>][EmployeeLender][lender]" class="selectpicker col-md-8 spc">
                                                <?php foreach($employeelender as $keyss=>$valss){
                                                    ?>
                                                <option value="<?php echo $keyss; ?>"><?php echo $valss; ?></option>
                                                <?php
                                                } ?>
                                            </select></td>
                                        <td>   <input value="<?php echo $value['username']; ?>" type="text"  name="data[<?php echo $key; ?>][EmployeeLender][username]" placeholder="" class="form-control"></td>
                                        <td>   <input type="text"  value="<?php echo $value['enc_password']; ?>" name="data[<?php echo $key; ?>][EmployeeLender][password]" placeholder="" class="form-control"></td>

                                        <td class="text-center" ><div class="checkbox"> <label> 
                                                    <?php 
                                                    $select = ""; 
                                                    if(!empty($value['lender_status'])){
                                                      $select = "checked";  
                                                    }
                                                    ?>
                                                    <input <?php echo $select; ?> value="1" name="data[<?php echo $key; ?>][EmployeeLender][lender_status]" type="checkbox" >
                                                </label> </div></td>
                                        <td class="cus_pro_td">
                                            <a href="javascript:void(0);" ng-click="deleteLender($event,'<?php echo $value['id']; ?>')">
                                                <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
                                                <span class="icons_cls">Trash</span></a></td>


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
            <button class="" type='submit'>Save</button>
            <a class=" cncel_btn" href="javascript:void(0);">Cancel</a>
        </div>
    </form>
</div>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:void(0);">&times;</a>
    <strong>Success!</strong> Lenders added successfully.
</div>