<tr> 
    <td class="send_msg">
        <select name="data[<?php echo $child; ?>][EmployeeCredit][credit_bureas]" class="selectpicker col-md-8 spc">
            <?php
            if (!empty($credit)) {
                foreach ($credit as $key => $value) {
                   ?>
             <option value="<?php echo $key;  ?>"><?php echo $value; ?> </option>
            <?php
                }
            }
            ?>
           
        </select>
    </td>
        <td><input  name="data[<?php echo $child; ?>][EmployeeCredit][corporate]" type="checkbox" value="1"  placeholder="" class="corporate"></td>
        <td><input  name="data[<?php echo $child; ?>][EmployeeCredit][account]" type="text"   placeholder="" class="form-control account"></td>
    <td>   <input  name="data[<?php echo $child; ?>][EmployeeCredit][username]" type="text" placeholder="" class="form-control username"></td>
    
    <td>   <input  name="data[<?php echo $child; ?>][EmployeeCredit][password]" type="text" placeholder="" class="form-control name"></td>

 
    <td class="cus_pro_td">
        <a href="javascript:void(0);" ng-click="deleteCredit($event, '')">
            <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
            <span class="icons_cls">Trash</span>
        </a>
    </td>


</tr>



