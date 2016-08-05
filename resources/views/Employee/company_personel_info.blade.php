<input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
<form id="idforForm" ng-submit="AddEmployee('<?php echo @$employeeDetail['EmployeeDetail']['id'] ?>')">
    <input type="hidden" name="data[EmployeeDetail][id]" class="employee_id"  value="{{employee_id}}" />
    <div class="col-md-12 general_dv  clearfix employe_link ">
        <?php
        if (!empty($employeeDetail['EmployeeDetail']['id'])) {
            ?>
            <div class="row" compile_template>
                <ul class="employe_li">
                    <li class="{{personel_info}} active">
                        <a ng-click="addTabMenu('personel_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'personel_info');
                                                            <?php 
                                                            if(!empty($employeeDetail['EmployeeDetail']['spouse_first_name'])){
                                                                ?>
                                                                    addSpouse('<?php echo $employeeDetail['EmployeeDetail']['id']; ?>');
                                                                    <?php
                                                                
                                                            } ?>
                                                            
                                                            " id="personel_info" href="javascript:void(0);">Personal info</a>
                    </li>
                    <li class="{{professional_info}}" >
                        <a ng-click="addTabMenu('professional_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'professional_info')"  id="professional_info" href="javascript:void(0);">Professional Info</a>
                    </li>
                    <li class="{{contact_info}}"><a ng-click="addTabMenu('contact_info', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'contact_info')" id="contact_info" href="javascript:void(0);">Contact Detail</a></li>
                    <li class="{{activity}}" ><a  ng-click="addTabMenu('activity', 'employee/personel_info/<?php echo $employeeDetail['EmployeeDetail']['id']; ?>', 'activity')" id="activity" href="javascript:void(0);">Activity</a></li>
                </ul>
            </div>
            <?php
        } else {
            echo $this->element('company_employee_tabs_li');
        }
        ?>
        <div class="clearfix"></div>
        <h4> <span class="title_spn1">Employee</span>
            <span>
                <?php if (!empty($employeeDetail['EmployeeDetail']['id'])) {
                    ?>
                    <a id="adbtn" ng-click="addSpouse('<?php echo $employeeDetail['EmployeeDetail']['id']; ?>')" class="com_admin_btns " href="javascript:;">Add Spouse</a>                
                    <?php
                } else {
                    ?>
                    <a id="adbtn" ng-click="addSpouse()" class="com_admin_btns " href="javascript:;">Add Spouse</a>
                <?php }
                ?>


            </span></h4>
        <div class="col-md-12 spc ">
            <div class="col-md-1 col-sm-4 col-xs-3  spc employe_img">
                <?php
                if (isset($employeeDetail['EmployeeDetail']['emp_image']) and $employeeDetail['EmployeeDetail']['emp_image'] != '') {
                    ?> 
                    <img id="image_upload_preview" src="<?php echo $this->webroot . 'upload/Employee/' . $employeeDetail['EmployeeDetail']['emp_image']; ?>" alt="" />
                    <?php
                } else {
                    ?>
                    <img id="image_upload_preview" src="<?php echo $this->webroot . 'images/default-avatar.png'; ?>" alt="" />
                    <?php
                }
                ?>

                <div class=" imgup ">
                    <div class="fileUpload btn btn-primary ">
                        <span>Upload</span>
                        <input name="data[EmployeeDetail][emp_image]" type="file" class="upload newUpload">

                    </div>
                </div>

            </div>
            <div class="col-md-10 col-sm-12  emp_sec res_spc1">

                <div class="form-group">
                    <label class="col-sm-3 spc  control-label">First Name</label>
                    <div class="col-sm-4 res_spc1 ">
                        <input name="data[EmployeeDetail][emp_first_name]"   type="text" value="<?php echo @$employeeDetail['EmployeeDetail']['emp_first_name']; ?>" placeholder="Enter First Name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 spc  control-label">Middle Name</label>
                    <div class="col-sm-4 res_spc1 ">
                        <input  value="<?php echo @$employeeDetail['EmployeeDetail']['emp_middle_name']; ?>" type="text" name="data[EmployeeDetail][emp_middle_name]"    placeholder="Enter Middle Name" class="form-control">
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-sm-3 spc  control-label">Last Name</label>
                    <div class="col-sm-4  res_spc1 ">
                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['emp_last_name']; ?>" name="data[EmployeeDetail][emp_last_name]" type="text"  placeholder="Enter Last Name" class="form-control">
                    </div>
                    <div class="col-md-5 col-sm-5 send_msg sufx_dv">
                        <label>Suffix</label>
                        <?php $array = array('Jr.', 'Sr.'); ?>
                        <select name="data[EmployeeDetail][emp_suffix]"  class="selectpicker spc">
                            <option value="">Select</option>
                            <?php
                            foreach ($array as $k => $v) {
                                $selected = '';
                                if ($v == @$employeeDetail['EmployeeDetail']['emp_suffix']) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?php echo $v; ?>" <?php echo $selected; ?>><?php echo $v; ?></option>
                            <?php }
                            ?>

                        </select>
                    </div>
                </div>

                <div class="form-group send_msg">

                    <label class="col-sm-3 spc  control-label">Birthday</label>
                    <div class="input-group date  col-sm-4 bdy_dte" id="datetimepicker6"> <span class="age_span"><?php
                            if (!empty($employeeDetail['EmployeeDetail']['emp_birthday'])) {
                                $year = date('Y', strtotime($employeeDetail['EmployeeDetail']['emp_birthday']));
                                echo $crnt_year = date('Y', time()) - $year;
                            } else {
                                echo "0";
                            }
                            ?></span>
                        <input value="<?php echo @$employeeDetail['EmployeeDetail']['emp_birthday']; ?>" name="data[EmployeeDetail][emp_birthday]" type="text"  class="form-control datepicker1 datepickerAge" placeholder="mm/dd/yyyy">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php
        $statusss = "display:none";
        if (!empty($employeeDetail['EmployeeDetail']['spouse_first_name'])) {
        $statusss = "display:block";
        }
        ?> 
        <div  style="<?php echo $statusss; ?>" id="spouseouter"  addpopup compile_template class=" col-md-12 spouse_outer spc" ng-bind-html="addSpouseData">
        </div>
        <div class="clearfix"></div>
        <h4 class="mtpp"> 
            <span  class="title_spn1">Children </span><span>
                <a  href="javascript:void(0);" ng-click="addChild()"class="com_admin_btns">Add New</a>

            </span></h4>
        <div class="col-md-12 spc childrn_sec clearfix " addpopup compile-template>
            <input type="hidden"  value="<?php echo count(@$employeeDetail['EmployeeChildren']); ?>" id="childValue"  name="children"  />
            <?php
            if (isset($employeeDetail['EmployeeChildren']) and ! empty($employeeDetail['EmployeeChildren'])) {
                foreach ($employeeDetail['EmployeeChildren'] as $key => $value) {
                    ?>
                    <div class="row childAdded" >
                        <div class="col-md-2  col-sm-4">
                            <div class="form-group">
                                <?php
                                $class = "";
                                if ($key == 0) {
                                    $class = "deleteIcon";
                                    ?>
                                    <label for="exampleInputEmail1">First Name</label>
                                <?php }
                                ?>

                                <input type="text" value="<?php echo $value['first_name']; ?>"  name="data[EmployeeChildren][<?php echo $key; ?>][first_name]" class="form-control"  placeholder=" First Name">
                            </div>

                        </div>
                        <div class="col-md-2  col-sm-4">
                            <div class="form-group">
                                <?php if ($key == 0) {
                                    ?>
                                    <label for="exampleInputEmail1">Last Name</label>
                                <?php }
                                ?>
                                <input value="<?php echo $value['last_name']; ?>" name="data[EmployeeChildren][<?php echo $key; ?>][last_name]" type="text" class="form-control"  placeholder=" Last Name">
                            </div>

                        </div>
                        <div class="col-md-2  col-sm-4">
                            <div class="form-group">
                                <?php if ($key == 0) {
                                    ?>
                                    <label for="exampleInputEmail1">Relationship</label>
                                <?php }
                                ?>
                                <div class="send_msg">
                                    <?php $relation = array('Son', 'Daughter'); ?>
                                    <select name="data[EmployeeChildren][<?php echo $key; ?>][relationship_status]" class="selectpicker spc">
                                        <?php
                                        foreach ($relation as $ke => $val) {
                                            $select = '';
                                            if ($value == $val['relationship_status']) {
                                                $select = "selected";
                                            }
                                            ?>
                                            <option <?php echo $select; ?> value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <div class="form-group">
                                <?php if ($key == 0) {
                                    ?>
                                    <label for="exampleInputEmail1">Birthday</label>
                                <?php }
                                ?>

                                <div class="input-group date  col-sm-12 bdy_dte" id="datetimepicker9">
                                    <input value="<?php echo $value['birthday']; ?>" name="data[EmployeeChildren][<?php echo $key; ?>][birthday]" type="text" class="form-control datepicker2 datepickerAge" placeholder="mm/dd/yyyy">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-4 text-center">
                            <div class="form-group">
                                <?php if ($key == 0) {
                                    ?>
                                    <label for="exampleInputEmail1">Age</label>
                                <?php }?>
                                <?php
                                $year = date('Y', strtotime($value['birthday']));
                                $crnt_year = date('Y', time()) - $year;
                                ?>
                                <span class="age_span age"><?php echo $crnt_year; ?></span>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-4 text-center">
                            <a href="javascript:void(0)" id="delete_0" ng-click="deleteChild('delete_0', '<?php echo $value['id']; ?>')" class=""><img class="<?php echo $class; ?>" src="<?php echo $this->webroot; ?>images/trash.png" alt="" /></a>
                        </div>

                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <div class="col-md-10 tip_textarea family_info spc">
            <label>Family Information</label>
            <textarea name="data[EmployeeDetail][family_information]" cols="" rows=""><?php echo @$employeeDetail['EmployeeDetail']['family_information']; ?></textarea>
        </div>
    </div>
    <div class="col-md-12 text-center spc btm_btns">
        <button type="submit">Save</button>
        <button type="reset" class="cncel_btn" >Cancel</button>
    </div>
</form>
<div class="clearfix"></div>
<div style="display:none;"  class="alert alert-success ResponseDiv">
    <a title="close" aria-label="close" data-dismiss="alert" class="close" href="#">×</a>
    <strong>Success!</strong> Employee Details added successfully.
</div>
