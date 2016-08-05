<?php
if (!empty($spouseInfo['EmployeeDetail']['spouse_first_name'])) {
    ?>
    <h4> <span  class="title_spn1">Spouse</span> <span>
            <a href="javascript:void(0);" ng-click="removeSpouse('<?php echo @$spouseInfo['EmployeeDetail']['id']; ?>');"  class="com_admin_btns " ng-click="addSpouse()" id="adbtn">Remove Spouse</a>
        </span></h4>
    <div class="col-md-12 spc  clearfix">
        <div class="col-md-1 col-sm-4 col-xs-3  spc employe_img">
            <?php
            if (!empty($spouseInfo['EmployeeDetail']['spouse_image'])) {
                $src = 'upload/Employee/' . @$spouseInfo['EmployeeDetail']['spouse_image'];
            } else {
                $src = "images/default-avatar.png";
            }
            ?>


            <img id="showimage" src="<?php echo $this->webroot . $src; ?>" alt="" />
            <div class=" imgup ">
                <div class="fileUpload btn btn-primary ">
                    <span>Upload</span>
                    <input name="data[EmployeeDetail][spouse_image]" type="file" class="upload uploadNew">
                </div>
            </div>

        </div>
        <div class="col-md-10 col-sm-12  emp_sec res_spc1">

            <div class="form-group">
                <label class="col-sm-3 spc  control-label">First Name</label>
                <div class="col-sm-4 res_spc1 ">
                    <input type="text" name="data[EmployeeDetail][spouse_first_name]"  value="<?php echo @$spouseInfo['EmployeeDetail']['spouse_first_name']; ?>" placeholder="Enter First Name" class="form-control spReset">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 spc  control-label">Middle Name</label>
                <div class="col-sm-4 res_spc1 ">
                    <input type="text" name="data[EmployeeDetail][spouse_middle_name]" value="<?php echo @$spouseInfo['EmployeeDetail']['spouse_middle_name']; ?>"  placeholder="Enter Middle Name" class="form-control spReset">
                </div>
            </div>

            <div class="form-group">

                <label class="col-sm-3 spc  control-label">Last Name</label>
                <div class="col-sm-4 res_spc1 ">
                    <input type="text"  name="data[EmployeeDetail][spouse_last_name]"  value="<?php echo @$spouseInfo['EmployeeDetail']['spouse_last_name']; ?>"   placeholder="Enter Last Name" class="form-control spReset">
                </div>
                <div class="col-md-5 col-sm-5 send_msg sufx_dv">
                    <label>Suffix</label>
                    <?php
                    $relation = array(
                        '' => 'Select',
                        'Junior' => 'Junior',
                        'Jr.' => 'Jr.',
                        'Senior' => 'Senior',
                        'Sr.' => 'Sr.',
                        'Esquire' => 'Esquire',
                        'Esq.' => 'Esq.',
                        'Esq I' => 'Esq I',
                        'Esq II' => 'Esq II',
                        'Esq III' => 'Esq III',
                    );
                    ?>
                    <select  name="data[EmployeeDetail][spouse_suffix]" class="selectpicker spc spReset">

                        <?php
                        //pr($relation);
                        foreach ($relation as $key => $value) {
                            /// echo $
                            // echo $value;
                            $selected = "";
                            if ($value == @$spouseInfo['EmployeeDetail']['spouse_suffix']) {
                                $selected = "selected";
                            }
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group send_msg">

                <label class="col-sm-3 spc  control-label">Birthday</label>
                <div class="input-group date  col-sm-4 bdy_dte" id="datetimepicker7"> <span class="age_span">
                        <?php
                        if (!empty($spouseInfo['EmployeeDetail']['spouse_birthday'])) {
                            $year = date('Y', strtotime(@$spouseInfo['EmployeeDetail']['spouse_birthday']));
                            echo $crnt_year = date('Y', time()) - $year;
                        } else {
                            echo "0";
                        }
                        ?>
                    </span>
                    <input  value="<?php echo @$spouseInfo['EmployeeDetail']['spouse_birthday']; ?>"  name="data[EmployeeDetail][spouse_birthday]"  type="text" class="form-control datepicker1 datepickerAge spReset" placeholder="mm/dd/yyyy">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group send_msg">

                <label class="col-sm-3 spc  control-label">Married On</label>
                <div class="input-group date  col-sm-4 bdy_dte" id="datetimepicker8">
                    <small class="yrs_small">Years</small>
                    <span class="age_span"><?php
                        if (!empty($spouseInfo['EmployeeDetail']['spouse_married_on'])) {
                            $year = date('Y', strtotime($spouseInfo['EmployeeDetail']['spouse_married_on']));
                            echo $crnt_year = date('Y', time()) - $year;
                        } else {
                            echo "0";
                        }
                        ?></span>
                    <input   name="data[EmployeeDetail][spouse_married_on]"  value="<?php echo @$spouseInfo['EmployeeDetail']['spouse_married_on']; ?>" type="text" class="form-control datepicker1 datepickerAge spReset" placeholder="mm/dd/yyyy">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>


        </div>
    </div>
    <div class="clearfix"></div>
<?php } else { ?>
    <h4> <span  class="title_spn1">Spouse</span> <span>
            <a href="javascript:void(0);" ng-click="removeSpouse();"  class="com_admin_btns " ng-click="addSpouse()" id="adbtn">Remove Spouse</a>
        </span></h4>
    <div class="col-md-12 spc  clearfix">
        <div class="col-md-1 col-sm-4 col-xs-3  spc employe_img">



            <img id="showimage" src="<?php echo $this->webroot . 'images/default-avatar.png'; ?>" alt="" />
            <div class=" imgup ">
                <div class="fileUpload btn btn-primary ">
                    <span>Upload</span>
                    <input name="data[EmployeeDetail][spouse_image]" type="file" class="upload uploadNew">
                </div>
            </div>

        </div>
        <div class="col-md-10 col-sm-12  emp_sec res_spc1">

            <div class="form-group">
                <label class="col-sm-3 spc  control-label">First Name</label>
                <div class="col-sm-4 res_spc1 ">
                    <input type="text" name="data[EmployeeDetail][spouse_first_name]"  value="<?php echo @$spouseInfo['EmployeeDetail']['spouse_first_name']; ?>" placeholder="Enter First Name" class="form-control spReset">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 spc  control-label">Middle Name</label>
                <div class="col-sm-4 res_spc1 ">
                    <input type="text" name="data[EmployeeDetail][spouse_middle_name]" value="<?php echo @$spouseInfo['EmployeeDetail']['spouse_middle_name']; ?>"  placeholder="Enter Middle Name" class="form-control spReset">
                </div>
            </div>

            <div class="form-group">

                <label class="col-sm-3 spc  control-label">Last Name</label>
                <div class="col-sm-4 res_spc1 ">
                    <input type="text"  name="data[EmployeeDetail][spouse_last_name]"  value="<?php echo @$spouseInfo['EmployeeDetail']['spouse_last_name']; ?>"   placeholder="Enter Last Name" class="form-control spReset">
                </div>
                <div class="col-md-5 col-sm-5 send_msg sufx_dv">
                    <label>Suffix</label>
                    <?php
                    $relation = array(
                        '' => 'Select',
                        'Junior' => 'Junior',
                        'Jr.' => 'Jr.',
                        'Senior' => 'Senior',
                        'Sr.' => 'Sr.',
                        'Esquire' => 'Esquire',
                        'Esq.' => 'Esq.',
                        'Esq I' => 'Esq I',
                        'Esq II' => 'Esq II',
                        'Esq III' => 'Esq III',
                    );
                    ?>
                    <select  name="data[EmployeeDetail][spouse_suffix]" class="selectpicker spc spReset">

                        <?php
                        foreach ($relation as $key => $value) {
                            $selected = "";
                            if ($value == @$spouseInfo['EmployeeDetail']['spouse_suffix']) {
                                $selected = "selected";
                            }
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group send_msg">

                <label class="col-sm-3 spc  control-label">Birthday</label>
                <div class="input-group date  col-sm-4 bdy_dte" id="datetimepicker7"> <span class="age_span">
                        0
                    </span>
                    <input  value=""  name="data[EmployeeDetail][spouse_birthday]"  type="text" class="form-control datepicker1 datepickerAge spReset" placeholder="mm/dd/yyyy">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group send_msg">

                <label class="col-sm-3 spc  control-label">Married On</label>
                <div class="input-group date  col-sm-4 bdy_dte" id="datetimepicker8">
                    <small class="yrs_small">Years</small>
                    <span class="age_span">0</span>
                    <input   name="data[EmployeeDetail][spouse_married_on]"  value="" type="text" class="form-control datepicker1 datepickerAge spReset" placeholder="mm/dd/yyyy">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>


        </div>
    </div>
    <div class="clearfix"></div>

    <?php
}
?>