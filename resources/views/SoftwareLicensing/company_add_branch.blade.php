<form id="addBranch" ng-submit="addNote('software_licensing/add_branch/<?php echo @$branchEdit['Branch']['id']; ?>', 'addBranch', 'Branch')"> 
    <div class="modal-dialog " role="document">
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo $this->webroot; ?>images/close_icon.png" alt=""/></span></button><h4 class="modal-title" id="myModalLabel">
                <?php if(isset($branchEdit['Branch']['id']) and !empty($branchEdit['Branch']['id'])){
                    ?>
                    Edit Branch
                    <?php
                    
                }else{
                    ?>Add Branch
                    <?php
                    
                } ?>
                </h4>
            </div>
           
            <div class="modal-body  clearfix">
                <div class="col-md-12 spc form_fields create_license  ad-branch11">
                    <div class="col-md-6 ">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-5  control-label">Branch Office</label>
                                <div class="col-sm-7 res_spc1 ">
                                    <input  type="text" value="<?php echo @$branchEdit['Branch']['office']; ?>" name="data[Branch][office]" placeholder="Enter Branch office Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">Address Line 1</label>
                                <div class="col-sm-7 res_spc1 ">
                                    <input value="<?php echo @$branchEdit['Branch']['address']; ?>" type="text" name="data[Branch][address]" placeholder="Address Line 1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">Address Line 2 </label>
                                <div class="col-sm-7 res_spc1">
                                    <input value="<?php echo @$branchEdit['Branch']['address_more']; ?>" type="text" name="data[Branch][address_more]" placeholder="Address Line 2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">City</label>
                                <div class="col-sm-7 res_spc1">
                                    <input  value="<?php echo @$branchEdit['Branch']['city']; ?>" type="text" name="data[Branch][city]" placeholder="Enter City" class="form-control">
                                </div>
                            </div>
                            <div class="form-group send_msg">
                                <label class="col-sm-5  control-label">State</label>
                                <div class="col-sm-7 res_spc1">
                                     <select ng-init="selectedItem='<?php echo @$branchEdit['Branch']['state_id']; ?>'"  ng-model="selectedItem" ng-change="employeeByState(selectedItem)" name="data[Branch][state_id]" class="selectpicker col-md-12 spc stateEmp">
                                        <option value="">Select</option>
                                        <?php
                                        if (!empty($state)) {
                                            foreach ($state as $key => $value) {
                                                $selected="";
                                                if($value['State']['id']==$branchEdit['Branch']['state_id']){
                                                    $selected="selected";
                                                }
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value['State']['id']; ?>"><?php echo $value['State']['state']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">Zip Code</label>
                                <div class="col-sm-7 res_spc1">
                                    <input value="<?php echo @$branchEdit['Branch']['zipcode']; ?>" type="text" name="data[Branch][zipcode]" placeholder="Enter Zip Code" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="col-md-6 ">
                        <div class="row">
                            <div class="form-group lookup1">   
                                <label class="col-sm-5  control-label">Branch Manager</label>
                                <div class="col-sm-7 res_spc1 send_msg addEMp">
                                    <select name="data[Branch][manager]" class="selectpicker col-md-12 spc employeesAccState">
                                        <option value="">Select</option>
                                        <?php
                                        if (!empty($employee) and isset($branchEdit['Branch']['state_id']) and !empty($branchEdit['Branch']['state_id'])) {
                                            foreach ($employee as $key => $value) {
                                                $brancSelected="";
                                                if($value['EmployeeDetail']['id']==$branchEdit['Branch']['manager']){
                                                   $brancSelected="selected";  
                                                }
                                                ?>
                                                <option  <?php echo $brancSelected; ?> value="<?php echo $value['EmployeeDetail']['id']; ?>"><?php echo $value['EmployeeDetail']['emp_first_name'] . ' ' . $value['EmployeeDetail']['emp_last_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>  





<!--                                    <input type="text"value="<?php echo @$branchEdit['Branch']['manager']; ?>" name="data[Branch][manager]" placeholder="" class="form-control"><span class="lookup"><img src="<?php echo $this->webroot; ?>images/lookup.png" alt=""/></span>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">Phone for Customer</label>
                                <div class="col-sm-7 res_spc1 ">
                                    <input  type="text" value="<?php echo @$branchEdit['Branch']['phone']; ?>" name="data[Branch][phone]" placeholder="Enter Number" class="form-control phoneNo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">Branch Telephone</label>
                                <div class="col-sm-7 res_spc1 ">
                                    <input  type="text" value="<?php echo @$branchEdit['Branch']['telephone']; ?>" name="data[Branch][telephone]" placeholder="Enter Branch Telephone" class="form-control phoneNo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">NMLS Number</label>
                                <div class="col-sm-7 res_spc1 ">
                                    <input value="<?php echo @$branchEdit['Branch']['nmls_number']; ?>" type="text" name="data[Branch][nmls_number]" placeholder="Enter NMLS Number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">Tax ID</label>
                                <div class="col-sm-7 res_spc1 ">
                                    <input value="<?php echo @$branchEdit['Branch']['tax_id']; ?>"  type="text" name="data[Branch][tax_id]" placeholder="Enter Code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5  control-label">Code</label>
                                <div class="col-sm-7 res_spc1 ">
                                    <input value="<?php echo @$branchEdit['Branch']['code']; ?>" type="text" name="data[Branch][code]" placeholder="Enter Code" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 text-center spc btm_btns clearfix">
                <button type="submit">Save</button>
                <a aria-label="Close" data-dismiss="modal" class="cncel_btn" href="javascript:void(0);">CANCEL</a>
            </div>

        </div>
    </div>
</form>