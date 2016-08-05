<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
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
    <form id="idforForm" method="post" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id']; ?>')" >
        <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
        <div class="col-md-12 form_fields spc emp_title mar20 ">
            <h4 class="res_pdng"><span class="title_spn1">Credit Bureaus</span></h4>
            <div class="row">
                <div class="col-md-12 spc usecompanyacc">
                    <p class="AddStateLicense">
                        <a class="com_admin_btns" ng-click="addCreditBureaus()" href="javascript:void(0);">Add Credit Bureaus</a>   
                    <div class="checkbox"> 
                        <label> 
                            <?php
                            $cmpanyStatus = "";
                            if (!empty($employeeDetail['EmployeeDetail']['company_account']) and $employeeDetail['EmployeeDetail']['company_account'] == 'yes') {
                                $cmpanyStatus = "checked";
                            }
                            ?>



<!--<input <?php //echo $cmpanyStatus;   ?> type="checkbox" class="licenseStatus" />Use Company Account-->
                        </label> 
                    </div></p>

                </div> 
                <div class="col-md-12  marg_bot1">
                    <div class="table-responsive manage_licsn_tabl license_user role_manage employeeuser-license lender_access">
                        <?php if (!empty($employeeDetail['EmployeeCredit'])) {
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
                                        <th class=" thwidth">Credit Bureau 
                                            <!--<span class="flt_ryt"><img src="<?php //echo $this->webroot; ?>images/updown.png" alt=""/></span>-->
                                        </th>
                                        <th class="  chkwidth">Corporate </th>
                                        <th class="thwidth">Account</th>
                                        <th class="thwidth">User Name</th>
                                        <th class=" thwidth">Password </th>
                                        <th></th>
                                    </tr>
                                </tbody>
                                <tbody class="addCredit" addpopup>
                                <input type="hidden" value="<?php echo count(@$employeeDetail['EmployeeCredit']); ?>" id="LicenseValues" />
                                <?php
                                if (!empty($employeeDetail['EmployeeCredit'])) {
                                    foreach ($employeeDetail['EmployeeCredit'] as $key => $value) {
                                        ?>
                                        <tr> 
                                            <td class="send_msg">
                                                <select name="data[<?php echo $key; ?>][EmployeeCredit][credit_bureas]" class="selectpicker col-md-8 spc">
                                                    <?php
                                                    if (!empty($credit)) {
                                                        foreach ($credit as $keyt => $val) {
                                                            $selected="";
                                                            if($keyt==$value['credit_bureas']){
                                                              $selected="selected";
                                                            }
                                                            ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $keyt; ?>"><?php echo $val; ?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>





                                            </td>
                                            <td>   
                                                <?php
                                                $checkedSelected = '';
                                                $disabled='';
                                                if (!empty($value['corporate'])) {
                                                    $checkedSelected = 'checked ';
                                                    $disabled="disabled";
                                                }
                                                ?> 


                                                <input <?php echo $checkedSelected; ?> name="data[<?php echo $key; ?>][EmployeeCredit][corporate]" type="checkbox" value="1"  placeholder="" class="corporate"></td>
                                            <td>   <input <?php echo $disabled; ?> name="data[<?php echo $key; ?>][EmployeeCredit][account]" value="<?php echo @$value['account']; ?>" type="text" placeholder="" class="form-control account"></td>
                                            <td>   <input  <?php echo $disabled; ?> name="data[<?php echo $key; ?>][EmployeeCredit][username]" value="<?php echo $value['username']; ?>" type="text" placeholder="" class="form-control name"></td>
                                            <td>   <input <?php echo $disabled; ?>  name="data[<?php echo $key; ?>][EmployeeCredit][password]" type="text" value="<?php echo $value['enc_password']; ?>"  placeholder="" class="form-control password"></td>
                                            
                                            <td class="cus_pro_td">
                                                <a href="javascript:void(0);" ng-click="deleteCredit($event, '<?php echo $value['id']; ?>')">
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
            <a class=" cncel_btn" href="javascript:void(0);">Cancel</a>
        </div>
    </form>
    <div class="clearfix"></div>
    <div style="display:none;"  class="alert alert-success ResponseDiv">
        <a title="close" aria-label="close" data-dismiss="alert" class="close" href="javascript:void(0);">&times;</a>
        <strong>Success!</strong> Credit Bureaus added successfully.
    </div>
</div>

<script>
    $(document).on('ifChecked', '.licenseStatus', function (event) {
        var employee_id = $('.employee_id').val();
        $.ajax({
            type: "post",
            url: 'employee/add_license_status',
            dataType: 'json',
            data: {employee_id: employee_id, status: 'yes', type: 'company_account'},
            success: function (response) {
                if (response.status == 'true') {
                    //swal('Success', response.message, 'success');
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
            data: {employee_id: employee_id, status: 'no', type: 'company_account'},
            success: function (response) {
                if (response.status == 'true') {
                    //swal('Success', response.message, 'success');
                }
            }
        });
    });
    $(document).on('ifChecked', '.corporate', function (event) {
        $(this).parent().parent().parent().find('.name, .username, .account').attr('disabled','disabled');
        $(this).parent().parent().parent().find('.name, .username, .account').addClass('disableGrey');

     });

    $(document).on('ifUnchecked', '.corporate', function (event) {
         $(this).parent().parent().parent().find('.name, .username, .account').removeAttr('disabled','disabled');
         $(this).parent().parent().parent().find('.name, .username, .account').removeClass('disabled','disabled');
       
    });
</script>