<?php if ($model == 'EmployeeLicense'){ ?>
    <input type="hidden" value="<?php echo count(@$data); ?>" id="LicenseValues" ng-model="LicenseValue"/>
    <?php
    foreach ($data as $child => $value) {
        ?>

        <tr> 
            <td class="send_msg">
                <select name="data[<?php echo $child; ?>][EmployeeLicense][state]" class="selectpicker col-md-8 spc">
                    <?php
                    if (!empty($state)) {
                        foreach ($state as $key => $value) {
                            $selected = "";
                            if ($key == $value['EmployeeLicense']['state']) {
                                $selected = "selected";
                            }
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php
                        }
                    }
                    ?>

                </select></td>
            <td>   <input type="text" value="<?php echo $value['EmployeeLicense']['license']; ?>"  name="data[<?php echo $child; ?>][EmployeeLicense][license]"  placeholder="" class="form-control"></td>
            <td class="send_msg">
                <select  name="data[<?php echo $child; ?>][EmployeeLicense][license_status]"  class="selectpicker col-md-8 spc">
                    <?php
                    $arr = array('0' => 'Inactive', '1' => 'Active');
                    foreach ($arr as $keys => $values) {
                        $newSelect = "";
                        if ($key == $value['EmployeeLicense']['license_status']) {
                            $newSelect = "selected";
                        }
                        ?>
                        <option <?php echo $newSelect; ?> value="<?php echo $keys; ?>"><?php echo $values; ?></option>
                        <?php
                    }
                    ?>


                </select>
            </td>
            <td>   
                <input  name="data[<?php echo $child; ?>][EmployeeLicense][through]" value="<?php echo $value['EmployeeLicense']['through']; ?>" type="text"  placeholder="" class="form-control datepicker2">
            </td>
            <td >
                <div class="checkbox"> 
                    <label>
                        <?php
                        $checked = '';
                        if (!empty($value['EmployeeLicense']['approve'])) {
                            $checked = 'checked';
                        }
                        ?>
                        <input <?php echo $checked; ?> value="1" name="data[<?php echo $child; ?>][EmployeeLicense][approve]"  type="checkbox" >
                    </label>
                </div></td>
            <td class="cus_pro_td">
                <a href="javascript:void(0);" ng-click="deleteLicense($event, '<?php echo $value['EmployeeLicense']['id']; ?>')">
                    <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
                    <span class="icons_cls">Trash</span>
                </a>
            </td>
        </tr>





        <?php
    }
}
elseif($model == 'EmployeeLender') {
    ?>
    <input type="hidden" value="<?php echo count(@$data); ?>" id="LicenseValues" />
    <?php
    if (!empty($data)) {
        foreach ($data as $key => $value) {
            ?>
            <tr>
                <td class="send_msg">
                    
                    <select name="data[<?php echo $key; ?>][EmployeeLender][lender]" class="selectpicker col-md-8 spc">
                        <?php foreach ($employeelender as $key => $val) {
                            $selected="";
                            if($key==$value['EmployeeLender']['lender']){
                              $selected="selected";  
                            }
                            ?>
                            <option  <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $val; ?></option>
                            <?php }
                        ?>
                    </select></td>
                <td>   <input value="<?php echo $value['EmployeeLender']['username']; ?>" type="text"  name="data[<?php echo $key; ?>][EmployeeLender][username]" placeholder="" class="form-control"></td>
                <td>   <input type="password"  value="<?php echo $value['EmployeeLender']['password']; ?>" name="data[<?php echo $key; ?>][EmployeeLender][password]" placeholder="" class="form-control"></td>

                <td class="text-center" >
                    <div class="checkbox"> 
                        <label> 
                            <?php
                            $select = "";
                            if (!empty($value['EmployeeLender']['lender_status'])) {
                                $select = "checked";
                            }
                            ?>
                            <input <?php echo $select; ?> value="1" name="data[<?php echo $key; ?>][EmployeeLender][lender_status]" type="checkbox" >
                        </label> </div>
                </td>
                <td class="cus_pro_td">
                    <a href="javascript:void(0);" ng-click="deleteLender($event, '<?php echo $value['EmployeeLender']['id']; ?>')">
                        <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
                        <span class="icons_cls">Trash</span></a>
                </td>


            </tr>
            <?php
        }
    }
}
elseif($model=='EmployeeCredit'){
    ?><input type="hidden" id="LicenseValues" value="1">
    <?php foreach ($data as $child => $value) {
?> <tr> 
    <td class="send_msg">
        <select name="data[<?php echo $child; ?>][EmployeeCredit][credit_bureas]" class="selectpicker col-md-8 spc">
            <option>Test </option>
        </select></td>
    <td>   <input  name="data[<?php echo $child; ?>][EmployeeCredit][username]" type="text" placeholder="" class="form-control"></td>
    <td>   <input  name="data[<?php echo $child; ?>][EmployeeCredit][password]" type="password" placeholder="" class="form-control"></td>

    <td >
        <div class="checkbox"> 
            <label> <input type="checkbox" value="1" name="data[<?php echo $child; ?>][EmployeeCredit][credit_status]" >
            </label> </div></td>
    <td class="cus_pro_td">
        <a href="javascript:void(0);" ng-click="deleteCredit($event,'<?php echo $value['EmployeeCredit']['id'];?>')">
            <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
            <span class="icons_cls">Trash</span>
        </a>
    </td>


</tr> 
    <?php
}?>
          
            
            
            <?php
    
}
?>