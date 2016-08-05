<tr> 
    <td class="send_msg">
        <select  name="data[<?php echo $child; ?>][EmployeeLicense][state]" class="selectpicker col-md-8 spc">
            <option value="">--Select--</option>
            <?php
            if (!empty($state)) {
                foreach ($state as $key => $value) {
                    ?>
              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php
                }
            }
            ?>
          
        </select></td>
    <td>   <input type="text"   name="data[<?php echo $child; ?>][EmployeeLicense][license]"  placeholder="" class="form-control"></td>
    <td class="send_msg">
        <select  name="data[<?php echo $child; ?>][EmployeeLicense][license_status]"  class="selectpicker col-md-8 spc">
            <option>Active</option>
            <option>Inactive</option>

        </select>
    </td>
    <td>   
        <input  name="data[<?php echo $child; ?>][EmployeeLicense][through]"  type="text"  placeholder="" class="form-control datepicker2">
    </td>
    <td >
        <div class="checkbox"> 
            <label> <input value="1" name="data[<?php echo $child; ?>][EmployeeLicense][approve]"  type="checkbox" >
            </label>
        </div></td>
    <td class="cus_pro_td">
        <a href="javascript:void(0);" ng-click="deleteLicense($event,'')">
            <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
            <span class="icons_cls">Trash</span>
        </a>
    </td>
</tr>