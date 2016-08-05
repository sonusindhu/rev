<tr>
    <td class="send_msg">
        <select  name="data[<?php echo $child; ?>][EmployeeLender][lender]" class="selectpicker col-md-8 spc">
            <option value="">--Select--</option>
            <?php
            if (!empty($lender)) {
                foreach ($lender as $key => $value) {
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </td>
    <td>   <input type="text"  name="data[<?php echo $child; ?>][EmployeeLender][username]" placeholder="" class="form-control"></td>
    <td>   <input type="text"  name="data[<?php echo $child; ?>][EmployeeLender][password]" placeholder="" class="form-control"></td>

    <td ><div class="checkbox"> <label> <input  name="data[<?php echo $child; ?>][EmployeeLender][lender_status]" type="checkbox" >
            </label> </div></td>
    <td class="cus_pro_td">
        <a href="javascript:void(0);" ng-click="deleteLender($event, '')">
            <img alt="" src="<?php echo $this->webroot; ?>images/trash.png">
            <span class="icons_cls">Trash</span></a></td>


</tr>